<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Edit Collection Entry</h4>
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

                    <form action="<?= base_url();?>collection/update/<?= $collection->id; ?>" method="POST" >
                        <div class="row">
                            <div class="col-sm-1">

                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Collection SL: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="coll_sl" required name="coll_sl" value="<?= $collection->coll_sl; ?>" readonly class="form-control" placeholder="Collection SL." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php
                                        $date = new DateTime($collection->date);
                                        echo date_format($date, 'Y-m-d');
                                        ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cus_id">Customer Name:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="cus_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                                            <option value=" ">Select a Customer</option>
                                            <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                                                <option value="<?= $customer->id; ?>" <?= ($customer->id == $collection->cus_id)? 'selected': '' ?> ><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="order_no">Order No:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select" id="order_no" required name="order_no" style="height: 30px; border-radius: 5px;">
                                            <option value=" ">Select a Order No</option>
                                            <?php if($orders && isset($orders)):  foreach($orders as $order):?>
                                                <option value="<?= $order->id; ?>" <?= ($order->id == $collection->order_no)? 'selected': '' ?> ><?= $order->order_no.'-'.$order->ord_chassis_no; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="lc_no">L/C No: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="lc_no" required name="lc_no" readonly class="form-control" placeholder="L/C Number" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">


                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="collection_type">Collection Type:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="collection_type" required name="collection_type" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Collection Type</option>
                                            <option value="1" <?= ($collection->collection_type == 1)? 'selected': '' ?> >Advance</option>
                                            <option value="2" <?= ($collection->collection_type == 2)? 'selected': '' ?> >Part</option>
                                            <option value="3" <?= ($collection->collection_type == 3)? 'selected': '' ?> >Full Payment</option>
                                            <option value="4" <?= ($collection->collection_type == 4)? 'selected': '' ?> >Cheque</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cheque_no"> Cheque No:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="cheque_no"  name="cheque_no"  <?= (!$collection->cheque_no)? 'readonly': '' ?> value="<?= $collection->cheque_no ?>" class="form-control" placeholder="Enter Cheque No" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="bank_name"> Bank Name: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="bank_name"  name="bank_name" <?= (!$collection->bank_name)? 'readonly': '' ?> value="<?= $collection->bank_name ?>"  class="form-control" placeholder="Enter Bank Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="number" id="amount" required name="amount" value="<?= $collection->amount ?>" class="form-control" placeholder="Enter The Amount" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="description">Description: </label>
                                    <div class="col-sm-7">
                                        <textarea id="description"  name="description" placeholder="Short Description" class="form-control" ><?= $collection->description ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary pull-right" >Save</button>
                                    </div>
<!--                                    <div class="col-sm-4">-->
<!--                                        <button type="button" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="collection_save_print">Save & Print</button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="widget-box red" style="text-align: center;">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="widget-title" id="due_amount"><?= $due_amount; ?></h4>
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
<?php $this->load->view('admin/ajax/collection_ajax');?>