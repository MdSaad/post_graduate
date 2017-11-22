@extends('admin::layouts.master')
@section('sidebar')
@parent
@include('admin::layouts.sidebar')
@stop

@section('content')

<!-- page start-->

<section class="panel">
        <header class="panel-heading">
            <span>{{ $pageTitle }}</span>
            <a class="btn-sm btn-success pull-right" data-toggle="modal" href="#addData">
                Add Currency
            </a>
            <div class="clearfix"></div>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <table  class="display table table-bordered border-none table-striped dataTable" id="example">
                    <thead>
                    <tr>
                        <th> Id </th>
                        <th> Name</th>
                        <th> Domestic</th>
                        <th> Conversion to </th>
                        <th> Status</th>
                        <th> Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr class="search-row">
                        <th> Id </th>
                        <th> <input type="text" placeholder="" /></th>
                        <th><input type="text" placeholder="" /></th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <select><option value=""> Select </option></select> </th>
                        <th> &nbsp;</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @if(isset($data))
                        @foreach($data as $values)
                            <tr class="gradeX">
                                <td> {{ $values->id }}</td>
                                <td>{{ucfirst($values->name)}}</td>
                                <td>{{ucfirst($values->domestic)}}</td>
                                <td>{{ucfirst($values->conversion_to)}}</td>
                                <td>{{ucfirst($values->status)}}</td>
                                <td>
                                    <a href="{{ route('view-currency', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('edit-currency', $values->id) }}" class="btn btn-primary btn-xs shows_modal" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete-currency', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </section>

<!-- page end-->

<!-- modal -->
<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $pageTitle }} </h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'store-currency','id' => 'currency-add-form']) !!}
                @include('admin::currency._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->

        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>

<!-- Modal  -->
<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
</div>

<!-- modal -->


<!--script for this page only-->



@if($errors->any())
    <script type="text/javascript">
        $(function(){
            var method = '<?php echo Session::get('method');?>';
            if(method == 'store'){
                $("#addData").modal('show');
            }else{
                <?php Session::flash('errors',$errors); ?>
               $('.shows_modal').trigger('click');
            }
        });
    </script>
@endif
@if(Session::has('flash_message_error'))
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
    @endif
@stop
@section('custom-script')
    <script>

        var column_index = [5];
        var class_name = 'dataTable' ;
        create_data_table(class_name,column_index);
        $("#currency-add-form").validate({
            rules: {
                name: "required",
                conversion_to: "required",
            },
            messages: {
                name: "Please enter currency name!",
                conversion_to: "Please enter conversion to !",
            }
        });

        $("#currency-add-form").submit(function(e){

            var formAction = $(this).attr('action');

            e.preventDefault();

            $.ajax({
                url: formAction,
                type: 'POST',
                data: $('form').serialize(),
                success: function (data) {

                    if(data == 1){
                        alert("This Currency Name has already been taken");
                    }else{
                        location.reload();
                    }
                }
            });
        })


    </script>
@endsection