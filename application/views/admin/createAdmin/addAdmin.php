
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
      <div class="panel-heading">
            <div class="heading-elements">
              <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="reload"></a></li>
                  <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
       
        <div class="panel-body">
          <form class="form-horizontal form-validate-jquery" enctype="multipart/form-data" method="post" action="<?php echo base_url()?>saveAdmin">

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
                        <input type="text" autofocus name="user_name" class="form-control" required="required" placeholder="User Name">
                      </div>
                    </div>
                  </div>
                  <!-- /input group -->


                  <!-- Password field -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Password <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="icon-lock"></i></div>
                            <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <!-- /password field -->


                  <!-- Repeat password -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Repeat password <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="icon-lock"></i></div>
                             <input type="password" name="repeat_password" class="form-control" required="required" placeholder="Repeat password">
                        </div>
                    </div>
                  </div>
                  <!-- /repeat password -->


                  <!-- Email field -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Email <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="icon-envelop5"></i></div>
                            <input type="email" name="email" class="form-control" id="email" required="required" placeholder="Enter a valid email address">
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
                            <input type="text" name="minimum_characters" id="minimum_characters" class="form-control" required="required" placeholder="Phone">
                      </div>
                    </div>
                  </div>
                  <!-- /password field -->


                  <!-- Address -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Address <span class="text-danger"></span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="icon-map4"></i></div>
                          <textarea rows="5" cols="5" name="address" class="form-control" placeholder="Address"></textarea>
                        </div>
                    </div>
                  </div>
                  <!-- /Address -->


                  <!-- Image uploader -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Image <span class="text-danger"></span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                         <!--  <div class="input-group-addon"><i class=" icon-image2"></i></div> -->
                         <input type="file" name="image" class="file-input-custom" accept="image/*">
                        </div>
                    </div>
                  </div>
                  <!-- /Image uploader -->

             </fieldset>

             <div class="text-right">
                  <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button> &nbsp;
                  <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>

          </form>
        </div>
      </div>
    </div>
    <!-- /main page sources -->
</div>
  <!-- /main content -->