
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Insurance Bill Entry</h4>
                <a href="<?= base_url('titu/insurance_payment_page')?>" class="btn btn-warning btn-sm pull-right">Insurance Payment</a>
            </div>

            <div class="widget-body">
                <div class="widget-main">

                    <form id="insurance_bill_store" >
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="hidden" name="in_bill_type" value="Bill">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Bill SL: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="coll_sl" required name="coll_sl" value="<?= $bill_code?>" readonly class="form-control" placeholder="Collection SL." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="in_bill_date"> Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input class="form-control date-picker" required id="in_bill_date" name="in_bill_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="in_comp_id">Company Name:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="in_comp_id" required name="in_comp_id" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Company</option>
                                            <?php if(isset($companies) && $companies):  foreach($companies as $company):?>
                                                <option value="<?= $company->in_comp_id; ?>"><?= ucfirst($company->in_comp_name); ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="mc_crt_no">MC/CRT No:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" required class="form-control" id="mc_crt_no" name="mc_crt_no" placeholder="MC/CRT No" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cus_id">Customer Name:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="cus_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Customer</option>
                                            <?php if(isset($customers) && $customers):  foreach($customers as $customer):?>
                                                <option value="<?= $customer->id; ?>"><?= ucfirst($customer->cus_name).'-'.$customer->cus_code; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="order_id">Chassis No:</label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="order_id" required name="order_id" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Chassis No</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="lc_id">L/C No:</label>
                                    <div class="col-sm-7">
                                        <input type="hidden" class="form-control" id="lc_id" name="lc_id"  >
                                        <input type="text" class="form-control" id="lc_no"  placeholder="L/C No" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="net_premium">Net Premium:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="number" id="net_premium" required name="net_premium" onkeyup="premium_calaulation('N')" class="form-control" placeholder="0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="gross_premium">Gross Premium:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="number" id="gross_premium" readonly name="gross_premium" onkeyup="premium_calaulation('G')" class="form-control" placeholder="0" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="in_bill_vat">Vat (15%): </label>
                                    <div class="col-sm-7">
                                        <input type="number" id="in_bill_vat" readonly  name="in_bill_vat" value="0" class="form-control" placeholder="0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="in_bill_30">payable(30%):</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="in_bill_30" readonly name="in_bill_30" class="form-control" placeholder="0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="in_bill_70">Payable(70%):</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="in_bill_70" readonly name="in_bill_70" class="form-control" placeholder="0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="stamp">Stamp:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="stamp"  name="stamp" onkeyup="premium_calaulation('N')" class="form-control" placeholder="0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="bill_amount">Payable:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="bill_amount" readonly name="bill_amount" class="form-control" placeholder="0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="remarks">Remarks: </label>
                                    <div class="col-sm-7">
                                        <textarea id="remarks"  name="remarks" placeholder="Remarks" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-8 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-4">
                                        <button type="button" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="bill_save">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="widget-box red" style="text-align: center;">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="widget-title" id="due_amount">00.0</h4>
                                            <P>Due Amount</P>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Insurance Bill List</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL. No</th>
                            <th>Date</th>
                            <th>MC/CRT No</th>
                            <th>Company Name</th>
                            <th>Customer Name</th>
                            <th>Gross Premium</th>
                            <th>Net Premium</th>
                            <th>Vat</th>
                            <th>30%</th>
                            <th>70%</th>
                            <th>Stamp</th>
                            <th>Remarks</th>
                            <th>Bill Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php  if(isset($bills) && $bills): foreach($bills as $bill):?>
                            <tr>
                                <td class="center"><?= $bill->in_bill_code ?></td>
                                <td>
                                    <?php
                                    $date = new DateTime($bill->in_bill_date);
                                    echo date_format($date, 'd M Y');
                                    ?>
                                </td>
                                <td class="center"><?= ucfirst($bill->mc_crt_no) ?></td>
                                <td class="center"><?= ucfirst($bill->in_comp_name) ?></td>
                                <td class="center"><?= ucfirst($bill->cus_name) ?></td>
                                <td><?= number_format($bill->gross_premium) ?></td>
                                <td><?= number_format($bill->net_premium) ?></td>
                                <td><?= number_format($bill->in_bill_vat) ?></td>
                                <td><?= number_format($bill->in_bill_30) ?></td>
                                <td><?= number_format($bill->in_bill_70) ?></td>
                                <td><?= number_format($bill->stamp) ?></td>
                                <td><?= $bill->remarks; ?></td>
                                <td><?= number_format($bill->bill_amount) ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green linka fancybox fancybox.ajax " href="<?= base_url();?>titu/insurance_bill_edit/<?= $bill->in_bill_id; ?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>titu/insurance_bill_delete/<?= $bill->in_bill_id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/ajax/insurance_bill_ajax');?>
