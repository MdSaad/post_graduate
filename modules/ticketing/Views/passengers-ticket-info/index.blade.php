@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <p>{{ Session::get('flash_message') }}</p>
        </div>
    @endif

    @if(Session::has('flash_message_error'))
        <div class="alert alert-danger">
            <p>{{ Session::get('flash_message_error') }}</p>
        </div>
    @endif

    <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <span>{{ $page_title }}</span>
                <a class="btn-sm btn-success pull-right paste-blue-button-bg" href="{{ route('create-passengers-ticket-info') }}">
                    <b>Add Passengers Ticket Information</b>
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <div class="adv-table">

                    <table class="display table table-bordered border-none table-striped dataTable" id="example">
                        <thead>
                        <tr>
                            <th> Id</th>
                            <th> Airlines Name</th>
                            <th> Passenger Name</th>
                            <th> Ticket Number</th>
                            <th> Flying Date</th>
                            <th class="nosort"> Status</th>
                            <th class="nosort"> Action</th>
                        </tr>
                        </thead>
                        <tfoot class="search-section">
                        <tr class="search-row">
                            <th> Id</th>
                            <th><input type="text" placeholder=""/></th>
                            <th><input type="text" placeholder=""/></th>
                            <th><input type="text" placeholder=""/></th>
                            <th><input type="text" placeholder=""/></th>
                            <th><select>
                                    <option value=""> Select</option>
                                </select></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $singleItem)
                                <tr class="gradeX">
                                    <td>{{ $singleItem->id or '' }}</td>
                                    <td>{{ isset($singleItem->relAirlines->airlines_name) ? ucfirst($singleItem->relAirlines->airlines_name) : 'N/A' }}</td>
                                    <td>{{ isset($singleItem->passenger_name) ? ucfirst($singleItem->passenger_name) : 'N/A' }}</td>
                                    <td>{{ isset($singleItem->ticket_number) ? ucfirst($singleItem->ticket_number) : 'N/A' }}</td>
                                    <td>{{ date('d M Y', strtotime($singleItem->flying_date)) }}</td>
                                    <td>{{ ucfirst($singleItem->status) }}</td>
                                    <td>
                                        <a href="{{ route('view-passengers-ticket-info', $singleItem->id) }}"
                                           class="btn btn-info btn-xs"
                                           data-placement="top"
                                           data-content="view">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('edit-passengers-ticket-info', $singleItem->id) }}"
                                           class="ddd btn btn-primary btn-xs"
                                           data-placement="top"
                                           data-content="update">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="post" action="{{route('delete-passengers-ticket-info', $singleItem->id)}}"
                                              style="display: inline">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit"
                                                    class="btn btn-danger btn-xs"
                                                    onclick="return confirm('Are you sure to Delete?')">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
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
@stop

<!--script for this page only-->
@push('custom-script')
    <script>
        var column_index = [6];
        var class_name = 'dataTable';
        create_data_table(class_name, column_index);
    </script>
@endpush
<!--script for this page only-->