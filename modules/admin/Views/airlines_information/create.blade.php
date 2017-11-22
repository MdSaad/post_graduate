<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            {{--<a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form" onclick="close_modal();"> × </a>--}}
            <a class="close" type="button" title="click x button for close this entry form"  data-dismiss="modal">&times;</a>
            <h4 class="modal-title" id="myModalLabel">{{isset($page_title)?$page_title:'Add/Edit Country'}}<span style="color:#A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
        </div>
        <div class="modal-body">

            <div class="inner-wrapper form-page meeting-form-page">

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


                {!! Form::open(['route' => ['store-country'],'id' => 'airlines-add-form']) !!}
                    @include('admin::airline_information._form')
                {!! Form::close() !!}

            </div>

        </div> <!-- / .modal-body -->
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->





