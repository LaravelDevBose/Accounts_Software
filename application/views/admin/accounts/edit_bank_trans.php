<div class="widget-box" style="width: 400px;">
    <div class="widget-header">
        <h4 class="widget-title">Edit Bank Transaction Information</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">

            <form  action="<?= base_url();?>bank_trans/update/<?= $trans->id; ?>" method="POST" name="bank_trans_edit" >
                <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="trans_id">Transaction Id: </label>
                            <div class="col-sm-7">
                                <input type="hidden" name="lc_id" id="lc_id">
                                <input type="text" id="trans_id" required name="trans_id" value="<?= $trans->trans_id; ?>" readonly class="form-control" placeholder="Transaction Id" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="trans_type">Transaction Type:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select" id="trans_type" required name="trans_type" style="height: 30px; border-radius: 5px;">
                                    <option value="D" <?= ($trans->trans_type == 'D')? 'selected': ' '?> >Deposit</option>
                                    <option value="W" <?= ($trans->trans_type == 'W')? 'selected': ' '?> >Withdrawal</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="bank_id">Bank Info:<span class="text-bold text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control chosen-select" id="bank_id"  name="bank_id" style="height: 30px; border-radius: 5px;">
                                    <option value="">Select a Bank</option>
                                    <?php if(isset($banks)&& $banks): foreach($banks as $bank):?>
                                        <option value="<?= $bank->id; ?>" <?= ($trans->bank_id == $bank->id)? 'selected': ' '?>><?= $bank->bank_name.'-'.$bank->account_no; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="trans_date"> Date:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input class="form-control date-picker" required id="trans_date" name="trans_date" type="text" value="<?php $date = new DateTime($trans->trans_date); echo date_format($date,'Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="number" id="amount" required name="amount" value="<?= $trans->amount?>" class="form-control" placeholder="Enter The Amount" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="note">Description: </label>
                            <div class="col-sm-7">
                                <input type="text" id="note"  name="note" value="<?= $trans->note; ?>" class="form-control"  placeholder="Short Description" />
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                            <div class="col-sm-8">
                                <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary trans_submit ">Submit</button>
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