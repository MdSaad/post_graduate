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
            {!! Form::label('expense_head_id', 'Expense Head:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('expense_head_id', $expense_head_list,Input::old('expense_head_id'),['class' => 'form-control','id'=>'expense_head_id1','required','title'=>'select expense head']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('expense_subhead_id', 'Expense SubHead:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('expense_subhead_id', $expense_subhead_list,Input::old('expense_subhead_id'),['class' => 'form-control','id'=>'expense_subhead_id1','required','title'=>'select expense head']) !!}
        </div>

    </div>
</div>


<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('expense_title', 'Expense Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('expense_title', Input::old('expense_title'), ['id'=>'expense_title', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','title'=>'enter expense title, example :: expense title']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('expense_date', 'Expense Date:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('expense_date', Input::old('expense_date'), ['id'=>'expense_date', 'class' => 'form-control datepicker', 'style'=>'text-transform:capitalize','required','title'=>'enter expense_date, example :: 2017-11-16']) !!}
        </div>
    </div>
</div>
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('expense_amount', 'Expense Amount:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('expense_amount', Input::old('expense_amount'), ['id'=>'expense_amount', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','title'=>'enter expense_amount, example :: expense amount']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required',$disabled,'title'=>'select status of title']) !!}
        </div>
    </div>
</div>
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::textarea('note', Input::old('note'), ['id'=>'note', 'class' => 'form-control','size'=>'12x4', 'style'=>'text-transform:capitalize','title'=>'enter note, example :: note']) !!}
        </div>
    </div>
</div>
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">


    </div>
</div>


<p> &nbsp; </p>

<div class="form-margin-btn">
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
    {!! Form::submit('Save', ['class' => 'btn btn-info','data-placement'=>'top','data-content'=>'click save changes button for save company-group information']) !!}
</div>
