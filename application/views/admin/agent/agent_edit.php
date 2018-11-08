<div class="widget-box" style="width: 600px;">
    <div class="widget-header">
      <h4 class="widget-title">Update C&F Agent Information</h4>
    </div>

    <div class="widget-body">
      <div class="widget-main">
		    <form action="<?= base_url()?>agent/update/<?= $agent->id; ?>" method="POST">
            <div class="row">
              <div class="col-sm-2"></div>

              <div class="col-sm-8">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="agent_code"> Agent  Code:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="agent_code" value="<?= $agent->agent_code?>" name="agent_code" placeholder="Agent Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="agent_name"> Agent Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="agent_name" name="agent_name" value="<?= $agent->agent_name ?>" required placeholder="Agent Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="agent_phone"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="number" id="agent_phone" name="agent_phone" value="<?= $agent->agent_phone ?>" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="agent_email"> Email Address:</label>
                  <div class="col-sm-8">
                    <input type="email" id="agent_email" name="agent_email" value="<?= $agent->agent_email ?>" placeholder="Email Address" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="agent_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="agent_address"  name="agent_address" placeholder="Address" class="form-control" ><?= $agent->agent_address ?></textarea>
                  </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" class="btn btn-primary cus_submit pull-right">Update</button>
                  </div>
                </div>
              </div>
          
            </div>
        </form>
      </div>
    </div>
 </div>

