
 <!-- Page header -->
<div class="page-header">
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li>
        <a href="<?php echo base_url(); ?>admindashboard" class="btn btn-primary btn-xs" style="color: #ddd; background: #184C6F;">
          <i class="icon-home2 position-left"></i> Home
        </a>
      </li>
      <li class="active btn btn-primary btn-xs" style="background: #1D2841;"> 
        <a href="<?php echo base_url(); ?>createAdmin" style="color: #ddd;">
          <i class="icon-plus3"></i> Create Admin Form &nbsp; &nbsp; &nbsp;
        </a>
      </li>
      <li class="btn btn-primary btn-xs" style=" background: #184C6F;">
        <a href="<?php echo base_url(); ?>listAdmin" style="color: #ddd;">
          <i class="icon-eye"></i> List of Admin &nbsp; &nbsp; &nbsp;
        </a>
      </li>
    </ul>
  </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
  <!-- Main content -->
  <div class="row">
    <div class="col-lg-12">
    <!-- main page sources -->
    <div class="panel panel-flat">
    <!-- Form validation -->
	     <?php 
		  		if (isset($editData)) :
		  		foreach ($editData as $data) :
		  	 ?>
        <div class="panel-body">
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url()?>AdminUpdate/<?php echo $data->admin_id; ?>">

            <fieldset class="content-group">
  
                <?php $this->load->view('admin/error_success_msg'); ?>
                  <!-- Write Your Code Here -->

                   <input type="hidden" name="date" value="<?php echo date("l jS \of F Y"); ?>">

                  <input type="hidden" name="updateBy" value="<?php echo $this->session->userdata('name'); ?>">
                  
                  
                  <!-- Input group -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">User Name <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                      <div class="input-group">
                        <div class="input-group-addon"><i class="icon-user"></i></div>
                        <input type="text" readonly value="<?php echo $data->admin_username; ?>" autofocus name="user_name" class="form-control" placeholder="User Name">
                      </div>
                    </div>
                  </div>
                  <!-- /input group -->


                  <!-- Email field -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Email <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="icon-envelop5"></i></div>
                            <input type="email" name="email" value="<?php echo $data->admin_email; ?>"  class="form-control" id="email" placeholder="Enter a valid email address">
                        </div>
                    </div>
                  </div>
                  <!-- /email field -->



                   <!-- Password field -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Phone <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="icon-phone"></i></div>
                            <input type="text" required="required" value="<?php echo $data->admin_phone; ?>"  name="minimum_characters" id="minimum_characters" class="form-control" placeholder="Phone">
                      </div>
                    </div>
                  </div>
                  <!-- /password field -->


                  <!-- Address -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Address <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="icon-map4"></i></div>
                          <textarea rows="5" cols="5" name="address" class="form-control" placeholder="Address"><?php echo $data->admin_address; ?></textarea>
                        </div>
                    </div>
                  </div>
                  <!-- /Address -->


                  <!-- Image uploader -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Image <span class="text-danger"></span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                         <input type="hidden" name="old_image" value="<?php echo $data->admin_image; ?>">

                         <input type="file" name="image" class="file-input-custom" accept="image/*">
                          <?php if($data->admin_image !=0 ) : ?>
                          <img src="<?php echo base_url(); ?>libs/upload_pic/admin_pic/<?php echo $data->admin_image; ?>" style="height:70px; width:70px;">
                          <?php elseif($data->admin_image  == 0) : ?> 
                            <img src="<?php echo base_url(); ?>libs/upload_pic/no.png" style="height:70px; width:70px;">
                          <?php endif; ?>

                        </div>
                    </div>
                  </div>
                  <!-- /Image uploader -->

             </fieldset>

             <div class="text-right">
       			   <a href="<?php echo base_url(); ?>listAdmin" type="reset" class="btn btn-primary" id="reset"><i class="icon-circle-left2  position-left"></i> Back </a> &nbsp;
                  <button type="submit" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
            </div>

          </form>
        </div>

        <?php  endforeach; endif;  ?>

      </div>
    </div>
    <!-- /main page sources -->
</div>
  <!-- /main content -->