
<div class="row">
    <div class="col-xs-12">
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

                    <form id="collection_entry" >
                        <div class="row">
                            <div class="col-sm-1">

                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Collection SL: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="coll_sl" required name="coll_sl" value="<?= $coll_sl; ?>" readonly class="form-control" placeholder="Collection SL." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cus_id">Customer Name:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="cus_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                                            <option value=" ">Select a Customer</option>
                                            <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                                                <option value="<?= $customer->id; ?>"><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="order_no">Order No:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select" id="order_no" required name="order_no" style="height: 30px; border-radius: 5px;">
                                            <option value=" ">Select a Order No</option>

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
                                            <option value="1">Advance</option>
                                            <option value="2">Part</option>
                                            <option value="3">Full Payment</option>
                                            <option value="4">Cheque</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cheque_no"> Cheque No:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="cheque_no" required name="cheque_no" readonly class="form-control" placeholder="Enter Cheque No" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="bank_name"> Bank Name: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="bank_name" required name="bank_name" readonly class="form-control" placeholder="Enter Bank Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="number" id="amount" required name="amount" class="form-control" placeholder="Enter The Amount" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="description">Description: </label>
                                    <div class="col-sm-7">
                                        <textarea id="description"  name="description" placeholder="Short Description" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-4">
                                        <button type="button" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="collection_save">Save</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="collection_save_print">Save & Print</button>
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
                <h4 class="widget-title">Collection Information List</h4>
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
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL. No</th>
                            <th>Date</th>
                            <th>Order No</th>
                            <th>Customer Name</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php  if($collections && isset($collections)): foreach($collections as $data):?>
                            <tr>
                                <td class="center"><?= $data->coll_sl ?></td>
                                <td>
                                    <?php
                                    $date = new DateTime($data->date);
                                    echo date_format($date, 'd M Y');
                                    ?>
                                </td>
                                <td class="center"><?= ucfirst($data->order_no) ?></td>
                                <td class="center"><?= ucfirst($data->cus_name) ?></td>
                                <td><?= $data->description; ?></td>
                                <td><?= number_format($data->amount) ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a style="color: #F89406;" class="linka fancybox fancybox.ajax"  href="<?= base_url();?>collection/view/<?= $data->id;?>" >
                                            <i class="ace-icon fa fa-eye bigger-130" ></i>
                                        </a>
                                        <a class="green print_coll" id="<?= $data->id; ?>" >
                                            <i class="ace-icon fa fa-print bigger-130"></i>
                                        </a>
                                        <a class="green " href="<?= base_url();?>collection/edit/<?= $data->id; ?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>collection/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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

<?php $this->load->view('admin/ajax/collection_ajax');?>
