<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">{{ $pageTitle }} </h4>
        </div>
        <div class="modal-body">
            <table id=""
                   class="table table-bordered table-hover table-striped">
                <tr>
                    <th class="col-lg-4">Client Name</th>
                    <td>{{ isset($data)?ucfirst($data->client_name):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Contact No</th>
                    <td>{{ isset($data)?ucfirst($data->contact_no):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Email</th>
                    <td>{{ isset($data)?ucfirst($data->email):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Passport No</th>
                    <td>{{ isset($data)?ucfirst($data->passport_no):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">NID No</th>
                    <td>{{ isset($data)?ucfirst($data->nid_no):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Booking Date</th>
                    <td>{{ isset($data)?date('D m Y', strtotime($data->booking_date)):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Hazz Fair</th>
                    <td>{{ isset($data)?ucfirst($data->hazz_fair):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Receive Amount</th>
                    <td>{{ isset($data)?$data->relHazzClientPaymentReceive->sum('receive_amount'):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Due Amount</th>
                    <?php
                    if (isset($data->hazz_fair)) {
                        $dueAmount = $data->hazz_fair - $data->relHazzClientPaymentReceive->sum('receive_amount');
                    }
                    ?>
                    <td>{{ $dueAmount or ''  }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Address</th>
                    <td>{{ isset($data)?ucfirst($data->address):''}}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Note</th>
                    <td>{{ isset($data)?ucfirst($data->note):''}}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button"
                    class="btn btn-default"
                    data-dismiss="modal"
                    aria-label="Close">
                <span aria-hidden="true">Close</span>
            </button>
        </div>
    </div>
</div>