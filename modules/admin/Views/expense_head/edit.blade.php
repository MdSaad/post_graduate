<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Expense Head Edit</h4>
        </div>
        <div class="modal-body">


   {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-expense-head', $data->id],'id'=>'expense-head-edit-form']) !!}
            @include('admin::expense_head._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $("#expense-head-edit-form").validate({
        rules: {
            expense_head_name: "required",
        },
        messages: {
            expense_head_name: "Please enter expense head name!",
        }
    });

    $("#expense-head-edit-form").submit(function(e){

        var formAction = $(this).attr('action');

        e.preventDefault();

        $.ajax({
            url: formAction,
            type: 'POST',
            data: $('form').serialize(),
            success: function (data) {

                if(data == 1){
                    alert("This Expense Head Name has already been taken");
                }else{
                    location.reload();
                }
            }
        });
    })
</script>