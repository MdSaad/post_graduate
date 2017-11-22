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
            {!! Form::label('company_name', 'Company Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('company_name', Input::old('company_name'), ['id'=>'company_name', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','company_name'=>'enter company name, example :: Main Company']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('address1', 'Address1:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('address1', Input::old('address1'), ['id'=>'address1', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','title'=>'enter company address, example :: Dhaka']) !!}
        </div>
    </div>
</div>


<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">

        <div class="col-sm-6">
            {!! Form::label('address2', 'Address2:', ['class' => 'control-label']) !!}
            {!! Form::text('address2', Input::old('address2'), ['id'=>'address2', 'class' => 'form-control', 'title'=>'enter company address2, example :: Dhaka']) !!}
        </div>

        <div class="col-sm-6">
            {!! Form::label('address3', 'Address3:', ['class' => 'control-label']) !!}
            {!! Form::text('address3', Input::old('address3'), ['id'=>'address3', 'class' => 'form-control','title'=>'enter company address3, example :: Dhaka']) !!}
        </div>

    </div>
</div>


<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">

        <div class="col-sm-6">
            {!! Form::label('email', 'email:', ['class' => 'control-label']) !!}
            {!! Form::text('email', Input::old('email'), ['id'=>'email', 'class' => 'form-control', 'email'=>'enter email, example :: example@ex.com']) !!}
        </div>

        <div class="col-sm-6">
            {!! Form::label('contact_no', 'Contact No:', ['class' => 'control-label']) !!}
            {!! Form::text('contact_no', Input::old('contact_no'), ['id'=>'contact_no', 'class' => 'form-control', 'contact_no'=>'enter contact no, example :: 0123456789']) !!}
        </div>

    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
            {!! Form::text('website', Input::old('website'), ['id'=>'website', 'class' => 'form-control','fax'=>'enter website, example :: https://www.google.com']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control',$disabled,'title'=>'select status of company']) !!}
        </div>

    </div>
</div>
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('logo', 'Logo:', ['class' => 'control-label']) !!}
            {!! Form::file('logo', ['id'=>'logo', 'class' => 'form-control','title'=>'click to upload product image.']) !!}
        </div>
        <div class="col-sm-6">
        </div>

    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">

        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::textarea('note', Input::old('note'), ['id'=>'note','size'=>'12x4', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>


<div class="form-margin-btn">
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save company information']) !!}
</div>


