<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Order Details Information</h4>
                <div class="widget-toolbar">
                    <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
                </div>
            </div>

            <div class="widget-body" id="data_table">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row" style="padding: 15px;">
                                <div class="col-xs-12 label label-lg label-info arrowed-in arrowed-right">
                                    <b>Order Info</b>
                                </div>
                            </div>
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Order No: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="username"><?= $order->order_no; ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> L/C No: </div>

                                    <div class="profile-info-value">
                                        <?php 
                                          $lc_no = ''; $bank_name = ''; if($order->ord_lc_no != 0 && $order->ord_lc_no !=  ''){
                                            $lc_info = $this->LC_model->lc_data_by_id($order->ord_lc_no);
                                            $lc_no = $lc_info->lc_no;
                                            $bank_name = $lc_info->bank_name.'-';
                                          }
                                        ?>
                                        <span class="editable" id="city"><?= $bank_name.$lc_no ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Chassis No </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="age"><?= $order->ord_chassis_no ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Engine No: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="signup"><?= $order->ord_engine_no ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Car Model: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="login"><?= $order->ord_car_model ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Color: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $order->ord_color ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Make: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $order->ord_make_model ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Grade: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $order->ord_grade ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Type: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $order->ord_type ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Year: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $order->ord_year ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Mileage: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $order->ord_mileage ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Other Tirm: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about"><?= $order->ord_other_tirm ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Order Status: </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="about">
                                            <?php if($order->order_status == 'c'): ?>
                                              <span class="label " style="background: green;">Delevired</span>  Date: <?php  $date = new DateTime($order->delivery_date); echo date_format($date, 'd M Y'); ?>
                                              <?php elseif($order->order_status == 'a'): ?>
                                              <span class="label " style="background: #36a2ec;">Active</span>
                                              <?php else: ?>
                                              <span class="label " style="background: #ec880a;">Panding</span>
                                              <?php endif;?>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-xs-12 label label-lg label-success arrowed-in arrowed-right">
                                            <b>Customer Info</b>
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Name:</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="username"><?= $customer->cus_name; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name">Customer Id:</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="city"><?= $customer->cus_code; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Contact No: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="age"><?= $customer->cus_contact_no; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Alt. Contact No: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="signup"><?= $customer->alt_contact_no; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> E-mail: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="login"><?= $customer->cus_email; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Address: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="about"><?= $customer->cus_address; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-md-12">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-xs-12 label label-lg label-warning arrowed-in arrowed-right">
                                            <b>Payment Info</b>
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Budget Price: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="username"><?= number_format($order->ord_budget_range,2); ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Advance: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="city"><?= number_format($order->ord_advance,2); ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Paid Amount: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="age"><?= number_format($paid_amount,2); ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row" >
                                            <div class="profile-info-name" style="background-color: #d89696a3;"> Due Amount: </div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="signup"><?= number_format($order->ord_budget_range-$paid_amount,2); ?></span>
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