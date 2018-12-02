<div class="row">
  <div class="col-xs-12">
    <form method="post" action="<?= base_url(); ?>supplier/update/<?= $supplier->id; ?>">  
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Supplier Information</h4>
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

            <div class="row">
              <div class="col-sm-2">
                <input type="hidden" name="redirect_url" value="<?= $_SERVER['HTTP_REFERER']?>">
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_code"> Supplier  Code:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_code" value="<?= $supplier->sup_code; ?>" name="sup_code" placeholder="Supplier Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_name"> Supplier Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_name" name="sup_name" value="<?= $supplier->sup_name; ?>" required placeholder="Supplier Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_phone"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="number" id="sup_phone" name="sup_phone" value="<?= $supplier->sup_phone; ?>" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_email"> Email Address:</label>
                  <div class="col-sm-7">
                    <input type="email" id="sup_email" name="sup_email" value="<?= $supplier->sup_email; ?>" placeholder="Email Address" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="sup_ent_date"> Entry Date:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                     <input class="form-control date-picker" required id="sup_ent_date" name="sup_ent_date" type="text" value="<?php $date = New DateTime($supplier->sup_ent_date); echo date_format($date, 'Y-m-d'); ?>" 
                      data-date-format="yyyy-mm-dd" />

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="sup_ref"> Referance:</label>
                  <div class="col-sm-8">
                    <input type="text" id="sup_ref" name="sup_ref" value="<?= $supplier->sup_ref; ?>" placeholder="Referance" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="sup_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="sup_address"  name="sup_address" placeholder="Address" class="form-control" ><?= $supplier->sup_address; ?></textarea>
                  </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" class="btn btn-primary cus_submit">Update</button>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>  
</div>
