<div class="widget-box" style="width:500px;">
  <div class="widget-header">
    <h4 class="widget-title">Update Expense Head Information</h4>
  </div>

  <div class="widget-body">
    <div class="widget-main">
  	 <form id="salary_payment" action="<?= base_url();?>salary/update/<?= $salary->id; ?>" method="POST">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="e_emp_id">Name:<span class="text-bold text-danger">*</span></label>
              <div class="col-sm-7">
                <select class="chosen-select form-control " id="e_emp_id" name="emp_id" required  style="height: 30px; border-radius: 5px;">
                  <option value="0">Select a Employee</option>
                  <?php if($employees && isset($employees)):  foreach($employees as $employee):?>
                    <option value="<?= $employee->id; ?>"  <?= ($employee->id == $salary->emp_id)?'selected':'' ?> ><?= $employee->emp_name; ?></option>
                  <?php endforeach; endif; ?>
                </select>
                <span id="msg4" style="color: red; display: none;">This Field Is Required</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="e_salary_range"> Salary Range:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                <input type="text" id="e_salary_range" required name="salary_range" value="<?= $salary->emp_sallary; ?>" readonly placeholder="Salary Range" class="form-control"  />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="e_month_id">Month:<span class="text-bold text-danger">*</span></label>
              <div class="col-sm-7">
                <select class="chosen-select form-control" id="e_month_id" name="month_id" required  style="height: 30px; border-radius: 5px;">
                  <option value="0">Select a Month Name</option>
                  <?php if($months && isset($months)):  foreach($months as $month):?>
                    <option value="<?= $month->id; ?>" <?= ($month->id == $salary->month_id)?'selected':'' ?> ><?= $month->month_name.'-'.$month->year; ?></option>
                  <?php endforeach; endif; ?>
                </select>
                <span id="msg5" style="color: red; display: none;">This Field Is Required</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                 <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php $date = new DateTime($salary->date); echo date_format($date, 'Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="e_payment_amount"> Payment Amount:<span class="text-bold text-danger">*</span> </label>
              <div class="col-sm-7">
                <input type="hidden" id="prv_pam" value="<?= $salary->payment_amount; ?>">
                <input type="number" id="e_payment_amount" required name="payment_amount" value="<?= $salary->payment_amount; ?>" placeholder="Payment Amount" class="form-control"  />
                <span id="msg6" style="color: red; display: none;">This Field Is Required</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5 control-label no-padding-left" for="due_amount"> Due Amount: </label>
              <div class="col-sm-7">
                <input type="number" id="due_amount" value="<?= $salary->due_amount; ?>" name="due_amount" placeholder="Due Amount" class="form-control"  />
              </div>
            </div>
            <div class="form-group" style="margin-top: 10px;">
              <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
              <div class="col-sm-8">
                <button type="Submit" id="e_salary_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary month_submit">Submit</button>
              </div>
            </div>


          </div>

        </div>
      </form>
    </div>
  </div>
</div>

<?php $this->load->view('admin/ajax/salary_payment_ajax');?>
<script>
    $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
  </script>

