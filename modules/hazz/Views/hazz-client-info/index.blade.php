@extends('admin::layouts.master')
@section('sidebar')
    @parent
    @include('admin::layouts.sidebar')
@stop

@section('content')

    <!-- page start-->
    <section
            class="panel">
        <div class="panel-heading">
            <span>{{ $page_title }}</span>
            <a class="btn-sm btn-success pull-right paste-blue-button-bg"
               data-toggle="modal"
               href="#addData">
                <b>Add
                   Hazz
                   Client
                   Information</b>
            </a>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="adv-table">

                <table class="display table table-bordered border-none table-striped dataTable"
                       id="example">
                    <thead>
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Client
                            Name
                        </th>
                        <th>
                            Booking
                            Date
                        </th>
                        <th>
                            Passport
                            No
                        </th>
                        <th>
                            Hazz
                            Fair
                        </th>
                        <th>
                            Receive
                            Amount
                        </th>
                        <th>
                            Due
                            Amount
                        </th>
                        <th class="nosort">
                            Status
                        </th>
                        <th class="nosort">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tfoot class="search-section">
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            <input type="text"
                                   placeholder=""/>
                        </th>
                        <th>
                            <input type="text"
                                   placeholder=""/>
                        </th>
                        <th>
                            <input type="text"
                                   placeholder=""/>
                        </th>
                        <th>
                            <input type="text"
                                   placeholder=""/>
                        </th>
                        <th>
                            <input type="text"
                                   placeholder=""/>
                        </th>
                        <th>
                            <input type="text"
                                   placeholder=""/>
                        </th>
                        <th>
                            <select>
                                <option value="">
                                    Select
                                </option>
                            </select>
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($data))
                        @foreach($data as $values)
                            <tr class="gradeX">
                                <td>{{$values->id or ''}}</td>
                                <td>{{ isset($values->client_name) ? ucfirst($values->client_name) : 'N/A'  }}</td>
                                <td>{{ isset($values->booking_date) ? date('d M Y', strtotime($values->booking_date)) : 'N/A' }}</td>
                                <td>{{ isset($values->passport_no) ? ucfirst($values->passport_no) : 'N/A' }}</td>
                                <td>{{ isset($values->hazz_fair) ? ucfirst($values->hazz_fair) : 'N/A' }}</td>
                                <td>{{ isset($values->relHazzClientPaymentReceive) ? $values->relHazzClientPaymentReceive->sum('receive_amount') : 'N/A' }}</td>
                                <?php
                                if (isset($values->hazz_fair)) {
                                    $dueAmount = $values->hazz_fair - $values->relHazzClientPaymentReceive->sum('receive_amount');
                                }
                                ?>
                                <td>{{ $dueAmount or 'N/A' }}</td>
                                <td>{{ isset($values->status) ? ucfirst($values->status) : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('view-hazz-client-info', $values->id) }}"
                                       class="btn btn-info btn-xs"
                                       data-toggle="modal"
                                       data-target="#etsbModal"
                                       data-placement="top"
                                       data-content="view">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('edit-hazz-client-info', $values->id) }}"
                                       class="ddd btn btn-primary btn-xs"
                                       data-toggle="modal"
                                       data-target="#etsbModal"
                                       data-placement="top"
                                       data-content="update">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('delete-hazz-client-info', $values->id) }}"
                                       class="btn btn-danger btn-xs"
                                       onclick="return confirm('Are you sure to Delete?')"
                                       data-placement="top"
                                       data-content="delete">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <a href="{{ route('receive-hazz-client-info', $values->id) }}"
                                       class="ddd btn btn-primary btn-xs"
                                       data-toggle="modal"
                                       data-target="#etsbModal"
                                       data-placement="top"
                                       data-content="receive">
                                        <i class="fa fa-get-pocket"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- page end-->

    <!-- modal -->


    <!-- Modal  -->

    <div id="addData"
         class="modal fade"
         tabindex=""
         role="dialog"
         style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Hazz Client Information</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store-hazz-client-info','id' => 'hazz-client-info-add-form']) !!}
                    @include('hazz::hazz-client-info._form')
                    {!! Form::close() !!}
                </div>
                <!-- / .modal-body -->

            </div>
            <!-- / .modal-content -->
        </div>
        <!-- / .modal-dialog -->
    </div>


    <div class="modal fade"
         id="etsbModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true"
         data-backdrop="static">
    </div>


    <!-- modal -->

    <!--script for this page only-->

    @if($errors->any())
        <script type="text/javascript">
            $(function () {
                var val_method = '<?php echo Session::get('val_method') ?>';
                if (val_method == 'store') {
                    $("#addData").modal('show');
                } else {
                    <?php Session::flash('errors', $errors); ?>
                    $('.ddd').trigger('click');
                }
            });
        </script>
    @endif
    @if(Session::has('flash_message_error'))
        <script type="text/javascript">
            $(function () {
                // $("#etsbModal").modal('show');
                <?php
                $ddd = $errors->first();

                Session::flash('errors', $ddd);
                ?>

                $('.ddd').trigger('click');
            });
        </script>
    @endif
    <!--script for this page only-->
@stop

@section('custom-script')
    <script>
        var column_index = [8];
        var class_name = 'dataTable';
        create_data_table(class_name, column_index);
        /*$("#country-add-form").validate({
            rules: {
                country_name: "required",
            },
            messages: {
                country_name: "Please enter country name!",
            }
        });*/

        $(function () {
            $('#hazz-client-info-add-form').validate({
                rules: {
                    client_name: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                    contact_no: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                    email: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                    passport_no: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                    nid_no: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                    booking_date: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    },
                    hazz_fair: {
                        required: true,
                        normalizer: function (value) {
                            return $.trim(value);
                        }
                    }
                },
                messages: {
                    client_name: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter client name",
                    contact_no: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter contact no",
                    email: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter email",
                    passport_no: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter passport no",
                    nid_no: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter national ID no",
                    booking_date: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter booking date",
                    hazz_fair: "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter hazz fair",
                }
            });
        })

    </script>
@endsection