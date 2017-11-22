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
        <div class="col-sm-12">
            {!! Form::label('country_name', 'Country Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('country_name', Input::old('country_name'), ['id'=>'country_name', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('short_name', 'Short Name:', ['class' => 'control-label']) !!}
            {!! Form::text('short_name', Input::old('short_name'), ['id'=>'short_name', 'class' => 'form-control', 'style'=>'text-transform:capitalize']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('country_code', 'Country Code:', ['class' => 'control-label']) !!}
            {!! Form::text('country_code', Input::old('country_code'), ['id'=>'country_code', 'class' => 'form-control', 'style'=>'text-transform:capitalize']) !!}
        </div>
    </div>
</div>
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required',$disabled,'title'=>'select status of title']) !!}
        </div>

    </div>
</div>


<p> &nbsp; </p>

<div class="form-margin-btn">
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
    {!! Form::submit('Save', ['class' => 'btn btn-info','data-placement'=>'top','data-content'=>'click save changes button for save company-group information']) !!}
</div>






