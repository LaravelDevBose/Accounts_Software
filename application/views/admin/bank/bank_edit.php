<div class="widget-box" style="width: 400px;">
    <div class="widget-header">
        <h4 class="widget-title">Edit Bank Information</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">

            <form  action="<?= base_url();?>bank/update/<?= $bank->id; ?>" method="POST" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="bank_name">Bank Name:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="text" id="bank_name" required name="bank_name" value="<?= $bank->bank_name ?>"  class="form-control" placeholder="Bank Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="branch_name">Branch Name:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="text" id="branch_name" required name="branch_name" value="<?= $bank->branch_name ?>"  class="form-control" placeholder="Branch Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="account_no">Account No:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="text" id="account_no" required name="account_no" value="<?= $bank->account_no ?>" class="form-control"  placeholder="Account Number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="opening_date">Opening Date:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input class="form-control date-picker" required id="opening_date" name="opening_date" value="<?php $date = new DateTime($bank->opening_date); echo date_format($date,'Y-m-d'); ?>" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="current_balance">Current Balance:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="number" id="current_balance" required name="current_balance" value="<?= $bank->current_balance ?>" class="form-control" placeholder="Current Balance" />
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
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
    });
</script>