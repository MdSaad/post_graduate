<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Country Edit</h4>
        </div>
        <div class="modal-body">


   {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-airlines', $data->id],'id'=>'airlines-edit-form']) !!}
            @include('admin::airlines_information._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $("#airlines-edit-form").validate({
        rules: {
            country_id: "required",
            airlines_name: "required",
        },
        messages: {
            country_id: "Please enter country name!",
            airlines_name: "Please enter airlines name!",
        }
    });

    $("#airlines-edit-form").submit(function(e){
        e.preventDefault();
        var formAction = $(this).attr('action');
        $.ajax({
            url: formAction,
            type: 'POST',
            data: $('form').serialize(),
            success: function (data) {

                if(data == 1){
                    alert("This Airlines name has already been taken!");
                }else{
                    location.reload();
                }
            }
        });
    })
</script>