
<div class="row">
  <div class="col-xs-12">
    <form id="CusOrderForm" method="post" action="<?= base_url('customer/store'); ?>" autocomplete="off" enctype="multipart/form-data">  
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Customer Information</h4>
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
                    <input type="text" id="cus_code" value="<?= $cus_code?>" name="cus_code" placeholder="Customer Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_name"> Customer Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_name" name="cus_name" required placeholder="Customer Name" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="org_name"> Organization Name:</label>
                  <div class="col-sm-7">
                    <input type="text" id="org_name" name="org_name" placeholder="Organization Name" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_contact_no"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="number" id="cus_contact_no" name="cus_contact_no"  required placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="alt_contact_no"> Alt. Contact No:</label>
                  <div class="col-sm-7">
                    <input type="number" id="alt_contact_no" name="alt_contact_no" placeholder="Alt. Contact No" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_email"> E-mail:</label>
                  <div class="col-sm-7">
                    <input type="email" id="cus_email" name="cus_email" placeholder="E-mail" class="form-control" />
                  </div>
                </div>
                
              </div>


              <div class="col-sm-4">
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_entry_date"> Entry Date:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                     <input class="form-control date-picker" required id="cus_entry_date" name="cus_entry_date" type="text" value="<?php echo date('Y-m-d'); ?>" 
                      data-date-format="yyyy-mm-dd" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="cus_address" required name="cus_address" placeholder="Address" class="form-control" ></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_fb"> Facebook Id:</label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_fb" name="cus_fb" placeholder="Facebook Id Url" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2"> Image:</label>
                  <div class="col-sm-8">
                    <input type="file" name="cus_image" required id="id-input-file-2" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2">Business Card:</label>
                  <div class="col-sm-8">
                    <input type="file" name="cus_bus_card" id="id-input-file-2" class="form-control">
                  </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" class="btn btn-primary cus_submit pull-right">Submit</button>
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

<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Customer Information List</h4>
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
              <div class="col-xs-12">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                     
                      <th colspan="2">Customer Info</th>
                      <th>Contact No.</th>
                      <th>Email Address</th>
                      <th>Entry Date</th>
                      <th>Address</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>

                  <tbody id="tBody">
                      <?php  if($customers && isset($customers)): foreach($customers as $customer):?>
                    <tr>
                      <?php  $image = base_url().$customer->cus_image;  if(!file_exists($image) && !getimagesize($image) ){ $image =base_url().'libs/upload_pic/no.png';} ?>
                      <td><img src="<?= $image ?>" alt="" style="height: 40px; width: 40px; border: 1px solid #ddd;"></td>
                      <td><?= $customer->cus_code.'-'.$customer->cus_name ?></td>
                      <td><?= $customer->cus_contact_no.'<br>'.$customer->alt_contact_no ?></td>
                      <td><?= $customer->cus_email ?> </td>
                      <td>
                        <?php 
                          $date = new DateTime($customer->cus_entry_date);
                          echo date_format($date, 'd M Y'); 
                        ?>
                            
                      </td>
                      <td><?= $customer->cus_address; ?></td>
                      <td>
                          <div class="hidden-sm hidden-xs action-buttons">
                              <a class="green " href="<?= base_url();?>customer/edit/<?= $customer->id;?>" >
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>
                              <a class="red" href="<?= base_url(); ?>customer/delete/<?= $customer->id ?>" onclick="confirm('Are You Sure Went to Delete This! ')">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
                          </div>
                      </td>

                      
                    </tr>
                    <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

