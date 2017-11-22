<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Expense Sub Head Edit</h4>
        </div>
        <div class="modal-body">


   {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-expense-subhead', $data->id],'id'=>'expense-subhead-edit-form']) !!}
            @include('admin::expense_subhead._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $("#expense-subhead-edit-form").validate({
        rules: {
            expense_subhead_name: "required",
        },
        messages: {
            expense_subhead_name: "Please enter expense subhead name!",
        }
    });


    $("#expense-subhead-edit-form").submit(function(e){

        var formAction = $(this).attr('action');

        e.preventDefault();

        $.ajax({
            url: formAction,
            type: 'POST',
            data: $('form').serialize(),
            success: function (data) {

                if(data == 1){
                    alert("This subhead has already been taken");
                }else{
                    location.reload();
                }
            }
        });
    })
</script>