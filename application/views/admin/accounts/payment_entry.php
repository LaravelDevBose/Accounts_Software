<div class="row">
    <div class="col-xs-12">

        <!--============Customer Information============ -->
        <!--============Customer Information============ -->
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Add New Collection</h4>
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

                    <form id="payment_entry" >
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="hidden" name="payment_type" value="CP">
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="payment_code">Payment Id: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="payment_code" required name="payment_code" value="<?= $payment_code; ?>" readonly class="form-control" placeholder="Payment Code" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="supplier_id">Supplier Name:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control chosen-select " id="supplier_id" required name="supplier_id" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Supplier</option>
                                            <?php if($suppliers && isset($suppliers)):  foreach($suppliers as $supplier):?>
                                                <option value="<?= $supplier->id; ?>"><?= $supplier->sup_code.'-'.ucfirst($supplier->sup_name); ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding: 0;">
                                        <a href="<?= base_url('supplier/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="order_id">Chassis No:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="order_id" required name="order_id" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Chassis No</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="lc_no">L/C No: </label>
                                    <div class="col-sm-7">
                                        <input type="hidden" name="lc_id" id="lc_id">
                                        <input type="text" id="lc_no" required name="lc_no" readonly class="form-control" placeholder="L/C Number" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="payment_date"> Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control date-picker" required id="payment_date" name="payment_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="head_id">Expense Head:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="head_id" required name="head_id" style="height: 30px; border-radius: 5px;">
                                            <option value=" ">Select a Head</option>
                                            <?php if($heads && isset($heads)):  foreach($heads as $head):?>
                                                <option value="<?= $head->id; ?>"><?= $head->head_title; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding: 0;">
                                        <a href="<?= base_url('ie_head/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="payment_amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="payment_amount" required name="payment_amount" class="form-control" placeholder="Enter The Amount" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="note">Description: </label>
                                    <div class="col-sm-8">
                                        <input id="note" type="text" name="note" placeholder="Short Description" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Submit</button>
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

        <!--============Customer Information============ -->
        <!--============Customer Information============ -->
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Payment Information List</h4>
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
                    <table  class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Payment Id.</th>
                            <th>Payment Date</th>
                            <th>Supplier</th>
                            <th>Chassis No</th>
                            <th>L/C No</th>
                            <th>Head</th>
                            <th>Amount</th>
                            <th>Note</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php $i=1; if($payments && isset($payments)): foreach($payments as $data):?>
                            <tr>
                                <td class="center" style="display:none;"> </td>

                                <td><?= $data->payment_code ?></td>
                                <td>
                                    <?php
                                    $date = new DateTime($data->payment_date);
                                    echo date_format($date, 'd M Y');
                                    ?>
                                </td>

                                <td><?= $data->sup_name; ?></td>
                                <td> <?= $data->ord_chassis_no ?> </td>
                                <td> <?= $data->lc_no ?> </td>
                                <td> <?= $data->head_title ?> </td>
                                <td><?= number_format($data->payment_amount) ?></td>
                                <td><?= $data->note; ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>payment/edit/<?= $data->id; ?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>payment/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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

<?php $this->load->view('admin/ajax/payment_ajax');?>
