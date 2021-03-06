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
            <b>Add Expense Head</b>
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="adv-table">

            <table  class="display table table-bordered border-none table-striped dataTable" id="example">
                <thead>
                <tr>
                    <th> Id </th>
                    <th> Expense Head Code </th>
                    <th> Expense Head name</th>
                    <th> Status</th>
                    <th> Action</th>
                </tr>
                </thead>
                <tfoot  class="search-section">
                <tr>
                    <th> Id </th>
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
                            <td>{{$values->expense_code}}</td>
                            <td>{{ucfirst($values->expense_head_name)}}</td>
                            <td>{{ucfirst($values->status)}}</td>
                            <td>
                                <a href="{{ route('view-expense-head', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('edit-expense-head', $values->id) }}" class="ddd btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete-expense-head', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
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
                {!! Form::open(['route' => 'store-expense-head','id' => 'expense-head-add-form']) !!}
                @include('admin::expense_head._form')
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
        var column_index = [3];
        var class_name = 'dataTable' ;
        create_data_table(class_name,column_index);

        $("#expense-head-add-form").validate({
            rules: {
                expense_head_name: "required",
            },
            messages: {
                expense_head_name: "Please enter expense head name!",
            }
        });

        $("#expense-head-add-form").submit(function(e){

            var formAction = $(this).attr('action');

            e.preventDefault();

            $.ajax({
                url: formAction,
                type: 'POST',
                data: $('form').serialize(),
                success: function (data) {

                    if(data == 1){
                        alert("This Expense Head Name has already been taken");
                    }else{
                        location.reload();
                    }
                }
            });
        })

    </script>
@endsection