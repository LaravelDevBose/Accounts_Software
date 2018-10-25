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
            
            <form id="other_income" action="<?= base_url();?>company_info/store" method="POST" autocomplete="off" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-1"></div>
                
                <div class="col-md-4">
                  <div class="col-md-5"></div>
                  <div class="col-md-5">
                    <?php  $image = base_url().$logo;  if(!file_exists($image) && !getimagesize($image) ){ $image =base_url().'libs/upload_pic/no.png';} ?>
                    <img src="<?= $image ?>" alt="" style="height: 60px; width: 60px; border: 1px solid #ddd; margin-bottom: 5px;">
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2">Company Logo:</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="old_logo" value="<?= $logo ?>">
                      <input type="file" name="logo" id="id-input-file-2" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-sm-5">
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="cmp_name">Company Name:</label>
                    <div class="col-sm-8">
                      <input type="text" id="cmp_name" name="cmp_name" value="<?php if(isset($cmp_name) && $cmp_name){echo $cmp_name; }?>" class="form-control" placeholder="Company Name" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="cmp_adds">Address: </label>
                    <div class="col-sm-8">
                      <textarea id="cmp_adds" name="cmp_adds"  placeholder="Company Address" class="form-control" ><?php if(isset($cmp_adds) && $cmp_adds){echo $cmp_adds; }?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="cmp_phn"> Phone No: </label>
                    <div class="col-sm-8">
                       <input type="text" id="cmp_phn" name="cmp_phn" value="<?php if(isset($cmp_phn) && $cmp_phn){echo $cmp_phn; }?>" class="form-control" placeholder="Company Phone Number" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="cmp_eml"> Email Address : </label>
                    <div class="col-sm-8">
                       <input type="text" id="cmp_eml"  name="cmp_eml" value="<?php  if(isset($cmp_eml) && $cmp_eml){echo $cmp_eml; }?>" class="form-control" placeholder="Company Email Address" />
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
