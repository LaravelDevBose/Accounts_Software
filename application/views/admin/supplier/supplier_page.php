
<div class="row">
  <div class="col-xs-12">
    <form id="CusOrderForm" method="post" action="<?= base_url('supplier/store'); ?>">  
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Supplier Information</h4>
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
                  <label class="col-sm-5 control-label no-padding-left" for="sup_code"> Supplier  Code:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_code" value="<?= $sup_code?>" name="sup_code" placeholder="Supplier Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_name"> Supplier Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_name" name="sup_name" required placeholder="Supplier Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_phone"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="number" id="sup_phone" name="sup_phone" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_email"> Email Address:</label>
                  <div class="col-sm-7">
                    <input type="email" id="sup_email" name="sup_email" placeholder="Email Address" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="sup_ent_date"> Entry Date:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                     <input class="form-control date-picker" required id="sup_ent_date" name="sup_ent_date" type="text" value="<?php echo date('Y-m-d'); ?>" 
                      data-date-format="yyyy-mm-dd" />

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="sup_ref"> Referance:</label>
                  <div class="col-sm-8">
                    <input type="text" id="sup_ref" name="sup_ref" placeholder="Referance" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="sup_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="sup_address"  name="sup_address" placeholder="Address" class="form-control" ></textarea>
                  </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" class="btn btn-primary cus_submit">Submit</button>
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
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                     
                      <th>Supplier Code</th>
                      <th>Supplier Name</th>
                      <th>Contact No.</th>
                      <th>Email Address</th>
                      <th>Entry Date</th>
                      <th>Reference</th>
                      <th>Address</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>

                  <tbody id="tBody">
                      <?php  if($suppliers && isset($suppliers)): foreach($suppliers as $supplier):?>
                    <tr>
                      <td><?= $supplier->sup_code ?></td>
                      <td><?= $supplier->sup_name ?></td>
                      <td><?= $supplier->sup_phone ?></td>
                      <td><?= $supplier->sup_email ?> </td>
                      <td>
                        <?php 
                          $date = new DateTime($supplier->sup_ent_date);
                          echo date_format($date, 'd M Y'); 
                        ?>
                            
                      </td>
                      <td><?= $supplier->sup_ref; ?></td>
                      <td><?= $supplier->sup_address; ?></td>
                      <td>
                          <div class="hidden-sm hidden-xs action-buttons">
                              <a class="green " href="<?= base_url();?>supplier/edit/<?= $supplier->id;?>" >
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>
                              <a class="red" href="<?= base_url(); ?>supplier/delete/<?= $supplier->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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


