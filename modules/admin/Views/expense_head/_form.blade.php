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

{{--<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('expense_head_code', 'Expense Head Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('expense_code', Input::old('expense_code'), ['id'=>'expense_code', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','title'=>'enter expense_code, example :: expense_code']) !!}
        </div>
    </div>
</div>--}}

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('expense_head_name', 'Expense head name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('expense_head_name', Input::old('expense_head_name'), ['id'=>'expense_head_name', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','title'=>'enter expense head name, example :: expense_head_name']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::textarea('note', Input::old('note'), ['id'=>'note', 'class' => 'form-control', 'style'=>'text-transform:capitalize','rows'=>4]) !!}
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






