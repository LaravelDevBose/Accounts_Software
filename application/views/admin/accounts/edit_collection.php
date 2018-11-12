

<div class="widget-box" style="width: 400px;">
  <div class="widget-header">
    <h4 class="widget-title">Edit Collection Information</h4>
  </div>

  <div class="widget-body"> 
    <div class="widget-main">
      
      <form  action="<?= base_url();?>collection/update/<?= $collection->id; ?>" method="POST" >
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-7">
            <div class="widget-box red" >
              <div class="widget-body" style="padding:5px;">
                  <h4 class="widget-title" id="e_due_amount" style="display:inline-block;"><?= $due_amount; ?></h4>
                  <P style="display:inline-block;">Due Amount</P>
              </div>
            </div>
          </div>
          <div class="col-sm-12">

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="e_cus_id">Customer Name:<span class="text-bold text-danger">*</span></label>
              <div class="col-sm-7">
                <select class="form-control chosen-select " id="e_cus_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                  <option value=" ">Select a Customer</option>
                  <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                    <option value="<?= $customer->id; ?>" <?= ($customer->id == $collection->cus_id)? 'selected': '' ?>><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="e_order_no">Chassis No:<span class="text-bold text-danger">*</span></label>
              <div class="col-sm-7">
                <select class="form-control chosen-select" id="e_order_no" required name="order_no" style="height: 30px; border-radius: 5px;">
                  <option value=" ">Select a Chassis No</option>
                  <?php if($orders && isset($orders)):  foreach($orders as $order):?>
                    <option value="<?= $order->id; ?>" <?= ($order->id == $collection->order_no)? 'selected': '' ?> ><?= $order->ord_chassis_no; ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="e_lc_no">L/C No: </label>
              <div class="col-sm-7">
                <input type="hidden" name="lc_id" id="e_lc_id" value="<?= $collection->lc_id; ?>">
                <input type="number" id="e_lc_no" required name="lc_no" value="<?= $collection->lc_no; ?>" readonly class="form-control" placeholder="L/C Number" /> 
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                 <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                 <input type="number" id="amount" required name="amount" value="<?= $collection->amount; ?>" class="form-control" placeholder="Enter The Amount" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="description">Description: </label>
              <div class="col-sm-7">
                <textarea id="description"  name="description" placeholder="Short Description" class="form-control" ><?= $collection->description; ?></textarea>
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