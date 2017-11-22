@extends('admin::layouts.master')
@section('sidebar')
@include('admin::layouts.sidebar')
@stop
@section('content')
        <!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ $pageTitle }}</span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we can show all role user in this page<br> and add new role user, update ole user from this page</em>"></span>
                <a class="btn-primary btn-sm pull-right paste-blue-button-bg" data-toggle="modal" href="#addData" data-placement="top" data-content="click add user role button for select user and give new role">
                    <strong>Add New Role User</strong>
                </a>


                @if(Session::get('role_title') == 'super-admin')

                <a class="btn-info btn-xs pull-right paste-blue-button-bg" href="{{route('role')}}" data-placement="left" data-content="Click to redirect in role page" style="margin-right: 10px;">
                    <strong>Go to Role Page</strong>
                </a>

                @endif
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="table-primary">
                    <table cellpadding="0" cellspacing="0" border="0" class="table border-none table-striped table-bordered dataTable" id="example">
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th> User </th>
                                <th> Email Address </th>
                                <th> Role </th>
                                <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations"></span></th>
                            </tr>
                        </thead>
                        <tfoot class="search-section">
                        <tr>
                            <th> Id </th>
                            <th>  <input type="text" placeholder="" /> </th>
                            <th>  <input type="text" placeholder="" /> </th>
                            <th> <select><option value=""> Select </option></select> </th>
                            <th> &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations"></span></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{$values->id}}</td>
                                    <td>{{isset($values->username)?ucfirst($values->username):ucfirst($values->relUser->username)}}</td>
                                    <td>{{isset($values->email)?$values->email:$values->relUser->email}}</td>
                                    <td>{{isset($values->title)?ucfirst($values->title):ucfirst($values->relRole->title)}}</td>
                                    <td>
                                        <a href="{{ route('view-role-user', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="view"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit-role-user', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>
                                        {{--<a href="{{ route('delete-role-user', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" data-placement="top" data-content="delete"><i class="fa fa-trash-o"></i></a>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                <span class="pull-right">{!! str_replace('/?', '?',  $data->appends(Input::except('page'))->render() ) !!} </span>
            </div>
        </div>
    </div>
</div>
<!-- page end-->

<div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <a href="{{URL::previous()}}" type="button" class="close" aria-hidden="true" title="click x button for close this entry form">×</a>
                <h4 class="modal-title" id="myModalLabel">Add Role User Informations <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2"></font> </span></h4>
            </div>
            <div class="modal-body" style="padding: 10px 30px 30px 30px;">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if(Session::has('danger-info'))
                    <div class="alert alert-danger">
                        <p>{{ Session::get('danger-info') }}</p>
                    </div>
                @endif
                {!! Form::open(['route' => 'store-role-user','id' => 'form_2']) !!}
                @include('user::role_user._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!-- modal -->


<!-- Modal  -->

<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>

<!-- modal -->


<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif

@if(Session::has('danger-info'))
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif


@stop
@section('custom-script')
    <script>
        var column_index = [4];
        var class_name = 'dataTable' ;
        create_data_table(class_name,column_index);
    </script>
@endsection