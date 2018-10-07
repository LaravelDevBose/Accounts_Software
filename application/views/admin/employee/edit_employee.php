<?php if(!$employee || !isset($employee)){
    $data['warning'] ='No data Found!';
    $this->session->set_flashdata($data);
    redirect('employees');
}?>

<div class="row">
  <div class="col-xs-12">
    <form id="CusOrderForm" method="post" action="<?= base_url(); ?>employee/update/<?= $employee->id?>">  
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Edit Employee Information</h4>
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
                  <label class="col-sm-5 control-label no-padding-left" for="emp_name"> Employee Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="emp_name" required name="emp_name" value="<?= $employee->emp_name ?>" placeholder="Employee Name" class="form-control"  />
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="emp_dob"> Date of Birth:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                     <input class="form-control date-picker" required id="emp_dob" name="emp_dob" type="text" value="<?= $employee->emp_dob ?>"  data-date-format="yyyy-mm-dd" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="emp_nid"> Employee NID:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="emp_nid" name="emp_nid" value="<?= $employee->emp_nid ?>" required placeholder="Employee NID" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="emp_phone"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="emp_phone" name="emp_phone" value="<?= $employee->emp_phone ?>" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="emp_email"> Email Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="email" id="emp_email" name="emp_email" value="<?= $employee->emp_email ?>" placeholder="Email Address" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="emp_join_date"> Joining Date:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                     <input class="form-control date-picker"  required id="emp_join_date" name="emp_join_date" type="text" value="<?= $employee->emp_join_date ?>"  data-date-format="yyyy-mm-dd" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="emp_sallary"> Sallary:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="number" id="emp_sallary" required name="emp_sallary" value="<?= $employee->emp_sallary?>" placeholder="Sallary" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="pre_address"> Present Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="pre_address" required name="pre_address" placeholder="Present Address" class="form-control" ><?= $employee->pre_address?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="par_address"> Parmanet Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="par_address"  name="par_address" placeholder="Parmanent Address" class="form-control" ><?= $employee->par_address?></textarea>
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

