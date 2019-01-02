
<div class="widget-box" style="width: 500px">
    <div class="widget-body">
        <div class="widget-main">
            <form action="<?= base_url()?>titu/agent_bill_update/<?= $bill->bill_id?>" method="POST">
                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Serial No: </label>
                            <div class="col-sm-7">
                                <input type="text" id="coll_sl" required name="coll_sl" value="<?= $bill->entry_code?>" readonly class="form-control" placeholder="Collection SL." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="bp_date"> Date:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input class="form-control date-picker" required id="bp_date" name="bp_date" type="text" value="<?php
                                $date = new DateTime($bill->bp_date);
                                echo date_format($date, 'Y-m-d');
                                ?>" data-date-format="yyyy-mm-dd" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="agent_id">Agent Name:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select " id="agent_id" required name="agent_id" style="height: 30px; border-radius: 5px;">
                                    <option value="">Select a Agent</option>
                                    <?php if($agents && isset($agents)):  foreach($agents as $agent):?>
                                        <option value="<?= $agent->id; ?>" <?= ($bill->agent_id == $agent->id)?'Selected':'' ?> ><?= ucfirst($agent->agent_name).'-'.$agent->agent_code; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="particulars">Particulars:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="text" id="particulars" required name="particulars" value="<?= $bill->particulars ?>" class="form-control"  placeholder="Particulars" />
                            </div>
                        </div>
                        <?php if($bill->entry_type =='Bill'):?>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-left" for="bill_no">Bill No:<span class="text-bold text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" required class="form-control" id="bill_no" name="bill_no" value="<?= $bill->bill_no?>" placeholder="Bill No" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-left" for="bill_amount">Bill Amount:<span class="text-bold text-danger">*</span> </label>
                                <div class="col-sm-7">
                                    <input type="number" id="bill_amount" required name="bill_amount" value="<?= $bill->bill_amount?>" class="form-control" placeholder="Enter Amount" />
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-left" for="paid_amount">Paid Amount:<span class="text-bold text-danger">*</span> </label>
                                <div class="col-sm-7">
                                    <input type="number" id="paid_amount" required name="paid_amount" value="<?= $bill->paid_amount?>" class="form-control" placeholder="Enter Amount" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="remarks">Remarks: </label>
                            <div class="col-sm-7">
                                <textarea id="remarks"  name="remarks" placeholder="Remarks" class="form-control" ><?= $bill->remarks?></textarea>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label class="col-sm-8 control-label no-padding-left" for="ord_budget_range"> </label>
                            <div class="col-sm-4">
                                <button type="submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" >Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
