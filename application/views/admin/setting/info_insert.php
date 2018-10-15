<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Company Information</h4>
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
            
            <form id="other_income" >
              <div class="row">
                
                <div class="col-sm-4">
                  
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="ie_head">Account Name:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control select-chosen" id="ie_head" name="ie_head" style="height: 30px; border-radius: 5px;">
                        <option value=" ">Select a head</option>
                        <?php if($ie_heads && isset($ie_heads)):  foreach($ie_heads as $head):?>
                          <option value="<?= $head->id; ?>"><?= ucfirst($head->head_title); ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="description">Description: </label>
                    <div class="col-sm-7">
                      <textarea id="description" name="description" placeholder="Short Description" class="form-control" ></textarea>
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
                       <input type="number" id="amount" required name="amount" class="form-control" placeholder="Enter The Amount" />
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
