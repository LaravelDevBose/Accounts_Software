

<div class="widget-box" style="width: 400px;">
  <div class="widget-header">
    <h4 class="widget-title">Edit Office Payment Information</h4>
  </div>

  <div class="widget-body"> 
    <div class="widget-main">
      
      <form  action="<?= base_url();?>office_payment/update/<?= $payment->id; ?>" method="POST" >
        <div class="row">
          
          <div class="col-sm-12">

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="payment_code">Payment Id: </label>
              <div class="col-sm-7">
                <input type="text" id="payment_code" required name="payment_code" value="<?= $payment->payment_code; ?>" readonly class="form-control" placeholder="Payment Code" /> 
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="head_id">Expense Name:<span class="text-bold text-danger">*</span></label>
              <div class="col-sm-6">
                <select class="form-control chosen-select" id="head_id" name="head_id" style="height: 30px; border-radius: 5px;">
                  <option value=" ">Select a head</option>
                  <?php if($heads && isset($heads)):  foreach($heads as $head):?>
                    <option value="<?= $head->id; ?>" <?= ($payment->head_id == $head->id)?'selected':''?>><?= ucfirst($head->head_title); ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
                <div class="col-sm-1" style="padding: 0;">
                    <a href="<?= base_url('ie_head/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="payment_amount"> Amount:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                 <input type="number" id="payment_amount" value="<?= $payment->payment_amount?>" required name="payment_amount" class="form-control" placeholder="Enter The Amount" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="payment_date"> Date:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                 <input class="form-control date-picker" required id="payment_date" name="payment_date" type="text" value="<?php $date = new DateTime($payment->payment_date); echo date_format($date,'Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="note">Description: </label>
              <div class="col-sm-7">
                <input id="note" type="text" name="note" value="<?= $payment->note ?>" placeholder="Short Description" class="form-control" >
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
<?php $this->load->view('admin/ajax/collection_ajax');?>
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