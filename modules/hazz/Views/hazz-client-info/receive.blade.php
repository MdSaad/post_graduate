<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Hazz Client Information Receive</h4>
        </div>
        <div class="modal-body">
            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['store-receive-hazz-client-info', $data->id],'id'=>'hazz-client-info-receive-form']) !!}
            @include('hazz::hazz-client-info._receive_form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    jQuery(function ($) {

        $('#hazz-client-info-receive-form').validate({
            rules: {
                receive_amount: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },
                receive_date: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                }
            },
            messages: {
                receive_amount: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter receive amount",
                receive_date: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter receive date",
            }
        });

        $('.datepicker2').datepicker({
            format: 'yyyy-mm-dd'
            //autoclose: true
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });

    })
</script>