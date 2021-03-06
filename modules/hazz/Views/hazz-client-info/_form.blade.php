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
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('client_name', 'Client Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('client_name', Input::old('client_name'), ['id'=>'client_name', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('contact_no', 'Contact No:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('contact_no', Input::old('contact_no'), ['id'=>'contact_no', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('email', Input::old('email'), ['id'=>'email', 'class' => 'form-control', 'required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('passport_no', 'Passport No:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('passport_no', Input::old('passport_no'), ['id'=>'passport_no', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('nid_no', 'NID No:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('nid_no', Input::old('contact_no'), ['id'=>'nid_no', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('booking_date', 'Booking Date:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="input-group">
                <input name="booking_date"
                       type="text"
                       id="date"
                       class="form-control datepicker" required/>
                <span class="input-group-btn">
                    <button class="btn btn-default"
                            style="padding-top: 3px">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('hazz_fair', 'Hazz Fair:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('hazz_fair', Input::old('hazz_fair'), ['id'=>'hazz_fair', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
            {{--<small class="required">(Required)</small>--}}
            {!! Form::textArea('address', Input::old('address'), ['id'=>'address', 'class' => 'form-control', 'style'=>'text-transform:capitalize;padding: 4px 3px;','placeholder'=>'', 'rows' => 1]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::textArea('note', Input::old('note'), ['id'=>'note', 'class' => 'form-control', 'style'=>'text-transform:capitalize;padding: 4px 3px;','placeholder'=>'', 'rows' => 1]) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required',$disabled,'title'=>'select status of title']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
    {!! Form::submit('Save', ['class' => 'btn btn-info','data-placement'=>'top','data-content'=>'click save changes button for save company-group information']) !!}
</div>






