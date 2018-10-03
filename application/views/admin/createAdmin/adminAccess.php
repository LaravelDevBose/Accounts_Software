<?php
  $id = $id;
  $qu = $this->db->where('ac_admin_id',$id )->limit(1)->get('tbl_access');
  $fatchAccess = $qu->result();
?>

<div class="col-sm-12" style="width: 600px;">
<style type="text/css">
  .form-group{
    margin-top: -13px;
  }
</style>

 <!-- Page header -->
<div class="page-header">
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li class="active btn btn-primary btn-xs" style="background: #1D2841;"> 
        <a href="#" style="color: #ddd;">
          <i class="icon-plus3"></i> Admin Access &nbsp; &nbsp; &nbsp;
        </a>
      </li>
    </ul>
  </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content" >
  <!-- Main content -->
  <div class="row">
    <div class="col-lg-12">
    <!-- main page sources -->
    <div class="panel panel-flat">
    <!-- Form validation -->
       
       <?php 
          if (isset($fatchAccess)) :
              foreach ($fatchAccess as $data) : 
        ?>
          <div class="panel-body">
           <?php $this->load->view('admin/error_success_msg'); ?>

            <form class="form-horizontal form-validate-jquery" enctype="multipart/form-data" method="post" action="<?php echo base_url()?>DefineAccess">

            <fieldset class="content-group">

              
               <input type="hidden" name="u_id" value="<?php echo $id; ?>">

              <!-- Right Side Access -->
                <div class="col-lg-4">
                    <div class="checkbox checkbox-left checkbox-switchery switchery-sm">

                        <?php if($data->ac_publish_blog == 0): ?>
                        <label class="control-label col-lg-12">
                          <input type="checkbox" value="1" name="pb" class="switchery">Publish Blog
                        </label>
                        <?php elseif($data->ac_publish_blog == 1): ?>
                          <label class="control-label col-lg-12">
                          <input type="checkbox" checked="checked" value="1" name="pb" class="switchery">Publish Blog
                        </label>
                        <?php endif; ?>


                        <?php if($data->ac_list_blog == 0): ?>
                        <label class="control-label col-lg-12">
                          <input type="checkbox" value="1" name="lb" class="switchery">List of Blog
                        </label>
                        <?php elseif($data->ac_list_blog == 1): ?>
                          <label class="control-label col-lg-12">
                          <input type="checkbox" checked="checked" value="1" name="lb" class="switchery">List of Blog
                        </label>
                        <?php endif; ?>
                    </div>
                </div>


              <!-- Right Side Access -->
                <div class="col-lg-4">
                    <div class="checkbox checkbox-left checkbox-switchery switchery-sm">

                        <?php if($data->ac_category == 0): ?>
                        <label class="control-label col-lg-12">
                          <input type="checkbox" value="1" name="cat" class="switchery">Category
                        </label> 
                        <?php elseif($data->ac_category == 1): ?>
                           <label class="control-label col-lg-12">
                              <input type="checkbox" checked="checked" value="1" name="cat" class="switchery">Category
                            </label> 
                        <?php endif; ?>


                        <?php if($data->ac_contact_us == 0): ?>
                        <label class="control-label col-lg-12">
                          <input type="checkbox" value="1" name="contact" class="switchery">Contact Us
                        </label> 
                        <?php elseif($data->ac_contact_us == 1): ?>
                           <label class="control-label col-lg-12">
                              <input type="checkbox" checked="checked" value="1" name="contact" class="switchery">Contact Us
                            </label> 
                        <?php endif; ?>
                    </div>
                </div>

              <!-- Right Side Access -->
                <div class="col-lg-4">
                    <div class="checkbox checkbox-left checkbox-switchery switchery-sm">

                        <?php if($data->ac_setting == 0): ?>
                        <label class="control-label col-lg-12">
                          <input type="checkbox" value="1" name="sett" class="switchery">Setting
                        </label> 
                        <?php elseif($data->ac_setting == 1): ?>
                           <label class="control-label col-lg-12">
                              <input type="checkbox" checked="checked" value="1" name="sett" class="switchery">Setting
                            </label> 
                        <?php endif; ?>


                        <?php if($data->ac_upload_img == 0): ?>
                        <label class="control-label col-lg-12">
                          <input type="checkbox" value="1" name="ui" class="switchery">Upload Image
                        </label> 
                        <?php elseif($data->ac_upload_img == 1): ?>
                           <label class="control-label col-lg-12">
                              <input type="checkbox" checked="checked" value="1" name="ui" class="switchery">Upload Image
                            </label> 
                        <?php endif; ?>
                    </div>
                </div>


                <div class="col-lg-12  text-left" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-success">Define Access <i class="icon-arrow-right14 position-right"></i></button>
                </div>

             </fieldset>
          </form>
        </div>

        <?php endforeach; endif; ?>

      </div>
    </div>

    <!-- /main page sources -->
</div>
  <!-- /main content -->
  </div>
</div>




