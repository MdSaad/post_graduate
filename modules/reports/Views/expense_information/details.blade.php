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
                {{--<a href="{{ route('task-detail-pdf', ['id'=>$data->id]) }}" class="btn btn-primary" id="btnReport" target="_blank" data-toggle="tooltip" title="Export PDF" data-placement="top" >
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
                    <th class="col-lg-2">Expense Date</th>
                    <td class="col-lg-4">{{ isset($data->expense_date)?ucfirst($data->expense_date):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Expense Head Name</th>
                    <td class="col-lg-4">{{ isset($data->expense_head)?ucfirst($data->expense_head->expense_head_name):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Expense SubHead Name</th>
                    <td class="col-lg-4">{{ isset($data->expense_subhead)?ucfirst($data->expense_subhead->expense_subhead_name):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Expense Amount</th>
                    <td class="col-lg-4">{{ isset($data->expense_amount)?ucfirst($data->expense_amount):'' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-2">Notes</th>
                    <td class="col-lg-4">{{ isset($data->note)?ucfirst($data->note):'' }}</td>
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
                {{--<div class="header-section">
                    <p class="header">Task Information</p>
                </div>--}}

                <table width="100%" cellpadding="3" cellspacing="0" border="0" class="report-table">

                    <thead>
                        <tr>
                            <th class="header" colspan="4" style="text-align: center!important;">Expense Information</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="col-lg-2" style="width: 20%">Expense Date</th>
                        <td class="col-lg-4">{{ isset($data->expense_date)?ucfirst($data->expense_date):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Expense Head Name</th>
                        <td class="col-lg-4">{{ isset($data->expense_head)?ucfirst($data->expense_head->expense_head_name):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Expense SubHead Name</th>
                        <td class="col-lg-4">{{ isset($data->expense_subhead)?ucfirst($data->expense_subhead->expense_subhead_name):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Expense Amount</th>
                        <td class="col-lg-4">{{ isset($data->expense_amount)?ucfirst($data->expense_amount):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Notes</th>
                        <td class="col-lg-4">{{ isset($data->note)?ucfirst($data->note):'' }}</td>
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