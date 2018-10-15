<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header"> 
        <h4 class="widget-title">Employee Wise Salary Report List</h4>
        <div class="widget-toolbar">

          <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
        </div>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            <div class="col-md-12">
              <div class="widget-box " >
                <div class="widget-body" style="background-color: #E7F2F8;">
                  <div class="widget-main">
                    <div class="row">
    
                      <div class="col-sm-1"></div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label class="col-sm-5 control-label no-padding-left" for="employee_id">Employee Name:<span class="text-bold text-danger">*</span></label>
                          <div class="col-sm-7">
                            <select class="chosen-select form-control" id="employee_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                              <option value=" ">Select a Employee</option>
                              <?php if($employees && isset($employees)):  foreach($employees as $employee):?>
                                <option value="<?= $employee->id; ?>"><?= ucfirst($employee->emp_name); ?></option>
                              <?php endforeach; endif; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group" >
                          <div class="col-sm-8">
                            <button type="button" id="emp_salary_search" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ">Search</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div id="data_table">
            <div class="table-header">
              Employee Wise Salary Report
            </div>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL No</th>
                  <th>Employee Name</th>
                  <th>Payment Month</th>
                  <th>Payment Date</th>
                  <th class="success">Paid Price</th>
                  <th class="danger">Due Price</th>
                </tr>
              </thead>

              <tbody id="tBody">
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('admin/ajax/salary_payment_ajax');?>