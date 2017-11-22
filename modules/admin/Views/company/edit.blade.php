<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Company</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-company', $data->id],'id'=>'company-edit-form','enctype'=>'multipart/form-data']) !!}
            @include('admin::company._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

<script>

    $("#company-edit-form").validate({
        rules: {
            company_name: "required",
            address1: "required",
        },
        messages: {
            company_name: "Please enter company name!",
            address1: "Please enter company address1!",
        }
    });

    $("#company-edit-form").submit(function(e){
        e.preventDefault();
        var formAction = $(this).attr('action');
        $.ajax({
            url: formAction,
            headers: {
                'X-CSRF-Token': $('form.file-form [name="_token"]').val()
            },
            type: 'POST',
            data:  new FormData($("#company-edit-form")[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if(data == 1){
                    alert("This Company Name has already been taken");
                }else{
                    location.reload();
                }
            }
        });
    })

</script>

