@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop

@section('content')
    {{--<div class="container">--}}
    <div class="panel panel-default">
        <div class="panel-heading"><strong>{{ $page_title or 'Edit' }}</strong>
            <a class="pull-right back-button m-r-0" href="{{ route('passengers-ticket-info') }}">Back</a>
        </div>
        <div class="panel-body">
            <div class="inner-wrapper form-page meeting-form-page">
                @if($errors->any())
                    <ul class="alert alert-danger alert-dismissable fade in">
                        @foreach($errors->all() as $error)
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
                {!! Form::model($data, ['method' => 'PATCH', 'files' => true, 'route'=> ['update-passengers-ticket-info', $data->id], 'id' => 'passengers-ticket-info-edit-form']) !!}
                @include('ticketing::passengers-ticket-info._update_form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--</div>--}}
@endsection

@push('custom-script')
    <script>
        $(function () {
            $('#passengers-ticket-info-edit-form').validate({
                rules: {
                    airlines_id: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
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