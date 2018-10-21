
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Office Payment</h4>
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
            
            <form id="payment_entry" >
              <div class="row">
                <div class="col-sm-2">
                  <input type="hidden" name="payment_type" value="OP">
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="payment_code">Payment Id: </label>
                    <div class="col-sm-7">
                      <input type="text" id="payment_code" required name="payment_code" value="<?= $code; ?>" readonly class="form-control" placeholder="Payment Code" /> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="head_id">Expense Name:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control chosen-select" id="head_id" name="head_id" style="height: 30px; border-radius: 5px;">
                        <option value=" ">Select a head</option>
                        <?php if($heads && isset($heads)):  foreach($heads as $head):?>
                          <option value="<?= $head->id; ?>"><?= ucfirst($head->head_title); ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="payment_amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                       <input type="number" id="payment_amount" required name="payment_amount" class="form-control" placeholder="Enter The Amount" />
                    </div>
                  </div>

                  
                </div>

                <div class="col-sm-4">

                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="payment_date"> Date:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-7">
                       <input class="form-control date-picker" required id="payment_date" name="payment_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="note">Description: </label>
                    <div class="col-sm-7">
                      <input id="note" type="text" name="note" placeholder="Short Description" class="form-control" >
                    </div>
                  </div>

                  <div class="form-group" style="margin-top: 10px;">
                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                    <div class="col-sm-8">
                      <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Submit</button>
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

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Office Payment Information List</h4>
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
                <th>Date</th>
                <th>Payment Id</th>
                <th>Expense Head</th>
                <th>Note</th>
                <th>Amount</th>
                <th>Action</th>
                
              </tr>
            </thead>

            <tbody id="tBody">
              <?php $i=1; if($payments && isset($payments)): foreach($payments as $data):?>
              <tr>

                <td><?= $i++; ?></td>
                <td>
                  <?php 
                    $date = new DateTime($data->payment_date);
                    echo date_format($date, 'd M Y'); 
                  ?> 
                </td>
                <td><?= $data->payment_code; ?></td>
                <td><?= $data->head_title; ?></td>
                <td><?= $data->note; ?></td>
                <td><?= number_format($data->payment_amount,2) ?></td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>office_payment/edit/<?= $data->id; ?>" >
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="<?= base_url(); ?>office_payment/delete/<?= $data->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
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

<?php $this->load->view('admin/ajax/office_payment_ajax');?>
