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

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="nice-border p-20">
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('airlines_id', 'Airlines Name :', ['class' => 'control-label']) !!}
                <small class="required">
                    (Required)
                </small>
                {!! Form::select('airlines_id', $airlines,
                Input::old('airlines_id'),
                ['class' => 'form-control js-select',
                'id' => 'airlines_id',
                'style'=>'width:100%'
                ]) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('passenger_name', 'Passenger Name:', ['class' => 'control-label']) !!}
                <small class="required">
                    (Required)
                </small>
                {!! Form::text('passenger_name', Input::old('passenger_name'), ['id'=>'passenger_name', 'class' => 'form-control', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('ticket_number', 'Ticket Number:', ['class' => 'control-label']) !!}
                <small class="required">
                    (Required)
                </small>
                {!! Form::text('ticket_number', Input::old('ticket_number'), ['id'=>'ticket_number', 'class' => 'form-control', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('issue_date', 'Issue Date:', ['class' => 'control-label']) !!}
                <div class="input-group">
                    <input name="issue_date"
                           type="text"
                           id="issue_date"
                           class="form-control datepicker"/>
                    <span class="input-group-btn">
                    <button class="btn btn-default"
                            style="padding-top: 3px">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
                </div>
            </div>
            <div class="col-sm-4">
                {!! Form::label('flying_date', 'Flying Date:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                <div class="input-group">
                    <input name="flying_date"
                           type="text"
                           id="date"
                           class="form-control datepicker"/>
                    <span class="input-group-btn">
                    <button class="btn btn-default"
                            style="padding-top: 3px">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
                </div>
            </div>
            <div class="col-sm-4">
                {!! Form::label('root_type', 'Booking Type :', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::select('root_type', DataArray::$root_type,
                Input::old('root_type'),
                ['class' => 'form-control js-select',
                'id' => 'root_type',
                'style'=>'width:100%'
                ]) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('root_from', 'Route Departure:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('root_from', Input::old('root_from'), ['id'=>'root_from', 'class' => 'form-control', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('root_to', 'Route Destination:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('root_to', Input::old('root_to'), ['id'=>'root_to', 'class' => 'form-control', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('selling_price', 'Selling Price:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('selling_price', Input::old('selling_price'), ['id'=>'selling_price', 'class' => 'form-control', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('basic_fair', 'Basic Fair:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('basic_fair', Input::old('basic_fair'), ['id'=>'basic_fair', 'class' => 'form-control sum', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('tax_amount', 'Tax Amount:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('tax_amount', Input::old('tax_amount'), ['id'=>'tax_amount', 'class' => 'form-control sum', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('ait_amount', 'AIT Amount:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('ait_amount', Input::old('ait_amount'), ['id'=>'ait_amount', 'class' => 'form-control sum', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('commission', 'Commission:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('commission', Input::old('commission'), ['id'=>'commission', 'class' => 'form-control', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
                {{--<small class="required">(Required)</small>--}}
                {!! Form::text('reference', Input::old('reference'), ['id'=>'reference', 'class' => 'form-control', 'style'=>'text-transform:capitalize','placeholder'=>'']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required',$disabled,'title'=>'select status of title']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {!! Form::label('notes', 'Notes:', ['class' => 'control-label']) !!}
                {!! Form::textArea('notes', Input::old('notes'), ['id'=>'notes', 'class' => 'form-control', 'style'=>'text-transform:capitalize;padding: 4px 3px;','placeholder'=>'', 'rows' => 3]) !!}
            </div>
        </div>
    </div>
</div>

<div class="form-margin-btn pull-right m-t-10">
    {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
</div>

@push('custom-script')
    <script>
        $(document).ready(function() {
            //this calculates values automatically
            calculateSum();

            $(".sum").on("keydown keyup", function() {
                calculateSum();
            });
        });

        function calculateSum() {
            var sum = 0;
            //iterate through each textboxes and add the values
            $(".sum").each(function() {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                    $(this).css("background-color", "#ffffe6");
                }
                else if (this.value.length != 0){
                    $(this).css("background-color", "#ff9999");
                }
            });

            var commission = $('#selling_price').val() - sum
            $("input#commission").val(commission.toFixed(2))
        }
    </script>
@endpush




