<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ $pageTitle }} </h4>
        </div>
        <div class="modal-body">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Country Name</th>
                        <td>{{ isset($data->country)?ucfirst($data->country->country_name):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Airlines Name</th>
                        <td>{{ isset($data)?ucfirst($data->airlines_name):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data)?ucfirst($data->status):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Note</th>
                        <td>{{ isset($data)?ucfirst($data->note):''}}</td>
                    </tr>
                </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
        </div>
    </div>
</div>