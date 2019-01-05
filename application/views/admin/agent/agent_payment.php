
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">C&F Agent Bill Payment</h4>
                <a href="<?= base_url('titu/agent_bill_entry')?>" class="btn btn-warning btn-sm pull-right">Agent Bill Entry</a>
            </div>

            <div class="widget-body">
                <div class="widget-main">

                    <form id="agent_bill_store" >
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="hidden" name="entry_type" value="Pay">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Payment SL: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="coll_sl" required name="coll_sl" value="<?= $payment_id?>" readonly class="form-control" placeholder="Collection SL." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="bp_date"> Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input class="form-control date-picker" required id="bp_date" name="bp_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="agent_id">C&F Agent Name:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select " id="agent_id" required name="agent_id" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Agent</option>
                                            <?php if(isset($agents) && $agents):  foreach($agents as $agent):?>
                                                <option value="<?= $agent->id; ?>"><?= ucfirst($agent->agent_name).'-'.$agent->agent_code; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="particulars">Particulars:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="particulars" required name="particulars" class="form-control" placeholder="Particulars" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="paid_amount">Paid Amount:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="number" id="paid_amount" required name="paid_amount" class="form-control" placeholder="Enter Amount" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="remarks">Remarks: </label>
                                    <div class="col-sm-7">
                                        <textarea id="remarks"  name="remarks" placeholder="Remarks" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-4">
                                        <button type="button" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="pay_save">Save</button>
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
                <h4 class="widget-title">C&F Agent Payment List</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL. No</th>
                            <th>Date</th>
                            <th>Agent Name</th>
                            <th>Particulars</th>
                            <th>Remarks</th>
                            <th>Paid Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php  if(isset($bills) && $bills): foreach($bills as $bill):?>
                            <tr>
                                <td class="center"><?= $bill->entry_code ?></td>
                                <td>
                                    <?php
                                    $date = new DateTime($bill->bp_date);
                                    echo date_format($date, 'd M Y');
                                    ?>
                                </td>
                                <td class="center"><?= ucfirst($bill->agent_name) ?></td>
                                <td><?= $bill->particulars; ?></td>
                                <td><?= $bill->remarks; ?></td>
                                <td><?= number_format($bill->paid_amount) ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green linka fancybox fancybox.ajax " href="<?= base_url();?>titu/agent_bill_edit/<?= $bill->bill_id; ?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>titu/agent_bill_delete/<?= $bill->bill_id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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

<?php $this->load->view('admin/ajax/agent_bill_ajax');?>
