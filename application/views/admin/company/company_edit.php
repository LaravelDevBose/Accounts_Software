<div class="widget-box" style="width: 600px;">
    <div class="widget-header">
      <h4 class="widget-title">Update Company Information</h4>
    </div>

    <div class="widget-body">
      <div class="widget-main">
		    <form action="<?= base_url()?>company/update/<?= $company->id; ?>" method="POST">
            <div class="row">
              <div class="col-sm-2"></div>

              <div class="col-sm-8">
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="comp_name">Company Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="comp_name" name="comp_name" value="<?= $company->comp_name ?>"  required placeholder="Company  Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="comp_phone"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="number" id="comp_phone" name="comp_phone" value="<?= $company->comp_phone ?>" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="comp_email"> Email Address:</label>
                  <div class="col-sm-7">
                    <input type="email" id="comp_email" name="comp_email" value="<?= $company->comp_email ?>" placeholder="Email Address" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="comp_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <textarea id="comp_address"  name="comp_address" placeholder="Address" class="form-control"><?= $company->comp_address ?></textarea>
                  </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-5 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-7">
                    <button type="Submit" class="btn btn-primary cus_submit pull-right">Update</button>
                  </div>
                </div>
              </div>
          
            </div>
        </form>
      </div>
    </div>
 </div>

