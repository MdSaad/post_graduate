@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop



@section('content')

    <div class="inner-wrapper report-details-page task-detail-page">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="green">{{ $page_title }}</h3>
            </div>
            <div class="col-sm-3 pull-right" id="report">
               {{-- <a href="" class="btn btn-primary" id="btnReport" target="_blank" data-toggle="tooltip" title="Export PDF" data-placement="top" >
                    <img src="{{ URL::asset('assets/img/pdf-icon.png') }}" alt="">
                    <i class="fa fa-file-pdf-o "></i>
                </a>--}}
                <a id="btnPrint" class="btn btn-primary"  data-toggle="tooltip" title="Print" data-placement="top">
                    <i class="fa fa-print"></i>
                </a>
                <a href="javascript:void(0)" onclick="window.close()" class="btn btn-primary" id="btnBack" data-toggle="tooltip" title="Back to Home" data-placement="top" data-content="click back button">
                    <strong>Back To Index</strong>
                </a>
            </div>
        </div>
        <div class="app-container col-sm-12">
            <table id="" class="table table-bordered table-hover table-striped vertical-table">
                <tr>
                    <th class="col-lg-2">Airlines Name</th>
                    <td class="col-lg-4">{{isset($data->relAirlines)?$data->relAirlines->airlines_name:''}}</td>
                    <th class="col-lg-2">Passenger Name</th>
                    <td class="col-lg-4">{{ isset($data->passenger_name)?ucfirst($data->passenger_name):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Ticket Number</th>
                    <td class="col-lg-4">{{ isset($data->ticket_number)?ucfirst($data->ticket_number):'' }}</td>
                    <th class="col-lg-2">Issue Date</th>
                    <td class="col-lg-4">{{ isset($data->issue_date)?ucfirst($data->issue_date):'' }}</td>
                </tr>

                <tr>
                    <th class="col-lg-2">Flying Date</th>
                    <td class="col-lg-4">{{ isset($data->flying_date)?ucfirst($data->flying_date):'' }}</td>
                    <th class="col-lg-2">Root Type</th>
                    <td class="col-lg-4">{{ isset($data->root_type)?ucfirst(\Modules\Admin\Helpers\DataArray::$business_type[$data->root_type]):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">From</th>
                    <td class="col-lg-4">{{ isset($data->root_from)?ucfirst($data->root_from):'' }}</td>
                    <th class="col-lg-2">To</th>
                    <td class="col-lg-4">{{ isset($data->root_to)?ucfirst($data->root_to):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Basic Fair</th>
                    <td class="col-lg-4">{{ isset($data->basic_fair)?ucfirst($data->basic_fair):'' }}</td>
                    <th class="col-lg-2">Tax Amount</th>
                    <td class="col-lg-4">{{ isset($data->tax_amount)?ucfirst($data->tax_amount):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Ait Amount</th>
                    <td class="col-lg-4">{{ isset($data->ait_amount)?ucfirst($data->ait_amount):'' }}</td>
                    <th class="col-lg-2">Selling Price</th>
                    <td class="col-lg-4">{{ isset($data->selling_price)?ucfirst($data->selling_price):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Commission</th>
                    <td class="col-lg-4">{{ isset($data->commission)?ucfirst($data->commission):'' }}</td>
                    <th class="col-lg-2">Reference</th>
                    <td class="col-lg-4">{{ isset($data->reference)?ucfirst($data->reference):'' }}</td>
                </tr>

                <tr>
                    <th class="col-lg-2">Notes</th>
                    <td colspan="3">{{ isset($data->notes)?ucfirst($data->task_description):'' }}</td>
                </tr>
            </table>
        </div>

        <div class="print-report-table-wrapper">
            <style>

                .print-show{
                    display: none;
                }
                .margin-bottom-0{
                    margin-bottom: 0!important;
                }
                .text-left{
                    text-align: left!important;
                }


                @media print{

                    *{
                        text-align: center !important;
                        font-size: 14px !important;
                    }

                    #example * {
                        border: none;
                    }

                    table.report-table{
                        border-collapse: collapse !important;
                    }

                    table.report-table thead tr th,table.report-table tbody tr th, table.report-table tbody tr td {
                        border: 1px solid black !important;
                        text-align: left!important;
                        padding: 5px 5px!important;
                    }

                    .no-border span{
                        position: relative;
                        top: 18px;
                    }

                    .print-hide{
                        display: none !important;
                    }

                    .print-show{
                        display: block !important;
                    }

                    .header{
                        font-size: 20px!important;
                        font-weight: 300!important;
                        text-align: center!important;
                        max-width: 250px;
                        margin: 5px auto;
                    }

                    .header-section{
                        margin-bottom: 20px;
                    }

                    .table-primary thead tr th:empty {
                        border-right: none !important;
                        border-top: none !important;
                    }

                    .no-border span {
                        position: relative;
                        top: 18px;
                    }
                }

            </style>
            <div class="print-section print-show">
                <table width="100%" cellpadding="3" cellspacing="0" border="0" class="report-table">
                    <thead>
                        <tr>
                            <th class="header" colspan="4" style="text-align: center!important;">Ticket Information</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="col-lg-2">Airlines Name</th>
                        <td class="col-lg-4">{{isset($data->relAirlines)?$data->relAirlines->airlines_name:''}}</td>
                        <th class="col-lg-2">Passenger Name</th>
                        <td class="col-lg-4">{{ isset($data->passenger_name)?ucfirst($data->passenger_name):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Ticket Number</th>
                        <td class="col-lg-4">{{ isset($data->ticket_number)?ucfirst($data->ticket_number):'' }}</td>
                        <th class="col-lg-2">Issue Date</th>
                        <td class="col-lg-4">{{ isset($data->issue_date)?ucfirst($data->issue_date):'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-2">Flying Date</th>
                        <td class="col-lg-4">{{ isset($data->flying_date)?ucfirst($data->flying_date):'' }}</td>
                        <th class="col-lg-2">Root Type</th>
                        <td class="col-lg-4">{{ isset($data->root_type)?ucfirst(\Modules\Admin\Helpers\DataArray::$business_type[$data->root_type]):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">From</th>
                        <td class="col-lg-4">{{ isset($data->root_from)?ucfirst($data->root_from):'' }}</td>
                        <th class="col-lg-2">To</th>
                        <td class="col-lg-4">{{ isset($data->root_to)?ucfirst($data->root_to):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Basic Fair</th>
                        <td class="col-lg-4">{{ isset($data->basic_fair)?ucfirst($data->basic_fair):'' }}</td>
                        <th class="col-lg-2">Tax Amount</th>
                        <td class="col-lg-4">{{ isset($data->tax_amount)?ucfirst($data->tax_amount):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Ait Amount</th>
                        <td class="col-lg-4">{{ isset($data->ait_amount)?ucfirst($data->ait_amount):'' }}</td>
                        <th class="col-lg-2">Selling Price</th>
                        <td class="col-lg-4">{{ isset($data->selling_price)?ucfirst($data->selling_price):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Commission</th>
                        <td class="col-lg-4">{{ isset($data->commission)?ucfirst($data->commission):'' }}</td>
                        <th class="col-lg-2">Reference</th>
                        <td class="col-lg-4">{{ isset($data->reference)?ucfirst($data->reference):'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-2">Notes</th>
                        <td colspan="3">{{ isset($data->notes)?ucfirst($data->task_description):'' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <script>
        $('#btnPrint').click(function(e){
            w=window.open();
            w.document.write($('.print-report-table-wrapper').html());
            w.print();
            w.close();
        });
    </script>
@stop