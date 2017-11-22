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
            {!! Form::label('expense_head_id', 'Expense head name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('expense_head_id', $expense_head_list,Input::old('expense_head_id'),['class' => 'form-control','required','title'=>'select expense subhead']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('expense_subhead_name', 'Expense sub head name:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('expense_subhead_name', Input::old('expense_subhead_name'), ['id'=>'expense_subhead_name', 'class' => 'form-control', 'style'=>'text-transform:capitalize','required','title'=>'enter expense subhead name, example :: expense_subhead_name']) !!}
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






