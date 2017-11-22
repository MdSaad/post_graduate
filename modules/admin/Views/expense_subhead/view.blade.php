<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ $pageTitle }} </h4>
        </div>
        <div class="modal-body">

                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Expense Head Code</th>
                        <td>{{ isset($data->expense_head->expense_code)?ucfirst($data->expense_head->expense_code):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Expense Head Name</th>
                        <td>{{ isset($data->expense_head->expense_head_name)?ucfirst($data->expense_head->expense_head_name):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Expense Sub Head Name</th>
                        <td>{{ isset($data->expense_subhead_name)?ucfirst($data->expense_subhead_name):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Note</th>
                        <td>{{ isset($data->note)?ucfirst($data->note):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?ucfirst($data->status):''}}</td>
                    </tr>
                </table>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
        </div>

    </div>
</div>