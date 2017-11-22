@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop

@section('content')

    <!-- page start-->
    <div class="">
        <div class="header-searchbar" style="width: auto">
            <section>
                <header class="panel-heading">
                    <span><strong>{{ $page_title }}</strong></span>

                    <button id="collapsible-searchbox-button" class="btn btn-sm paste-blue-button-bg"
                            data-toggle="collapse" data-target="#collapsible-searchbox">Search
                    </button>
                    <button id="btnPrint" class="btn btn-sm btn-primary pull-right">Print</button>

                    {{-- searchbar for mobile devices --}}
                    <div id="collapsible-searchbox" class="collapse">
                        {!! Form::open(['method' =>'POST','route'=>'generate-ticket-information-report','id'=>'submit','class'=>'report-form']) !!}
                        <div class="row">
                            <div class="col-xs-4">
                                {!! Form::label('from_date', 'From Date', ['class' => 'control-label']) !!}<span
                                        class="required"> ( Required )</span>
                                {!! Form::text('from_date',@Input::get('from_date')? Input::get('from_date') : null,['id'=>'from_date','class' => 'form-control datepicker','required','placeholder'=>'Select from date', 'title'=>'Select from date']) !!}
                            </div>
                            <div class="col-xs-4">
                                {!! Form::label('to_date', 'To Date', ['class' => 'control-label']) !!}
                                {!! Form::text('to_date',@Input::get('to_date')? Input::get('to_date') : null,['id'=>'to_date','class' => 'form-control datepicker','placeholder'=>'Select to date', 'title'=>'Select to date']) !!}
                            </div>
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('passenger_name', 'Passenger Name', ['class' => 'control-label']) !!}
                                {!! Form::text('passenger_name',@Input::get('passenger_name')? Input::get('passenger_name') : null,['id'=>'passenger_name','class' => 'form-control','placeholder'=>'Select passenger name ', 'title'=>'Select passenger name']) !!}
                            </div>
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('airlines_id', 'Airlines', ['class' => 'control-label']) !!}
                                {!! Form::Select('airlines_id',$airlines_list, @Input::get('airlines_id')? Input::get('airlines_id') : null,['id'=>'buyer','class' => 'form-control js-select-searching','placeholder'=>'Select airlines', 'title'=>'Select airlines']) !!}
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
                            {!! Form::open(['method' =>'POST','route'=>'generate-ticket-information-report','id'=>'submit','class'=>'report-form']) !!}
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('from_date', 'From Date', ['class' => 'control-label']) !!}<span
                                        class="required"> ( Required )</span>
                                {!! Form::text('from_date',@Input::get('from_date')? Input::get('from_date') : null,['id'=>'from_date','class' => 'form-control datepicker','required','placeholder'=>'Select from date', 'title'=>'Select from date']) !!}
                            </div>
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('to_date', 'To Date', ['class' => 'control-label']) !!}
                                {!! Form::text('to_date',@Input::get('to_date')? Input::get('to_date') : null,['id'=>'to_date','class' => 'form-control datepicker','placeholder'=>'Select to date', 'title'=>'Select to date']) !!}
                            </div>
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('passenger_name', 'Passenger Name', ['class' => 'control-label']) !!}
                                {!! Form::text('passenger_name',@Input::get('passenger_name')? Input::get('passenger_name') : null,['id'=>'passenger_name','class' => 'form-control','placeholder'=>'Select passenger name ', 'title'=>'Select passenger name']) !!}
                            </div>
                            <div class="col-lg-2 col-md-2">
                                {!! Form::label('airlines_id', 'Airlines', ['class' => 'control-label']) !!}
                                {!! Form::Select('airlines_id',$airlines_list, @Input::get('airlines_id')? Input::get('airlines_id') : null,['id'=>'buyer','class' => 'form-control js-select-searching','placeholder'=>'Select airlines', 'title'=>'Select airlines']) !!}
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
                        <table class="display table table-bordered table-striped dataTable" id="display">
                            <thead>
                            <tr>
                                <th style="width: 11.11%;"> Airlines Name</th>
                                <th style="width: 11.11%;"> Passenger Nsme</th>
                                <th style="width: 11.11%;"> Ticket Number</th>
                                <th style="width: 11.11%;"> Flying Date</th>
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
                    <th colspan="9" style="font-size:20px!important;text-align: center!important;">Airlines Information
                    </th>
                </tr>
                <tr>
                    <th style="width: 4%">SL#</th>
                    <th style="width: 24%;"> Airlines Name</th>
                    <th style="width: 24%;"> Passenger Nsme</th>
                    <th style="width: 24%;"> Ticket Number</th>
                    <th style="width: 24%;"> Flying Date</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($data))
                    <?php $sl = 0 ; ?>
                    @foreach($data as $values)
                        <tr class="gradeX">
                            <td style="width: 4%;">{{++$sl}}</td>
                            <td style="width: 24%;">{{isset($values->relAirlines)?$values->relAirlines->airlines_name:''}}</td>
                            <td style="width: 24%;">{{isset($values->relAirlines)?$values->relAirlines->airlines_name:''}}</td>
                            <td style="width: 24%;">{{$values->ticket_number}}</td>
                            <td style="width: 24%;">{{$values->flying_date}}</td>
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
                <table class="display table table-bordered table-striped dTable" id="innter-datatable">
                    <tbody>
                    @if(isset($data))
                        @foreach($data as $values)
                            <tr class="gradeX">
                                <td style="width: 25%;">
                                    <a href="{{route('details-ticket-information',$values->id)}}" target="_blank">
                                        {{isset($values->relAirlines)?$values->relAirlines->airlines_name:''}}
                                    </a>
                                </td>
                                <td style="width: 25%;">{{$values->passenger_name}}</td>
                                <td style="width: 25%;">{{$values->ticket_number}}</td>
                                <td style="width: 25%;">{{$values->flying_date}}
                                    <input name="hdId[]" type="hidden" value="{{$values->id}}"/>
                                </td>
                            </tr>
                        @endforeach
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
