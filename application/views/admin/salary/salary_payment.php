
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Salary Payment Information</h4>
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
            <form id="salary_payment">
              <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-4">
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="emp_id">Name:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-7">
                      <select class="chosen-select form-control emp_id" id="emp_id" name="emp_id" required  style="height: 30px; border-radius: 5px;">
                        <option value="0">Select a Employee</option>
                        <?php if($employees && isset($employees)):  foreach($employees as $employee):?>
                          <option value="<?= $employee->id; ?>"><?= $employee->emp_name; ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                      <span id="msg1" style="color: red; display: none;">This Field Is Required</span>
                    </div>
                      <div class="col-sm-1" style="padding: 0;">
                          <a href="<?= base_url('employee/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="salary_range"> Salary Range:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-8">
                      <input type="text" id="salary_range" required name="salary_range" readonly placeholder="Salary Range" class="form-control"  />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="month_id">Month:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-7">
                      <select class="chosen-select form-control" id="month_id" name="month_id" required  style="height: 30px; border-radius: 5px;">
                        <option value="0">Select a Month Name</option>
                        <?php if($months && isset($months)):  foreach($months as $month):?>
                          <option value="<?= $month->id; ?>"><?= $month->month_name.'-'.$month->year; ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                      <span id="msg2" style="color: red; display: none;">This Field Is Required</span>
                    </div>
                      <div class="col-sm-1" style="padding: 0;">
                          <a href="<?= base_url('employee/month')?>" title="Add New Sallary Month" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                      </div>
                  </div>

                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                       <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="payment_amount"> Payment Amount:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                      <input type="number" id="payment_amount" required name="payment_amount" placeholder="Paument Amount" class="form-control"  />
                      <span id="msg3" style="color: red; display: none;">This Field Is Required</span>
                    </div>
                  </div>

                  <div class="form-group" style="display: none">
                    <label class="col-sm-5 control-label no-padding-left" for="due_amount"> Due Amount: </label>
                    <div class="col-sm-7">
                      <input type="number" id="due_amount" value="0" name="due_amount" placeholder="Due Amount" class="form-control"  />
                    </div>
                  </div>
                  <div class="form-group" style="margin-top: 10px;">
                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                    <div class="col-sm-8">
                      <button type="Submit" id="salary_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary month_submit">Submit</button>
                    </div>
                  </div>


                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
  </div>  
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Sallary Payment Information List</h4>
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
          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>SL No</th>
                <th>Employee Name</th>
                <th>Month</th>
                <th>Date</th>
                <th>Payment Amount</th>
                <th style="display: none" >Due Amount</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody id="tBody">
              <?php $i=1; if($salaries && isset($salaries)): foreach($salaries as $salary):?>
              <tr>
                
                <td><?= $i++; ?></td>
                <td><?= ucfirst($salary->emp_name); ?></td>
                <td><?= $salary->month_name.' - '.$salary->year; ?></td>
                <td><?php $date = new DateTime($salary->date); echo date_format($date, 'd M Y'); ?></td>
                <td><?= number_format($salary->payment_amount, 2); ?></td>
                <td style="display: none" ><?= number_format($salary->due_amount, 2); ?></td>
                
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>salary/edit/<?= $salary->id; ?>" >
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="<?= base_url(); ?>salary/delete/<?= $salary->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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
      

<?php $this->load->view('admin/ajax/salary_payment_ajax');?>
