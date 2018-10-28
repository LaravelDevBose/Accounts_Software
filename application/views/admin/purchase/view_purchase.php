<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Purchase Car Full Information</h4>
                <div class="widget-toolbar">
                    <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
                </div>
            </div>

            <div class="widget-body" id="data_table">
                <div id="header" style="display: none;">
                  <?php $this->load->view('admin/partials/print_header');?>
                </div>
                <div class="widget-main">
                    <div class="row">
                        <div class="col-md-6" style="width: 50%; float: left;">
                            <div class="row" style="padding: 15px;">
                                <div class="col-xs-12 label label-lg label-info arrowed-in arrowed-right">
                                    <b>Car Details Info</b>
                                </div>
                            </div>
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Chassis No </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="age"><?= $purchase->puc_chassis_no ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Engine No: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="signup"><?= $purchase->puc_engine_no ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Car Model: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="login"><?= $purchase->puc_car_model ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> L/C No: </div>

                                    <div class="profile-info-value">
                                        <?php 
                                          $lc_no = ''; $bank_name = ''; if($purchase->puc_lc_id != 0 && $purchase->puc_lc_id !=  ''){
                                            $lc_info = $this->LC_model->lc_data_by_id($purchase->puc_lc_id);
                                            $lc_no = $lc_info->lc_no;
                                            $bank_name = $lc_info->bank_name.'-';
                                          }
                                        ?>
                                        <span class="editable" id="city"><?= $bank_name.$lc_no ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Color: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $purchase->puc_color ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Make: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $purchase->puc_make ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Grade: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $purchase->puc_grade ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Type: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $purchase->puc_type ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Year: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $purchase->puc_year ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Mileage: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $purchase->puc_mileage ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Other Tirm: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $purchase->puc_other_tirm ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> purchase Status: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about">
                                            <?php if($purchase->car_status == 1): ?>
                                              <span class="label " style="background: #36a2ec;">Deliver</span>
                                              <?php else: ?>
                                              <span class="label " style="background: #ec880a;">Un Deliver</span>
                                              <?php endif;?>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6" style="width: 50%; float: right;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-xs-12 label label-lg label-success arrowed-in arrowed-right">
                                            <b>Supplier Info</b>
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Name:</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="username"><?= $supplier->sup_name; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name">supplier Id:</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="city"><?= $supplier->sup_code; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Contact No: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="age"><?= $supplier->sup_phone; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> E-mail: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="login"><?= $supplier->sup_email; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Address: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="about"><?= $supplier->sup_address; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                               
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>