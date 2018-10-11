
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Collection</h4>
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
            
            <form id="collection_entry" >
              <div class="row">
                <div class="col-sm-1">
                  
                </div>

                <div class="col-sm-4">
                  
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="cus_id">Customer Name:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control chosen-select " id="cus_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                        <option value=" ">Select a Customer</option>
                        <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                          <option value="<?= $customer->id; ?>"><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="order_no">Chassis No:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control chosen-select " id="order_no" required name="order_no" style="height: 30px; border-radius: 5px;">
                        <option value=" ">Select a Chassis No</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-left" for="lc_no">L/C No: </label>
                    <div class="col-sm-7">
                      <input type="hidden" name="lc_id" id="lc_id">
                      <input type="number" id="lc_no" required name="lc_no" readonly class="form-control" placeholder="L/C Number" /> 
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-8">
                       <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-8">
                       <input type="number" id="amount" required name="amount" class="form-control" placeholder="Enter The Amount" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="description">Description: </label>
                    <div class="col-sm-8">
                      <textarea id="description"  name="description" placeholder="Short Description" class="form-control" ></textarea>
                    </div>
                  </div>

                  <div class="form-group" style="margin-top: 10px;">
                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                    <div class="col-sm-8">
                      <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Submit</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="widget-box red" style="text-align: center;">
                    <div class="widget-body">
                      <div class="widget-main">
                        <h4 class="widget-title" id="due_amount">00.0</h4>
                        <P>Due Amount</P>
                      </div>
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
        <h4 class="widget-title">Collection Information List</h4>
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
                <th>Customer Name</th>
                <th>Chassis No</th>
                <th>L/C No</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody id="tBody">
                <?php  if($collections && isset($collections)): foreach($collections as $data):?>
              <tr>
                <td class="center"><?= ucfirst($data->cus_name) ?></td>
                <td><?= $data->ord_chassis_no; ?></td>
                <td><?= $data->lc_no; ?></td>
                <td>
                  <?php 
                    $date = new DateTime($data->date);
                    echo date_format($date, 'd M Y'); 
                  ?> 
                </td>
                <td><?= number_format($data->amount) ?></td>
                <td><?= $data->description; ?></td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>collection/edit/<?= $data->id; ?>" >
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="<?= base_url(); ?>collection/delete/<?= $data->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
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

<?php $this->load->view('admin/ajax/collection_ajax');?>
<script>
 
</script>
