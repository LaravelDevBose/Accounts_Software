<div  class="row">

    <div id="rBody">

    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="widget-box" >
            <div class="widget-header">
                <h4 class="widget-title">View Car Purchase Estimate Pricing Information</h4>
                <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="row" id="data_table">
                        <div id="header" style="display: none;">
                            <?php $this->load->view('admin/partials/print_header');?>
                        </div>
                        <div id="rBody">

                            <div class="col-md-6" style="width: 50%; float: left;">
                                <div class="row" style="padding: 15px;">
                                    <div class="col-xs-12 label label-lg label-info arrowed-in arrowed-right">
                                        <b>Car Info</b>
                                    </div>
                                </div>
                                <div class="profile-user-info profile-user-info-striped">

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Purchases No </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="age"><?= $pricing->pus_sl ?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Chassis No </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="age"><?= $pricing->puc_chassis_no ?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Engine No: </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="signup"><?= $pricing->puc_engine_no ?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Car Model: </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="login"><?= $pricing->puc_car_model ?></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-6" style="width: 50%; float: left; margin-bottom: 30px;">

                                <div class="row" style="padding: 15px;">
                                    <div class="col-xs-12 label label-lg label-success arrowed-in arrowed-right">
                                        <b>Other Info</b>
                                    </div>
                                </div>
                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name" style="width: 150px;">Customer Name:</div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="username"><?= $pricing->cus_name; ?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name" style="width: 150px;">Customer Phone No: </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="age"><?= $pricing->cus_contact_no; ?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name" style="width: 150px;">Supplier Name: </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="signup"><?= $pricing->sup_name; ?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name" style="width: 150px;">Supplier Phone No: </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="login"><?= $pricing->sup_phone; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2" ></div>
                            <div class="col-md-8">
                                <table id="simple-table" class="table  table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">Expense Head</th>
                                        <th class="center">Amount</th>
                                        <th class="center">Expense Head</th>
                                        <th class="center">Amount</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <th>L/C Value</th>
                                        <td style="text-align: right;"><?= number_format($pricing->lc_value ,2); ?></td>
                                        <th>OBC Value</th>
                                        <td style="text-align: right;"><?= number_format($pricing->obc_value ,2); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Incurance Charge</th>
                                        <td style="text-align: right;"><?= number_format($pricing->insurance_charge ,2); ?></td>
                                        <th>Final Dosis</th>
                                        <td style="text-align: right;"><?= number_format($pricing->final_dosis ,2); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Custom Duty</th>
                                        <td style="text-align: right;"><?= number_format($pricing->custom_value ,2); ?></td>
                                        <th>C&F Agent</th>
                                        <td style="text-align: right;"><?= number_format($pricing->cf_agent ,2); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cuharf Rent</th>
                                        <td style="text-align: right;"><?= number_format($pricing->cuharf_value ,2); ?></td>
                                        <th>S/Charge</th>
                                        <td style="text-align: right;"><?= number_format($pricing->s_charge ,2); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Registration</th>
                                        <td style="text-align: right;"><?= number_format($pricing->regi_charge ,2); ?></td>
                                        <th>1st Party Insurance</th>
                                        <td style="text-align: right;"><?= number_format($pricing->first_party_insu ,2); ?></td>
                                    </tr>
                                    <tr>
                                        <th>3st Party Insurance:</th>
                                        <td style="text-align: right;"><?= number_format($pricing->third_party_insu ,2); ?></td>
                                        <th>WorkShop Bill</th>
                                        <td style="text-align: right;"><?= number_format($pricing->workshop_bill ,2); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Decuration Bill</th>
                                        <td style="text-align: right;"><?= number_format($pricing->decuration_bill ,2); ?></td>
                                        <th>Other Expense</th>
                                        <td style="text-align: right;"><?= number_format($pricing->other_exp ,2); ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-10">
                                <p style="text-align: right; font-weight: 800; font-size: 20px; ">Total Estimate Price: <?= number_format($pricing->total_price, 2)?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





