<div class="widget-box" style="width: 400px;">
  <div class="widget-header">
    <h4 class="widget-title">Edit Payment Information</h4>
  </div>

  <div class="widget-body">
    <div class="widget-main">
      
      <form  action="<?= base_url();?>payment/update/<?= $entry->id; ?>" method="POST" >
        <div class="row">
          <div class="col-md-12">

            <div class="form-group">
              <label class="col-sm-4 control-label no-padding-left" for="ie_head">IE Head:<span class="text-bold text-danger">*</span></label>
              <div class="col-sm-8">
                <select class="form-control select-chosen" id="ie_head" name="ie_head" style="height: 30px; border-radius: 5px;">
                  <option value=" ">Select a head</option>
                  <?php if($ie_heads && isset($ie_heads)):  foreach($ie_heads as $head):?>
                    <option value="<?= $head->id; ?>" <?= ($head->id == $entry->ie_head)?'selected': '' ?>><?= ucfirst($head->head_title); ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label no-padding-left" for="description">Note: </label>
              <div class="col-sm-8">
                <textarea id="description" name="description" placeholder="Short Note" class="form-control" ><?= $entry->description ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-8">
                 <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php $date = new DateTime($entry->date); echo date_format($date,'Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-8">
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