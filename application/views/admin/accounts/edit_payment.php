<div class="widget-box" style="width: 500px; min-height: 300px;">
    <div class="widget-header">
        <h4 class="widget-title">Edit Payment Information</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">

            <form  action="<?= base_url();?>payment/update/<?= $payment->id; ?>" method="POST" >
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="payment_code">Payment Id: </label>
                            <div class="col-sm-7">
                                <input type="text" id="payment_code" required name="payment_code" value="<?= $payment->payment_code; ?>" readonly class="form-control" placeholder="Payment Code" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="supplier_id">Supplier Name:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control chosen-select " id="supplier_id" required name="supplier_id" style="height: 30px; border-radius: 5px;">
                                    <option value=" ">Select a Supplier</option>
                                    <?php if($suppliers && isset($suppliers)):  foreach($suppliers as $supplier):?>
                                        <option value="<?= $supplier->id; ?>" <?= ($payment->supplier_id == $supplier->id)?'selected':'' ?> ><?= $supplier->sup_code.'-'.ucfirst($supplier->sup_name); ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                            <div class="col-sm-1" style="padding: 0;">
                                <a href="<?= base_url('supplier/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="order_id">Chassis No:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control chosen-select " id="order_id" required name="order_id" style="height: 30px; border-radius: 5px;">
                                    <option value=" ">Select a Chassis No</option>
                                    <?php if($orders && isset($orders)):  foreach($orders as $order):?>
                                        <option value="<?= $order->id; ?>" <?= ($payment->order_id == $order->id)?'selected':'' ?> ><?= $order->ord_chassis_no; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                            <div class="col-sm-1" style="padding: 0;">
                                <a href="<?= base_url('ie_head/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="lc_no">L/C No: </label>
                            <div class="col-sm-7">
                                <input type="hidden" name="lc_id" id="lc_id" value="<?= $payment->lc_id ?>">
                                <?php
                                $lc_no = ''; if($payment->lc_id != 0 && $payment->lc_id !=  ''){
                                    $lc_info = $this->LC_model->lc_data_by_id($payment->lc_id);
                                    $lc_no = $lc_info->lc_no;
                                }
                                ?>
                                <input type="text" id="lc_no" required name="lc_no" value="<?= $lc_no; ?>"  readonly class="form-control" placeholder="L/C Number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="payment_date"> Date:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input class="form-control date-picker" required id="payment_date" name="payment_date" type="text" value="<?php $date = new DateTime($payment->payment_date); echo date_format($date,'Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="head_id">Expense Head:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select " id="head_id" required name="head_id" style="height: 30px; border-radius: 5px;">
                                    <option value=" ">Select a Head</option>
                                    <?php if($heads && isset($heads)):  foreach($heads as $head):?>
                                        <option value="<?= $head->id; ?>" <?= ($payment->head_id == $head->id)?'selected':'' ?> ><?= $head->head_title; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="payment_amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="number" id="payment_amount" required name="payment_amount" value="<?= $payment->payment_amount?>" class="form-control" placeholder="Enter The Amount" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="note">Description: </label>
                            <div class="col-sm-7">
                                <input id="note" type="text" name="note" value="<?= $payment->note ?>" placeholder="Short Description" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label class="col-sm-5 control-label no-padding-left" for="ord_budget_range"> </label>
                            <div class="col-sm-7">
                                <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
    });
</script>