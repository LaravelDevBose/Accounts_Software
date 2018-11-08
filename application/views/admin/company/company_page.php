
<div class="row">
  <div class="col-xs-12">
    <form id="CusOrderForm" method="post" action="<?= base_url('company/store'); ?>">  
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Company Information</h4>
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
                  <label class="col-sm-5 control-label no-padding-left" for="comp_name">Company Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="comp_name" name="comp_name" required placeholder="Company  Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="comp_phone"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="number" id="comp_phone" name="comp_phone" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="comp_email"> Email Address:</label>
                  <div class="col-sm-8">
                    <input type="email" id="comp_email" name="comp_email" placeholder="Email Address" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="comp_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="comp_address"  name="comp_address" placeholder="Address" class="form-control" ></textarea>
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
          <h4 class="widget-title">Company Information List</h4>
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
                      <th style="display: none;"></th>
                      <th style="">#</th>
                      <th>Company Name</th>
                      <th>Contact No.</th>
                      <th>Email Address</th>
                      <th>Address</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>

                  <tbody id="tBody">
                    <?php $i=1;  if(isset($companies) && $companies): foreach($companies as $company):?>
                    <tr>
                      <td style="display: none;"></td>
                      <td><?= $i++ ?></td>
                      <td><?= $company->comp_name ?></td>
                      <td><?= $company->comp_phone ?></td>
                      <td><?= $company->comp_email ?> </td>
                      <td><?= $company->comp_address; ?></td>
                      <td>
                          <div class="hidden-sm hidden-xs action-buttons">
                              <a class="green linka fancybox fancybox.ajax " href="<?= base_url();?>company/edit/<?= $company->id;?>" >
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>
                              <a class="red" href="<?= base_url(); ?>company/delete/<?= $company->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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


