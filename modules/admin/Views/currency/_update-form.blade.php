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
            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('name', Input::old('name'), ['id'=>'name', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','name'=>'name']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('domestic', 'Domestic:', ['class' => 'control-label']) !!}
            {!! Form::select('domestic', array('yes'=>'Yes','no'=>'No'),Input::old('domestic'),['id'=>'domestic1','class' => 'form-control','required','title'=>'select domestic','onChange'=>'setvalue()']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('conversion_to', 'Conversion To:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('conversion_to', Input::old('conversion_to')?Input::old('conversion_to'):'1', ['id'=>'conversion_to1', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','name'=>'conversion_to']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required',$disabled,'title'=>'select status of company']) !!}
        </div>
    </div>
</div>
<p> &nbsp; </p>

<div class="form-margin-btn">
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save product-group information']) !!}
</div>

<script>

    function setvalue(){
        var value = $('#domestic1').val();
        if(value == 'yes'){
            $('#conversion_to1').val('1');
        }else{
            $('#conversion_to1').val('');
        }
    }
</script>


