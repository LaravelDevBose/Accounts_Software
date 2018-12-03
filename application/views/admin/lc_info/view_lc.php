<?php  if(isset($lc_info) && $lc_info){?>
<div class="row">
    <div class="col-xs-12 col-sm-12 ">
        <div class="widget-box ">
            <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller">
                    L/C Details Information
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main row">
                    <div class="col-md-6">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name">L/C No: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="username"><?= $lc_info->lc_no?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name">Date: </div>

                                <div class="profile-info-value">
                                    <?php $date = new DateTime($lc_info->lc_date); $ent_date = date_format($date, 'd M Y'); ?>
                                    <span class="editable" id="username"><?= $ent_date?></span>
                                </div>
                            </div>


                            <div class="profile-info-row" style="">
                                <div class="profile-info-name"> L/C Amount: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="username"><?= number_format($lc_info->lc_amount, 2)?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Car Quantity: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="country"><?= $lc_info->car_qty; ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name">Bank Name: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="country"><?= ucwords($lc_info->bank_name) ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Branch Name: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="country"><?= ucwords($lc_info->branch_name) ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Insurance: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="country"><?= $lc_info->lc_insur ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name">Company Name: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="username"><?= ucwords($lc_info->comp_name)?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Supplier Name </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="username"><?= $lc_info->sup_code.'-'.ucwords($lc_info->sup_name)?></span>
                                </div>
                            </div>
                            <div class="profile-info-row" style="">
                                <div class="profile-info-name"> Agent Name </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="username"><?= $lc_info->agent_code.'-'.ucwords($lc_info->agent_name)?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Ship Name: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="country"><?= ucwords($lc_info->ship_name); ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name">Arrival Date: </div>

                                <div class="profile-info-value">
                                    <?php $date = new DateTime($lc_info->arriv_date); $arriv_date = date_format($date, 'd M Y'); ?>
                                    <span class="editable" id="country"><?= $arriv_date ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Port Name: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="country"><?= $lc_info->port_name?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Note: </div>

                                <div class="profile-info-value">
                                    <span class="editable" id="country"><?= $lc_info->note?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div><!-- /.col -->
    <div class="col-xs-12 col-sm-12 ">
        <div class="widget-box ">
            <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller">
                    L/C Details Information
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <table  class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Purchase No. <br> Order No</th>
                            <th>Client Name</th>
                            <th>Chassis No.</th>
                            <th>Engine No</th>
                            <th>Car Model</th>
                            <th>Color</th>
                            <th>Year</th>
                            <th>Car Value</th>
                            <th>Freight Value</th>
                            <th>Sub Total</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">
                            <?php if(isset($lc_details) && $lc_details): foreach ($lc_details as $details):?>
                            <tr>
                                <td><?= $details->pus_sl.'<br>'.$details->order_no?></td>
                                <td><?= ucwords($details->cus_name) ?></td>
                                <td><?= $details->puc_chassis_no ?></td>
                                <td><?= $details->puc_engine_no ?></td>
                                <td><?= $details->puc_car_model ?></td>
                                <td><?= $details->puc_color ?></td>
                                <td><?= $details->puc_year ?></td>
                                <td><?= number_format($details->car_value,2) ?></td>
                                <td><?= number_format($details->fright_value,2) ?></td>
                                <td><?= number_format($details->total, 2) ?></td>
                            </tr>

                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
<?php }?>