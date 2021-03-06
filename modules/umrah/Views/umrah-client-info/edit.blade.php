<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Umrah Client Information Edit</h4>
        </div>
        <div class="modal-body">
            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-umrah-client-info', $data->id],'id'=>'umrah            -client-info-edit-form']) !!}
            @include('umrah::umrah-client-info._update_form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $(function () {

        $('#umrah-client-info-edit-form').validate({
            rules: {
                client_name: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },
                contact_no: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },
                email: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },
                passport_no: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },
                nid_no: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },
                booking_date: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },
                umrah_fair: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                }
            },
            messages: {
                client_name: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter client name",
                contact_no: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter contact no",
                email: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter email",
                passport_no: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter passport no",
                nid_no: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter national ID no",
                booking_date: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter booking date",
                umrah_fair: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter umrah fair",
            }
        });

        $('.datepicker1').datepicker({
            format: 'yyyy-mm-dd'
            //autoclose: true
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });

    })
</script>