
<?php if(!$admin || !isset($admin)){
    $data['warning'] ='No data Found!';
    $this->session->set_flashdata($data);
    redirect('listAdmin');
}?>

<div class="row">
  <div class="col-xs-12">
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>AdminUpdate/<?php echo $admin->admin_id; ?>">  

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Admin Information</h4>
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
                <input type="hidden" name="date" value="<?php echo date("l jS \of F Y"); ?>">

                  <input type="hidden" name="updateBy" value="<?php echo $this->session->userdata('name'); ?>">
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="user_name"> User Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="user_name"  name="user_name" readonly value="<?php echo $admin->admin_username; ?>" placeholder="User Name" class="form-control"  />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="email"> Email:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="email" name="email" value="<?php echo $admin->admin_email; ?>" required placeholder="Email" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="phone_no"> Phone No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="phone_no" name="phone_no" value="<?php echo $admin->admin_phone; ?>"  required placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="address" required name="address" placeholder="Address" class="form-control" ><?php echo $admin->admin_address; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="image"> Image:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                     <input type="hidden" name="old_image" value="<?php echo $admin->admin_image; ?>">

                       <input type="file" name="image" class="file-input-custom" accept="image/*">
                        <?php if($admin->admin_image !=0 ) : ?>
                        <img src="<?php echo base_url(); ?>libs/upload_pic/admin_pic/<?php echo $admin->admin_image; ?>" style="height:70px; width:70px;">
                        <?php elseif($admin->admin_image  == 0) : ?> 
                          <img src="<?php echo base_url(); ?>libs/upload_pic/no.png" style="height:70px; width:70px;">
                        <?php endif; ?>
                  </div>
                </div>

                
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" class="btn btn-primary pull-right">Submit</button>
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

