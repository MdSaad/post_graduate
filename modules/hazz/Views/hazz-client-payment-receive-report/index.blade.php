@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop

@section('content')

    <!-- page start-->
    <div class="">
        <div class="header-searchbar"
             style="width: 85.3%">
            <section>
                <header class="panel-heading">
                    <span><strong>{{ $page_title }}</strong></span>

                    <button id="collapsible-searchbox-button"
                            class="btn btn-sm paste-blue-button-bg"
                            data-toggle="collapse"
                            data-target="#collapsible-searchbox">Search
                    </button>
                    <button id="btnPrint"
                            class="btn btn-sm btn-primary pull-right">Print
                    </button>

                    {{-- searchbar for mobile devices --}}
                    <div id="collapsible-searchbox"
                         class="collapse">
                        {!! Form::open(['method' =>'POST','route'=>'generate-hazz-client-payment-receive-report','id'=>'submit','class'=>'report-form']) !!}
                        <div class="row">
                            <div class="col-xs-4">
                                {!! Form::label('from_date', 'From Date', ['class' => 'control-label']) !!}
                                <span
                                        class="required"> ( Required )</span>
                                {!! Form::text('from_date',@Input::get('from_date')? Input::get('from_date') : null,['id'=>'from_date','class' => 'form-control datepicker','required','placeholder'=>'Select from date', 'title'=>'Select from date']) !!}
                            </div>
                            <div class="col-xs-4">
                                {!! Form::label('to_date', 'To Date', ['class' => 'control-label']) !!}
                                {!! Form::text('to_date',@Input::get('to_date')? Input::get('to_date') : null,['id'=>'to_date','class' => 'form-control datepicker','placeholder'=>'Select to date', 'title'=>'Select to date']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 filter-btn">
                                {!! Form::submit('Generate Report', array('class'=>'btn btn-primary btn-xs pull-left','id'=>'button', 'data-placement'=>'right', 'data-content'=>'type user name or select branch or both in specific field then click search button for required information')) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    {{-- searchbar for mobile devices --}}

                    <div class="clearfix"></div>

                    {{-- searchbar for desktop --}}
                    <div id="hide-on-mobile">
                        <div class="row">
                            {!! Form::open(['method' =>'POST','route'=>'generate-hazz-client-payment-receive-report','id'=>'submit','class'=>'report-form']) !!}
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('from_date', 'From Date', ['class' => 'control-label']) !!}
                                <span class="required"> ( Required )</span>
                                {!! Form::text('from_date',@Input::get('from_date')? Input::get('from_date') : null,['id'=>'from_date','class' => 'form-control datepicker','required','placeholder'=>'Select from date', 'title'=>'Select from date']) !!}
                            </div>
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('to_date', 'To Date', ['class' => 'control-label']) !!}
                                {!! Form::text('to_date',@Input::get('to_date')? Input::get('to_date') : null,['id'=>'to_date','class' => 'form-control datepicker','placeholder'=>'Select to date', 'title'=>'Select to date']) !!}
                            </div>
                            <div class="col-lg-1 col-md-1 filter-btn">
                                {!! Form::submit('Generate Report', array('class'=>'btn btn-primary btn-xs pull-left','id'=>'button', 'data-placement'=>'right', 'data-content'=>'type user name or select branch or both in specific field then click search button for required information')) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    {{-- searchbar for desktop --}}

                    {{-- table header --}}
                    <div class="row">
                        <table class="display table table-bordered table-striped dataTable"
                               id="display">
                            <thead>
                            <tr>
                                <th style="width: 33.33%;">Client Name</th>
                                <th style="width: 33.33%;">Receive Date</th>
                                <th style="width: 33.33%!important;">Receive Amount</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    {{-- table header --}}

                </header>
            </section>
        </div>

        {{-- print block --}}
        <div id="print-block">
            <style>
                @page {
                    margin-left: 2cm;
                    margin-right: 2cm;
                    margin-top: 2cm;
                    margin-bottom: 2cm;
                }

                table {
                    page-break-inside: auto
                }

                tr {
                    page-break-inside: avoid;
                    page-break-after: auto
                }

                .tbl {
                    border-collapse: collapse !important;
                    width: 100%;
                }

                .tbl2 {
                    border-collapse: collapse !important;
                    width: 50%;
                }

                table.tbl thead tr th, table.tbl2 thead tr th {
                    border: 1px solid #000;
                    text-align: center !important;
                    font-weight: normal !important;
                }

                table.tbl tbody tr td, table.tbl2 tbody tr td {
                    padding-left: 10px !important;
                    border: 1px solid #000;
                    text-align: left !important;
                    font-weight: normal !important;
                }

                table.tbl thead tr th, table.tbl2 thead tr th {
                    text-align: center !important;
                }
            </style>
            <table class="tbl">
                <thead>
                <tr>
                    <th colspan="3"
                        style="font-size:20px!important;text-align: center!important;">Hazz Client Information
                    </th>
                </tr>
                <tr>
                    <th style="width: 33.33%;">Client Name</th>
                    <th style="width: 33.33%;">Receive Date</th>
                    <th style="width: 33.33%;">Receive Amount</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($data))
                    <?php $sl = 0; ?>
                    @foreach($data as $values)
                        <tr class="gradeX">
                            <td style="width: 33.33%;">{{$values->client_name}}</td>
                            <td style="width: 33.33%;">{{$values->receive_date}}</td>
                            <td style="width: 33.33%;">{{$values->receive_amount}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        {{-- print block --}}

    </div>

    <div class="">
        <div class="panel-body">
            <div class="adv-table">
                <table class="display table table-bordered table-striped dTable"
                       id="innter-datatable">
                    <tbody>
                    @if(isset($data))
                        <?php
                        $prev_name = '';
                        $prev_date = '';
                        $grandTotalReceiveAmount = 0;
                        ?>
                        @foreach($data as $values)
                            <?php
                            $nameRowSpanCount = 0;
                            $dateRowSpanCount = 0;
                            $subTotalReceive = 0;
                            $cname = $values->client_name;
                            $cdate = $values->receive_date . $values->client_name;

                            if ($prev_name != $cname) {
                                foreach ($data as $v) {
                                    if ($v->client_name == $values->client_name) {
                                        ++$nameRowSpanCount;
                                        $subTotalReceive += $values->receive_amount;
                                    }
                                }
                            }

                            if ($prev_date != $cdate) {
                                foreach ($data as $v) {
                                    if ($v->receive_date . $v->client_name == $values->receive_date . $values->client_name) {
                                        ++$dateRowSpanCount;
                                    }
                                }
                            }
                            ?>

                            <tr class="gradeX">
                                @if($prev_name  != $cname)
                                    <td rowspan="{{ $nameRowSpanCount }}"
                                        style="width: 33.33%;">
                                        {{$values->client_name}}
                                    </td>
                                @endif
                                @if($prev_date  != $cdate)
                                    <td rowspan="{{ $dateRowSpanCount }}"
                                        style="width: 33.33%;">
                                        {{$values->receive_date}}
                                    </td>
                                @endif
                                <td style="width: 33.33%;" >{{$values->receive_amount}}</td>
                            </tr>

                            {{--@if($prev_name  != $cname)
                                <tr>
                                    <td colspan="2" style="text-align: right">Sub Total Receive Amount = </td>
                                    <td>{{$subTotalReceive}}</td>
                                </tr>
                            @endif--}}

                            <?php
                            $grandTotalReceiveAmount += $values->receive_amount;
                            $prev_name = $values->client_name;
                            $prev_date = $values->receive_date . $values->client_name;
                            ?>

                        @endforeach
                        <tr>
                            <td colspan="2"
                                style="text-align: right">Grand Total Receive Amount =
                            </td>
                            <td>{{$grandTotalReceiveAmount or 0}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- page end-->
@endsection
@section('custom-script')
    <script>
        $('#btnPrint').click(function (e) {
            w = window.open();
            w.document.write($('#print-block').html());
            w.print();
            w.close();
        });
        $('#btnPdf').click(function (e) {
            var values = $("input[name='hdId[]']")
                .map(function () {
                    return $(this).val();
                }).get();
            console.log(values);
            //   return false;
            if (values.length <= 0)
                return false;
            $(this).attr("href", "{{url('report/collection-pdf')}}/" + values);
        });

    </script>
@endsection
