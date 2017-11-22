<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Expense Head Edit</h4>
        </div>
        <div class="modal-body">


   {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-expense-details', $data->id],'id'=>'expense-details-edit-form']) !!}
            @include('ticketing::expense_details._update-form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>

    $(function(e){
        $('.datepicker1').datepicker({
            format: 'yyyy-mm-dd'
            //autoclose: true
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });
    })


    $("#expense-details-edit-form").validate({
        rules: {
            expense_head_id: "required",
            expense_title: "required",
            expense_date: "required",
            expense_amount: "required",
        },
        messages: {
            expense_head_id: "Please select expense head!",
            expense_title: "Please enter expense title!",
            expense_date: "Please enter expense date!",
            expense_amount: "Please enter expense amount!",
        }
    });

    $('#expense_head_id1').change(function(e){
        var expense_head_id = $(this).val();
        $.get("{{url('ticketing/get_subhead_by_headid')}}/"+expense_head_id,function(data){
            // console.log(data);
            $('#expense_subhead_id1').html(data);
        });
    })
</script>