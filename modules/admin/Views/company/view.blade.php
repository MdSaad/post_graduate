<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">

                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Company/Person Name</th>
                        <td>{{ isset($data->company_name)?ucfirst($data->company_name):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Address1</th>
                        <td>{{ isset($data)?ucfirst($data->address1):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Address2</th>
                        <td>{{ isset($data)?ucfirst($data->address2):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Address3</th>
                        <td>{{ isset($data)?ucfirst($data->address3):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Contact No</th>
                        <td>{{ isset($data)?ucfirst($data->contact_no):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Email</th>
                        <td>{{ isset($data->email)?ucfirst($data->email):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Website</th>
                        <td>{{ isset($data)?ucfirst($data->website):''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Note</th>
                        <td>{{ isset($data)?$data->note:'' }}</td>
                    </tr>

                </table>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
        </div>
    </div>
</div>




