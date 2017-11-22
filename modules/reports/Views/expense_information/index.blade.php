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
                    {!! Form::open(['method' =>'POST','route'=>'generate-expense-information-report','id'=>'submit','class'=>'report-form']) !!}
                    <div class="row">
                        <div class="col-xs-4">
                            {!! Form::label('from_date', 'From Date', ['class' => 'control-label']) !!}<span
                                    class="required"> ( Required )</span>
                            {!! Form::text('from_date',@Input::get('from_date')? Input::get('from_date') : null,['id'=>'from_date','class' => 'form-control datepicker','required','placeholder'=>'Select from date', 'title'=>'Select from date']) !!}
                        </div>
                        <div class="col-xs-4">
                            {!! Form::label('end_date', 'To Date', ['class' => 'control-label']) !!}
                            {!! Form::text('end_date',@Input::get('end_date')? Input::get('end_date') : null,['id'=>'to_date','class' => 'form-control datepicker','placeholder'=>'Select to date', 'title'=>'Select to date']) !!}
                        </div>
                        <div class="col-lg-2 col-md-2">
                            {!! Form::label('expense_head', 'Expense Head', ['class' => 'control-label']) !!}
                            {!! Form::Select('expense_head',$expense_head_list, @Input::get('expense_head')? Input::get('expense_head') : null,['class' => 'form-control js-select-searching expense-head','id'=>'expense_head','placeholder'=>'select expense head', 'title'=>'Select expense head']) !!}
                        </div>
                        <div class="col-lg-2 col-md-2">
                            {!! Form::label('expense_subhead', 'Expense SubHead', ['class' => 'control-label']) !!}
                            {!! Form::Select('expense_subhead',$expense_subhead_list, @Input::get('expense_subhead')? Input::get('expense_subhead') : null,['class' => 'form-control js-select-searching expense-subhead','id'=>'expense_subhead','placeholder'=>'select expense subhead', 'title'=>'Select expense subhead']) !!}
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
                        {!! Form::open(['method' =>'POST','route'=>'generate-expense-information-report','id'=>'submit','class'=>'report-form']) !!}
                        <div class="col-lg-2 col-md-2">
                            {!! Form::label('from_date', 'From Date', ['class' => 'control-label']) !!}<span
                                    class="required"> ( Required )</span>
                            {!! Form::text('from_date',@Input::get('from_date')? Input::get('from_date') : null,['id'=>'from_date','class' => 'form-control datepicker','required','placeholder'=>'Select from date', 'title'=>'Select from date']) !!}
                        </div>
                        <div class="col-lg-2 col-md-2">
                            {!! Form::label('end_date', 'To Date', ['class' => 'control-label']) !!}
                            {!! Form::text('end_date',@Input::get('end_date')? Input::get('end_date') : null,['id'=>'end_date','class' => 'form-control datepicker','placeholder'=>'Select to date', 'title'=>'Select to date']) !!}
                        </div>
                        <div class="col-lg-2 col-md-2">
                            {!! Form::label('expense_head', 'Expense Head', ['class' => 'control-label']) !!}
                            {!! Form::Select('expense_head',$expense_head_list, @Input::get('expense_head')? Input::get('expense_head') : null,['class' => 'form-control js-select-searching expense-head','id'=>'expense_head','placeholder'=>'select expense head', 'title'=>'Select expense head']) !!}
                        </div>
                        <div class="col-lg-2 col-md-2">
                            {!! Form::label('expense_subhead', 'Expense SubHead', ['class' => 'control-label']) !!}
                            {!! Form::Select('expense_subhead',$expense_subhead_list, @Input::get('expense_subhead')? Input::get('expense_subhead') : null,['class' => 'form-control js-select-searching expense-subhead','id'=>'expense_subhead','placeholder'=>'select expense subhead', 'title'=>'Select expense subhead']) !!}
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
                                <th style="width: 11.11%;">  Expense Date </th>
                                <th style="width: 11.11%;">  Expense Head </th>
                                <th style="width: 11.11%;">  Expense SubHead </th>
                                <th style="width: 11.11%;">   Expenses Title </th>
                                <th style="width: 11.11%;"> Expense Amount</th>
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
                    <th colspan="6">Expense Information</th>
                </tr>
                <tr>
                    <th style="width: 3%;">  SL# </th>
                    <th style="width: 19%;">  Expense Date </th>
                    <th style="width: 19%;">  Expense Head </th>
                    <th style="width: 19%;">  Expense SubHead </th>
                    <th style="width: 19%;">  Expenses Title </th>
                    <th style="width: 19%;"> Expense Amount</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data) && count($data) > 0)
                <?php $sl = 0 ; $prev_expense_date = '' ; $prev_expense_head = '' ; $prevDateAndHead = '' ; $total_amount = 0 ; ?>

                @foreach($data as $datum)

                    <?php $sub_amount = 0 ; $date_count = 0 ; $date_head_count = 0 ; $current_date_and_head = $datum->expense_date.$datum->expense_head_id;
                    $total_amount +=$datum->expense_amount ;
                    if($prev_expense_date != $datum->expense_date){
                        foreach($data as $d){
                            if($d->expense_date == $datum->expense_date){
                                ++$date_count ;
                                $sub_amount += $datum->expense_amount ;
                            }
                        }
                    }


                    if($prevDateAndHead != $current_date_and_head){
                        foreach($data as $dd){
                            if($dd->expense_date.$dd->expense_head_id == $current_date_and_head){
                                ++$date_head_count ;
                            }
                        }
                    }
                    ?>

                    <tr class="gradeX">
                        <td> {{ ++$sl }}</td>

                        @if($prev_expense_date != $datum->expense_date)
                            <td rowspan="{{$date_count}}" style="vertical-align: middle">
                                {{$datum->expense_date}}
                            </td>
                        @endif


                        @if($prevDateAndHead != $current_date_and_head)
                            <td rowspan="{{$date_head_count}}" style="vertical-align: middle">
                                {{ucfirst($datum->expense_head->expense_head_name)}}
                            </td>
                        @endif
                        <td>{{$datum->expense_subhead->expense_subhead_name}}</td>
                        <td>{{$datum->expense_title}}</td>

                        <td>{{ucfirst($datum->expense_amount)}}
                            <input type="hidden" value="{{$datum->id}}" name="hdId[]">
                        </td>
                    </tr>

                    <?php $prev_expense_date = $datum->expense_date ; $prev_expense_head = $datum->expense_head_id ; $prevDateAndHead = $prev_expense_date . $prev_expense_head;
                    ?>
                @endforeach


                <tr>
                    <td></td>
                    <td colspan="4" style="text-align: right!important">Total Amount = </td>

                    <td>{{$total_amount}}</td>
                </tr>
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
                <?php $total_amount = 0 ; $sl1 = 0 ;  ?>
                <tbody>
                @if(isset($data) && count($data) > 0)
                    <?php $prev_expense_date = '' ; $prev_expense_head = '' ; $prevDateAndHead = '' ; $prev_expense_date_forSub = '' ;  ?>

                    @foreach($data as $datum)

                        <?php ++$sl1;  $sl2 = 0 ; $date_count = 0 ; $date_head_count = 0 ; $subCount = 0 ; $current_date_and_head = $datum->expense_date.$datum->expense_head_id; $curr_expense_date_forSub = $datum->expense_date ;
                        $total_amount +=$datum->expense_amount ;

                        if($prev_expense_date != $datum->expense_date){
                            $sub_amount = 0 ;
                            foreach($data as $d){
                                if($d->expense_date == $datum->expense_date){
                                    ++$date_count ;
                                    ++$sl2;
                                    $sub_amount += $d->expense_amount;
                                }
                            }
                        }


                        if($prevDateAndHead != $current_date_and_head){
                            foreach($data as $dd){
                                if($dd->expense_date.$dd->expense_head_id == $current_date_and_head){
                                    ++$date_head_count ;
                                }
                            }
                        }
                        ?>
                        <?php if($date_count == 1) $sl2 = 0 ; ?>

                        <tr class="gradeX">
                            @if($prev_expense_date != $datum->expense_date)
                                <td rowspan="{{$date_count}}" style="width:20%;vertical-align: middle">
                                    {{$datum->expense_date}}
                                </td>
                            @endif


                            @if($prevDateAndHead != $current_date_and_head)
                                <td rowspan="{{$date_head_count}}" style="width:20%;vertical-align: middle">
                                    {{ucfirst($datum->expense_head->expense_head_name)}}
                                </td>
                            @endif
                            <td>{{$datum->expense_subhead->expense_subhead_name}}</td>
                            <td style="width:20%;">
                                <a href="{{route('details-expense-information',$datum->id)}}" target="_blank">
                                    {{$datum->expense_title}}
                                </a>
                            </td>
                            <td style="width:20%;">{{ucfirst($datum->expense_amount)}}
                                <input type="hidden" value="{{$datum->id}}" name="hdId[]">
                            </td>
                        </tr>

                        @if($sl1 > $sl2 )
                            <tr class="gradeX">
                                <td colspan="4" style="text-align: right">Sub Total =</td>
                                <td rowspan="{{$date_count}}" style="vertical-align: middle">
                                    {{$sub_amount}}
                                </td>
                            </tr>
                            <?php $sl1 = 0 ; $sl2 = 0 ; ?>
                        @endif

                        <?php   ++$subCount; $prev_expense_date = $datum->expense_date ; $prev_expense_head = $datum->expense_head_id ; $prevDateAndHead = $prev_expense_date . $prev_expense_head; $prev_expense_date_forSub = $datum->expense_date ;
                        ?>
                    @endforeach


                    <tr>
                        <td colspan="4" style="text-align: right">Total Amount = </td>

                        <td>{{$total_amount}}</td>
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

        var head_id = $(".expense-head").val();
        if(head_id.length > 0) {
            $.get("{{url('report/get-all-subhead')}}/" + head_id, function (result) {
                //  console.log(result);
                $('.expense-subhead').html(result);
            });
        }
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
            if (values.length <= 0)
                return false;
            $(this).attr("href", "{{url('report/collection-pdf')}}/" + values);
        });
        $('.expense-head').change(function (e) {
            var id = $(this).val();
            if (id.length <= 0) {
                return false;
            }
            $.get("{{url('report/get-all-subhead')}}/" + id, function (result) {
                $('.expense-subhead').html(result);
            });
        })
    </script>
@endsection
