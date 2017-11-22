@extends('admin::layouts.master')
@section('sidebar')
@include('admin::layouts.sidebar')
@stop

@section('content')

        <!-- page start-->
<div class="row user-index-page">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ $pageTitle }}</span>
                <a class="btn-primary btn-sm pull-right paste-blue-button-bg" data-toggle="modal" href="#addData" data-placement="left" data-content="click 'add user' button to add new user">
                    <strong>Add User</strong>
                </a>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped border-none table-bordered dataTable" id="example">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th> Username </th>
                                <th>Role Name</th>
                                <th> Email </th>
                                <th> Action &nbsp;</th>
                            </tr>
                        </thead>
                        <tfoot class="search-section">
                        <tr>
                            <th> id </th>
                            <th> <input type="text" placeholder="" /> </th>
                            <th><input type="text" placeholder="" /></th>
                            <th> <input type="text" placeholder="" /> </th>
                            <th> <select><option value=""> Select </option></select> </th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if(isset($model))
                            @foreach($model as $values)
                                <tr class="gradeX">
                                    <td>{{$values->id}}</td>
                                    <td>{{ucfirst($values->username)}}</td>
                                    <td>{{$values->relRoleInfo->slug}}</td>
                                    <td>{{$values->email}}</td>
                                    <td>
                                        <a href="{{ route('show-user', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-user', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update" onclick="open_modal();"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete-user', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete" onclick="open_modal();"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <span class="pull-right">{!! str_replace('/?', '?',  $model->appends(Input::except('page'))->render() ) !!} </span>
            </div>
        </div>
    </div>
</div>
<!-- page end-->

<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">
            <div class="modal-header">
                <a href="{{URL::previous()}}" class="close" aria-hidden="true" title="click x button for close this entry form">×</a>
                <h4 class="modal-title" id="myModalLabel">Add User Informations</h4>
            </div>
            <div class="modal-body">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
                {!! Form::open(['route' => 'add-user','id' => 'jq-validation-form']) !!}
                    @include('user::user._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!-- modal -->


<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>



<!-- modal -->

<script>
    function open_modal(){
        document.getElementById('load').style.visibility="visible";
    }

    $('#jq-validation-form').submit(function() {
        $('#gif').css('visibility', 'visible');
        //return true;
    });

</script>

<!--script for this page only-->
@if($errors->any())
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
    </script>
@endsection