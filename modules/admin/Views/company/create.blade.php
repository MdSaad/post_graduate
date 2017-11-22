    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a href="{{route('company')}}" class="close" type="button"> &times; </a>
                <h4 class="modal-title" id="myModalLabel">{{ $pageTitle }} <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"></span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'store-company','id' => 'company-form']) !!}
                    @include('admin::company._form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
