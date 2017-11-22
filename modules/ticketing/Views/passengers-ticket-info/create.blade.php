@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop
@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <p>{{ Session::get('flash_message') }}</p>
        </div>
    @endif

    @if(Session::has('flash_message_error'))
        <div class="alert alert-danger">
            <p>{{ Session::get('flash_message_error') }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>{{ $page_title or '' }}</strong>
            <a class="pull-right back-button m-r-0" href="{{ route('passengers-ticket-info') }}">Back</a>
        </div>
        <div class="panel-body">
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

                {!! Form::open(['route' => ['store-passengers-ticket-info'],'id' => 'jq-validation-form', 'files' => true, 'id' => 'passengers-ticket-info-add-form']) !!}
                @include('ticketing::passengers-ticket-info._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@push('custom-script')
    <script>
        $(function () {
            $('#passengers-ticket-info-add-form').validate({
                rules: {
                    airlines_id: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        },
                    },
                    passenger_name: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                    ticket_number: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                },
                messages: {
                    airlines_id: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please choose Airlines",
                    passenger_name: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter passenger name",
                    ticket_number: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter ticket number",
                }
            });
        })
    </script>
@endpush