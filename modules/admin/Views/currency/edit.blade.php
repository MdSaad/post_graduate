<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Currency Edit</h4>
        </div>
        <div class="modal-body">
            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-currency', $data->id],'id'=>'currency-edit-form']) !!}
            @include('admin::currency._update-form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    $("#currency-edit-form").validate({
        rules: {
            name: "required",
            conversion_to: "required",
        },
        messages: {
            name: "Please enter currency name!",
            conversion_to: "Please enter conversion to!",
        }
    });

    $("#currency-edit-form").submit(function(e){

        var formAction = $(this).attr('action');

        e.preventDefault();

        $.ajax({
            url: formAction,
            type: 'POST',
            data: $('form').serialize(),
            success: function (data) {

                if(data == 1){
                    alert("This Currency Name has already been taken");
                }else{
                    location.reload();
                }
            }
        });
    })

</script>