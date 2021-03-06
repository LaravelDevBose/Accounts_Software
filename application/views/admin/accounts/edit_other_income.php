<div class="widget-box" style="width: 400px;">
  <div class="widget-header">
    <h4 class="widget-title">Edit Other Income Information</h4>
  </div>

  <div class="widget-body">
    <div class="widget-main">
      
      <form  action="<?= base_url();?>other_income/update/<?= $entry->id; ?>" method="POST" >
        <div class="row">
          <div class="col-md-12">

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="ie_head">Account Name:<span class="text-bold text-danger">*</span></label>
              <div class="col-sm-7">
                <select class="form-control chosen-select" id="ie_head" name="ie_head" style="height: 30px; border-radius: 5px;">
                  <option value=" ">Select a head</option>
                  <?php if($ie_heads && isset($ie_heads)):  foreach($ie_heads as $head):?>
                    <option value="<?= $head->id; ?>" <?= ($head->id == $entry->ie_head)?'selected': '' ?>><?= ucfirst($head->head_title); ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="description">Description: </label>
              <div class="col-sm-7">
                <textarea id="description" name="description" placeholder="Short Description" class="form-control" ><?= $entry->description ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                 <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php $date = new DateTime($entry->date); echo date_format($date,'Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                 <input type="number" id="amount" required name="amount" value="<?= $entry->amount; ?>" class="form-control" placeholder="Enter The Amount" />
              </div>
            </div>

            <div class="form-group" style="margin-top: 10px;">
              <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
              <div class="col-sm-8">
                <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Update</button>
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