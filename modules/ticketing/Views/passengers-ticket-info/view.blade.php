@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop

@section('content')

    <div class="panel panel-default p-10">
        <div class="panel-heading">
            <div class="panel-title pull-left">
                <span>{{ $page_title or '' }}</span>
            </div>
            <div class="panel-title pull-right">
                <a class="pull-right back-button"
                   href="{{ route('passengers-ticket-info') }}">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="nice-border p-20"
                 style="width: 75%;margin: 20px auto">
                <table id=""
                       class="table table-bordered table-hover table-striped">
                    <tr>
                        <th colspan="16"
                            class="text-center tbl-th-custom">Passenger Ticket Information
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center col-sm-6">Airlines Name</th>
                        <td class="text-center col-sm-6">
                            {{ isset($data->relAirlines->airlines_name) ? ucfirst($data->relAirlines->airlines_name) : 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center">Passenger Name</th>
                        <td class="text-center">{{ ucfirst($data->passenger_name) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Ticket Number</th>
                        <td class="text-center">{{ $data->ticket_number or '' }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Issue Date</th>
                        <td class="text-center">{{ date('d M Y', strtotime($data->issue_date)) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Flying Date</th>
                        <td class="text-center">{{ date('d M Y', strtotime($data->flying_date)) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Route Type</th>
                        <td class="text-center">{{ DataArray::$root_type[$data->root_type]  }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Route Departure</th>
                        <td class="text-center">{{ ucfirst($data->root_from) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Route Destination</th>
                        <td class="text-center">{{ ucfirst($data->root_to) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Selling Price</th>
                        <td class="text-center">{{ $data->selling_price or '' }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Basic Fair</th>
                        <td class="text-center">{{ $data->basic_fair or '' }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Tax Amount</th>
                        <td class="text-center">{{ $data->tax_amount or '' }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">AIT Amount</th>
                        <td class="text-center">{{ $data->ait_amount or '' }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Commission</th>
                        <td class="text-center">{{ $data->commission or '' }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Reference</th>
                        <td class="text-center">{{ ucfirst($data->reference) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Note</th>
                        <td class="text-center">{{ ucfirst($data->notes) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Status</th>
                        <td class="text-center">{{ ucfirst($data->status) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection