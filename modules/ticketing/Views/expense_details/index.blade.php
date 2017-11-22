@extends('admin::layouts.master')
@section('sidebar')
@parent
@include('admin::layouts.sidebar')
@stop

@section('content')

<!-- page start-->

<section class="panel">
    <div class="panel-heading">
        <span>{{ $page_title }}</span>
        <a class="btn-sm btn-success pull-right paste-blue-button-bg" data-toggle="modal" href="#addData">
            <b>Add Expense Details</b>
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="adv-table">

            <table  class="display table table-bordered border-none table-striped dataTable" id="example">
                <thead>
                <tr>
                    <th> Id </th>
                    <th> Expense Head </th>
                    <th> Expense SubHead </th>
                    <th> Expense Title</th>
                    <th> Expense Date</th>
                    <th> Expense Amount</th>
                    <th> Status</th>
                    <th> Action</th>
                </tr>
                </thead>
                <tfoot  class="search-section">
                <tr>
                    <th> Id </th>
                    <th> <select><option value=""> Select </option></select></th>
                    <th> <select><option value=""> Select </option></select></th>
                    <th> <input type="text" placeholder="" /></th>
                    <th> <input type="text" placeholder="" /></th>
                    <th> <input type="text" placeholder="" /></th>
                    <th> <select><option value=""> Select </option></select></th>
                    <th> &nbsp;</th>
                </tr>
                </tfoot>
                <tbody>
                @if(isset($data))
                    @foreach($data as $values)
                        <tr class="gradeX">
                            <td>{{$values->id}}</td>
                            <td>{{isset($values->expense_head)?ucfirst($values->expense_head->expense_head_name):''}}</td>
                            <td>{{isset($values->expense_subhead)?ucfirst($values->expense_subhead->expense_subhead_name):''}}</td>
                            <td>{{ucfirst($values->expense_title)}}</td>
                            <td>{{ucfirst($values->expense_date)}}</td>
                            <td>{{$values->expense_amount}}</td>
                            <td>{{ucfirst($values->status)}}</td>
                            <td>
                                <a href="{{ route('view-expense-details', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('edit-expense-details', $values->id) }}" class="ddd btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete-expense-details', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            {{--<span class="pull-right">{!! str_replace('/?', '?', $data->render()) !!} </span>--}}
        </div>
    </div>
</section>

<!-- page end-->

<!-- modal -->


<!-- Modal  -->

<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $page_title }} </h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'store-expense-details','id' => 'expense-details-add-form']) !!}
                @include('ticketing::expense_details._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->

        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
 <div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
</div>

<!-- modal -->

<!--script for this page only-->

@if($errors->any())
    <script type="text/javascript">
        $(function() {
            var val_method = '<?php echo Session::get('val_method') ?>';
            if( val_method == 'store'){
                $("#addData").modal('show');
            }else{
                <?php Session::flash('errors',$errors); ?>
                $('.ddd').trigger('click');
            }


});

    </script>
@endif
@if(Session::has('flash_message_error'))
    <script type="text/javascript">
        $(function(){
            // $("#etsbModal").modal('show');
            <?php
            $ddd = $errors->first();

            Session::flash('errors', $ddd);
             ?>

            $('.ddd').trigger('click');
        });
    </script>
@endif
        <!--script for this page only-->
@endsection

@section('custom-script')
    <script>
        var column_index = [2,3,7];
        var class_name = 'dataTable' ;
        create_data_table(class_name,column_index);


        $('#expense_head_id').change(function(e){
            var expense_head_id = $(this).val();
            $.get("{{url('ticketing/get_subhead_by_headid')}}/"+expense_head_id,function(data){
               // console.log(data);
                $('#expense_subhead_id').html(data);
            });
        })

        $("#expense-details-add-form").validate({
            rules: {
                expense_head_id: "required",
                expense_subhead_id: "required",
                expense_title: "required",
                expense_date: "required",
                expense_amount: "required",
            },
            messages: {
                expense_head_id: "Please select expense head!",
                expense_subhead_id: "Please select expense sub head!",
                expense_title: "Please enter expense title!",
                expense_date: "Please enter expense date!",
                expense_amount: "Please enter expense amount!",
            }
        });

    </script>
@endsection