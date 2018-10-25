<?php if(!$customer || !isset($customer)){
    $data['warning'] ='No data Found!';
    $this->session->set_flashdata($data);
    redirect('customers');
}?>

<div class="row">
  <div class="col-xs-12">
    <form  method="post" action="<?= base_url(); ?>customer/update/<?= $customer->id;?>" autocomplete="off" enctype="multipart/form-data">  
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Edit Customer Information</h4>
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
              <div class="col-sm-2"></div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_code"> Customer  Code:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_code" value="<?= $customer->cus_code; ?>" name="cus_code" placeholder="Customer Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_name"> Customer Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_name" name="cus_name" value="<?= $customer->cus_name; ?>" required placeholder="Customer Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_contact_no"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_contact_no" value="<?= $customer->cus_contact_no; ?>" name="cus_contact_no" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="alt_contact_no"> Alt. Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="alt_contact_no" name="alt_contact_no" value="<?= $customer->alt_contact_no; ?>" placeholder="Alt. Contact No" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_email"> E-mail:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_email" name="cus_email" value="<?= $customer->cus_email; ?>" placeholder="E-mail" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_fb"> Facebook Id:</label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_fb" name="cus_fb" value="<?= $customer->cus_fb; ?>" required placeholder="Facebook Id Url" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_entry_date"> Entry Date:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                     <input type="date" id="cus_entry_date" name="cus_entry_date"  required class="form-control date-picker" value="<?php $date = new DateTime($customer->cus_entry_date); echo date_format($date, 'Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="cus_address" required name="cus_address" placeholder="Address" class="form-control" ><?= $customer->cus_address; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2"> Image:</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="old_cus_img" value="<?= $customer->cus_image?>">
                    <input type="file" name="cus_image"  id="id-input-file-2" class="form-control">
                  </div>
                </div>
                <div class="form-group">

                  <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2">Business Card:</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="old_bus_card" value="<?= $customer->cus_bus_card?>">
                    <input type="file" name="cus_bus_card" id="id-input-file-2" class="form-control">
                  </div>
                </div>

                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" class="btn btn-primary cus_submit">Update</button>
                  </div>
                </div>


              </div>
              <div class="col-md-2">
                <?php  $image = base_url().$customer->cus_image;  if(!file_exists($image) && !getimagesize($image) ){ $image =base_url().'libs/upload_pic/no.png';} ?>
                <img src="<?= $image ?>" alt="" style="height: 70px; width: 100px; border: 1px solid #ddd; margin-bottom: 5px;">

                <?php  $image = base_url().$customer->cus_bus_card;  if(!file_exists($image) && !getimagesize($image) ){ $image =base_url().'libs/upload_pic/no.png';} ?>
                <img src="<?= $image ?>" alt="" style="height: 70px; width:100px; border: 1px solid #ddd;">
              </div>
          
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
