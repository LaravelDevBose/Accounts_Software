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
            
            <form id="other_income" action="<?= base_url();?>store/company_info" method="POST" enctype="multipart/form-data" >
              <div class="row">
                <div class="col-md-1"></div>
                
                <div class="col-md-4">
                  <div class="col-md-5"></div>
                  <div class="col-md-5">
                    <img src="<?= base_url().'libs/upload_pic/no.png'?>" alt="" style="height: 60px; width: 60px;">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2">Company Logo:</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="old_logo">
                      <input type="file" name="comp_logo" id="id-input-file-2" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-sm-5">
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="comp_name">Company Name:</label>
                    <div class="col-sm-8">
                      <input type="text" id="comp_name" name="comp_name" class="form-control" placeholder="Company Name" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="comp_address">Address: </label>
                    <div class="col-sm-8">
                      <textarea id="comp_address" name="comp_address" placeholder="Company Address" class="form-control" ></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="comp_phone"> Phone No: </label>
                    <div class="col-sm-8">
                       <input type="number" id="comp_phone" name="comp_phone" class="form-control" placeholder="Company Phone Number" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="comp_email"> Email Address : </label>
                    <div class="col-sm-8">
                       <input type="number" id="comp_email"  name="comp_email" class="form-control" placeholder="Company Email Address" />
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
