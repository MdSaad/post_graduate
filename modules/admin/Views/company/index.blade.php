@extends('admin::layouts.master')
@section('sidebar')
@parent
@include('admin::layouts.sidebar')
@stop

@section('content')

        <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            {{ $pageTitle }}

            <a class="btn-sm btn-success pull-right paste-blue-button-bg" data-toggle="modal" href="#addData">
                <b>Add Company</b>
            </a>
        </header>
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                <p>{{ Session::get('flash_message') }}</p>
            </div>
        @endif

        <div class="panel-body">
            <div class="adv-table">
                <table  class="display table table-bordered border-none table-striped dataTable" id="example">
                    <thead>
                    <tr>
                        <th> Id </th>
                        <th> Logo </th>
                        <th> Company Name </th>
                        <th> Address1 </th>
                        <th> Address2 </th>
                        <th> Address3 </th>
                        <th> Email </th>
                        <th> Contact No </th>
                        <th> Website </th>
                        <th> Status </th>
                        <th> Action </th>
                    </tr>
                    </thead>

                    <tfoot class="search-section">
                    <tr>
                        <th> Id </th>
                        <th> &nbsp; </th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <input type="text" placeholder="" /> </th>
                        <th> <select><option value=""> Select </option></select> </th>
                        <th> &nbsp; </th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @if(isset($data))
                        @foreach($data as $values)
                            <tr class="gradeX">
                                <td> {{$values->id}}</td>
                                <td>
                                    @if(\Illuminate\Support\Facades\File::exists($values->logo))
                                        <img src="{{asset($values->logo)}}" alt="No image available." width="50" height="50"/>
                                    @endif
                                </td>
                                <td>{{ucfirst($values->company_name)}}</td>
                                <td>{{ucfirst($values->address1)}}</td>
                                <td>{{ucfirst($values->address2)}}</td>
                                <td>{{ucfirst($values->address3)}}</td>
                                <td>{{ucfirst($values->email)}}</td>
                                <td>{{ucfirst($values->contact_no)}}</td>
                                <td>{{ucfirst($values->website)}}</td>
                                <td>{{ucfirst($values->status)}}</td>
                                <td>
                                    <a href="{{ route('view-company', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('edit-company', $values->id) }}" class="btn btn-primary btn-xs edit-link shows-modal" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete-company', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
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
                        {!! Form::open(['route' => 'store-company','id' => 'company-add-form','enctype'=>'multipart/form-data']) !!}
                        @include('admin::company._form')
                        {!! Form::close() !!}
                    </div> <!-- / .modal-body -->

                </div> <!-- / .modal-content -->
            </div> <!-- / .modal-dialog -->
        </div>

<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">

</div>

<!-- modal -->



@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif
@if(Session::has('flash_message_error'))
    <script type="text/javascript">
        $(function(){
            var method = '<?php echo Session::get('method');?>';
            if(method == 'store'){
                $("#addData").modal('show');
            }else{
                $('.shows_modal').trigger('click');
            }

        });
    </script>
@endif


<!--script for this page only-->

@stop

@section('custom-script')
    <script>
        var column_index = [2,5,6];
        var class_name = 'dataTable' ;
        create_data_table(class_name,column_index);

        $("#company-add-form").validate({
            rules: {
                company_name: "required",
                address1: "required",
            },
            messages: {
                company_name: "Please enter company name!",
                address1: "Please enter company address1!",
            }
        });

        $("#company-add-form").submit(function(e){
            e.preventDefault();
            var formAction = $(this).attr('action');
            $.ajax({
                url: formAction,
                headers: {
                    'X-CSRF-Token': $('form.file-form [name="_token"]').val()
                },
                type: 'POST',
                data:  new FormData($("#company-add-form")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if(data == 1){
                        alert("This Company Name has already been taken");
                    }else{
                        location.reload();
                    }
                }
            });
        })

    </script>
@endsection
