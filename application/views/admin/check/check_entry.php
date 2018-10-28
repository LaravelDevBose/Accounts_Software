
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Check Information</h4>
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
            <form id="check_form" action="<?= base_url();?>check/store" method="POST">
              <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-4">
                  
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="cus_id">Select Customer:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-7">
                      <select class="chosen-select form-control" id="cus_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                        <option value=" ">Select a Customer</option>
                        <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                          <option value="<?= $customer->id; ?>"><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="bank_name">Bank Name:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                      <input type="text" id="bank_name"  name="bank_name" required placeholder="Bank Name" class="form-control"  />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="branch_name">Branch Name:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                      <input type="text" id="branch_name"  name="branch_name" required placeholder="Branch Name" class="form-control"  />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="check_no">Check No:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                      <input type="text" id="check_no"  name="check_no" required placeholder="Check No" class="form-control"  />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="check_amount">Check Amount:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                      <input type="text" id="check_amount"  name="check_amount" required placeholder="Check Amount" class="form-control"  />
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
                    <label class="col-sm-5 control-label no-padding-left" for="check_date">Check Date:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                       <input class="form-control date-picker" required id="check_date" name="check_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="remid_date">Reminder Date:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                       <input class="form-control date-picker" required id="remid_date" name="remid_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="sub_date">Submit Date:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                       <input class="form-control date-picker" required id="sub_date" name="sub_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="note">Despription: </label>
                    <div class="col-sm-7">
                       <input type="text" id="note" name="note" class="form-control"  placeholder="Despription" />
                    </div>
                  </div>
                  
                  <div class="form-group" style="margin-top: 10px;">
                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                    <div class="col-sm-8">
                      <button type="submit" id="check_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary cus_submit">Submit</button>
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
        <h4 class="widget-title">Check Information List</h4>
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
                <th>Date</th>
                <th>Customer Name</th>
                <th>Bank Name - Branch Name</th>
                <th>Chack No</th>
                <th>Check Date</th>
                <th>Note</th>
                <th>Check Amount</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody id="tBody">
                <?php $i=1; if(isset($checks)&&$checks ): foreach($checks as $check):?>
              <tr>
                <td><?php 
                      $date = new DateTime($check->date);
                      echo date_format($date, 'd M Y'); 
                    ?></td>
                <td><?= $check->cus_name; ?></td>
                <td><?= $check->bank_name.'-'.$check->branch_name; ?></td>
                <td><?= $check->check_no; ?></td>
                <td><?php 
                      $date = new DateTime($check->check_date);
                      echo date_format($date, 'd M Y'); 
                    ?></td>
                <td><?= $check->note; ?></td>
                <td><?= number_format($check->check_amount,2); ?></td>
                <td>
                    <!-- <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>lc/edit/<?= $check->id; ?>" >
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="<?= base_url(); ?>lc/delete/<?= $check->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
                          <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div> -->
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
      

<?php $this->load->view('admin/ajax/check_ajax');?>
