<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Country Edit</h4>
        </div>
        <div class="modal-body">


   {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-country', $data->id],'id'=>'country-edit-form']) !!}
            @include('admin::country._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $("#country-edit-form").validate({
        rules: {
            country_name: "required",
        },
        messages: {
            country_name: "Please enter country name!",
        }
    });

    $("#country-edit-form").submit(function(e){
        var formAction = $(this).attr('action');
        e.preventDefault();
        $.ajax({
            url: formAction,
            type: 'POST',
            data: $('form').serialize(),
            success: function (data) {

                if(data == 1){
                    alert("This Country Name has already been taken");
                }else{
                    location.reload();
                }
            }
        });
    })
</script>