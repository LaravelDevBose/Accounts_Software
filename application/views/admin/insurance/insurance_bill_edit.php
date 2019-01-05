

<form action="<?= base_url()?>titu/insurance_bill_update/<?= $bill->in_bill_id?>" method="POST">
<?php if($bill->in_bill_type == 'Pay'):?>
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title">Edit Insurance Bill Payment</h4>
        </div>

        <div class="widget-body" style="width: 400px;">
            <div class="widget-main">
                <div class="row">
                    <div class="col-sm-1">
                        <input type="hidden" name="in_bill_type" value="Pay">
                    </div>

                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Payment SL: </label>
                            <div class="col-sm-7">
                                <input type="text" id="coll_sl" required name="coll_sl" value="<?= $bill->in_bill_code ?>" readonly class="form-control" placeholder="Collection SL." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_bill_date"> Date:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input class="form-control date-picker" required id="in_bill_date" name="in_bill_date" type="text" value="<?php
                                $date = new DateTime($bill->in_bill_date);
                                echo date_format($date, 'Y-m-d');
                                ?>"  data-date-format="yyyy-mm-dd" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_comp_id">Company Name:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select " id="in_comp_id" required name="in_comp_id" style="height: 30px; border-radius: 5px;">
                                    <option value="">Select a Company</option>
                                    <?php if(isset($companies) && $companies):  foreach($companies as $company):?>
                                        <option value="<?= $company->in_comp_id; ?>" <?= ($bill->in_comp_id == $company->in_comp_id)?'Selected': ''?>><?= ucfirst($company->in_comp_name); ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="payment_amount">Paid Amount:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="number" id="payment_amount" required name="payment_amount" value="<?= $bill->payment_amount ?>" class="form-control" placeholder="Enter Amount" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="remarks">Remarks: </label>
                            <div class="col-sm-7">
                                <textarea id="remarks"  name="remarks" placeholder="Remarks" class="form-control" ><?= $bill->remarks ?></textarea>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                            <div class="col-sm-4">
                                <button type="submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" >Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else:?>
    <div class="widget-box" style="width: 500px">
        <div class="widget-header">
            <h4 class="widget-title">Edit Insurance Bill Entry</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-sm-1">
                        <input type="hidden" name="in_bill_type" value="Bill">
                    </div>

                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Bill SL: </label>
                            <div class="col-sm-7">
                                <input type="text" id="coll_sl" required name="coll_sl" value="<?= $bill->in_bill_code ?>" readonly class="form-control" placeholder="Collection SL." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_bill_date"> Date:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input class="form-control date-picker" required id="in_bill_date" name="in_bill_date" type="text" value="<?php
                                $date = new DateTime($bill->in_bill_date);
                                echo date_format($date, 'Y-m-d');
                                ?>"  data-date-format="yyyy-mm-dd" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_comp_id">Company Name:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select " id="in_comp_id" required name="in_comp_id" style="height: 30px; border-radius: 5px;">
                                    <option value="">Select a Company</option>
                                    <?php if(isset($companies) && $companies):  foreach($companies as $company):?>
                                        <option value="<?= $company->in_comp_id; ?>" <?= ($bill->in_comp_id == $company->in_comp_id)?'Selected': ''?> ><?= ucfirst($company->in_comp_name); ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="mc_crt_no">MC/CRT No:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required class="form-control" id="mc_crt_no" value="<?= $bill->mc_crt_no ?>" name="mc_crt_no" placeholder="MC/CRT No" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="cus_id">Customer Name:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select " id="cus_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                                    <option value="">Select a Customer</option>
                                    <?php if(isset($customers) && $customers):  foreach($customers as $customer):?>
                                        <option value="<?= $customer->id; ?>" <?= ($bill->cus_id == $customer->id)?'Selected': ''?> ><?= ucfirst($customer->cus_name).'-'.$customer->cus_code; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="order_id">Chassis No:</label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select " id="order_id" required name="order_id" style="height: 30px; border-radius: 5px;">
                                    <option value="">Select a Chassis No</option>
                                    <?php if(isset($orders) && $orders):  foreach($orders as $order):?>
                                        <option value="<?= $order->id; ?>" <?= ($bill->order_id == $order->id)?'Selected': ''?> ><?= $order->order_no.'-'.$order->ord_chassis_no; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="lc_id">L/C No:</label>
                            <div class="col-sm-7">
                                <input type="hidden" class="form-control" id="lc_id" name="lc_id" value="<?= $bill->lc_id?>" >
                                <input type="text" class="form-control" id="lc_no"  placeholder="L/C No" value="<?= $bill->lc_no?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="net_premium">Net Premium:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="number" id="e_net_premium" required name="net_premium" value="<?= $bill->net_premium ?>" onkeyup="e_premium_calaulation('N')" class="form-control" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="gross_premium">Gross Premium:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="number" id="egross_premium" readonly name="gross_premium" value="<?= $bill->gross_premium ?>" onkeyup="e_premium_calaulation('G')" class="form-control" placeholder="0" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_bill_vat">Vat (15%): </label>
                            <div class="col-sm-7">
                                <input type="number" id="ein_bill_vat" readonly  name="in_bill_vat" value="<?= $bill->in_bill_vat ?>" class="form-control" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_bill_30">payable(30%):</label>
                            <div class="col-sm-7">
                                <input type="number" id="ein_bill_30" readonly name="in_bill_30" value="<?= $bill->in_bill_30 ?>" class="form-control" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_bill_70">Payable(70%):</label>
                            <div class="col-sm-7">
                                <input type="number" id="ein_bill_70" readonly name="in_bill_70" value="<?= $bill->in_bill_70 ?>" class="form-control" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="stamp">Stamp:</label>
                            <div class="col-sm-7">
                                <input type="number" id="e_stamp"  name="stamp" value="<?= $bill->stamp ?>" onkeyup="e_premium_calaulation('N')" class="form-control" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="bill_amount">Payable:</label>
                            <div class="col-sm-7">
                                <input type="number" id="ebill_amount" readonly name="bill_amount" value="<?= $bill->bill_amount ?>" class="form-control" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="remarks">Remarks: </label>
                            <div class="col-sm-7">
                                <textarea id="remarks"  name="remarks" placeholder="Remarks" class="form-control" ><?= $bill->remarks ?></textarea>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label class="col-sm-8 control-label no-padding-left" for="ord_budget_range"> </label>
                            <div class="col-sm-4">
                                <button type="submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" >Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>
</form>
<?php $this->load->view('admin/ajax/insurance_bill_ajax');?>