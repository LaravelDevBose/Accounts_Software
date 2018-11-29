<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Ready Car Sales</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <a href="#" data-action="close">
                        <i class="ace-icon fa fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <form action="<?= base_url()?>order/purchase/marge" method="POST">
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-4">
                                <?php  if(isset($order) && $order): ?>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cus_id">Select Customer</label>
                                    <div class="col-sm-7">
                                        <select class="chosen-select form-control" id="cus_id" name="cus_id" style="height: 30px; border-radius: 5px;">

                                            <?php if(isset($customers) && $customers):  foreach($customers as $customer):?>
                                                <?php if($order->c_id == $customer->id): ?>
                                                    <option selected value="<?= $customer->id; ?>" ><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                                            <?php endif; endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cus_id">Select Customer</label>
                                    <div class="col-sm-7">
                                        <select class="chosen-select form-control" id="cus_id" name="cus_id" style="height: 30px; border-radius: 5px;">
                                            <option value="0"> Select a customer</option>
                                            <?php if(isset($customers) && $customers):  foreach($customers as $customer):?>

                                                    <option  value="<?= $customer->id; ?>" ><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                                                <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="order_id">Select Order</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="order_id" name="order_id" style="height: 30px; border-radius: 5px;">
                                            <?php if(isset($order) && $order):?>
                                                <option selected value="<?= $order->id?>"><?= $order->order_no ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="ord_model">Car Model</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="ord_model" value="<?= (isset($order) && $order)? $order->ord_car_model :'' ?>"  placeholder="Order Car Model" class="form-control" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="ord_color">Car Color</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="ord_color" value="<?= (isset($order) && $order)? $order->ord_color :'' ?>"  readonly placeholder="Order Car Color" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="ord_year">Car Year</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="ord_year" value="<?= (isset($order) && $order)? $order->ord_year :'' ?>" readonly placeholder="Order Car Year" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="ord_mileage">Car Mileage</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="ord_mileage" value="<?= (isset($order) && $order)? $order->ord_mileage :'' ?>" readonly placeholder="Order Car Mileage" class="form-control" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-4">

                                <?php if(isset($purchas) && $purchas): ?>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-left" for="pus_id">Purchase NO</label>
                                        <div class="col-sm-7">
                                            <select class="chosen-select form-control" id="pus_id" name="pus_id" style="height: 30px; border-radius: 5px;">
                                                <option value=" ">Select a Purchase No</option>
                                                <?php if(isset($purchases) && $purchases):  foreach($purchases as $purchase):?>
                                                    <?php if($purchas->id == $purchase->id):?>
                                                        <option selected value="<?= $purchase->id; ?>"><?= $purchase->pus_sl; ?></option>
                                                    <?php endif; endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php else:?>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-left" for="pus_id">Purchase NO</label>
                                        <div class="col-sm-7">
                                            <select class="chosen-select form-control" id="pus_id" name="pus_id" style="height: 30px; border-radius: 5px;">
                                                <option value=" ">Select a Purchase No</option>
                                                <?php if(isset($purchases) && $purchases):  foreach($purchases as $purchase):?>
                                                    <option  value="<?= $purchase->id; ?>"><?= $purchase->pus_sl; ?></option>
                                                <?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>


                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="chassis_no">Chassis No</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="chassis_no" name="puc_chassis_no" value="<?= (isset($purchas) && $purchas)? $purchas->puc_chassis_no :'' ?>"  placeholder="Car Chassis No" class="form-control" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="engine_no">Engine No</label>
                                    <div class="col-sm-7">
                                        <input type="hidden" id="lc_id" name="puc_lc_id" value="<?= (isset($purchas) && $purchas)? $purchas->lc_no :'' ?>" >
                                        <input type="text" id="engine_no" name="puc_engine_no"  value="<?= (isset($purchas) && $purchas)? $purchas->puc_engine_no :'' ?>"  placeholder="Car Engine No" class="form-control" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="pus_model">Car Model</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="pus_model"  placeholder="Purchase Car Model" value="<?= (isset($purchas) && $purchas)? $purchas->puc_car_model :'' ?>"  class="form-control" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="pus_color">Car Color</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="pus_color" value="<?= (isset($purchas) && $purchas)? $purchas->puc_color :'' ?>"  readonly placeholder="Purchase Car Color" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="pus_year">Car Year</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="pus_year" value="<?= (isset($purchas) && $purchas)? $purchas->puc_year :'' ?>"  readonly placeholder="Purchase Car Year" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="pus_mileage">Car Mileage</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="pus_mileage" value="<?= (isset($purchas) && $purchas)? $purchas->puc_mileage :'' ?>"  readonly placeholder="Purchase Car Mileage" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="Submit" id="order_submit" class="btn btn-primary pull-right">Submit</button>
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

<?php $this->load->view('admin/ajax/ready_car_ajax')?>