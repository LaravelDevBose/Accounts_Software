<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header"> 
        <h4 class="widget-title">Car Wise Collection Report List</h4>
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
                          <label class="col-sm-5 control-label no-padding-left" for="cus_id">Chassis Number:<span class="text-bold text-danger">*</span></label>
                          <div class="col-sm-7">
                            <select class="chosen-select form-control" id="order_id" required  style="height: 30px; border-radius: 5px;">
                              <option value="0">Select a Chassis Number</option>
                              <?php if($orders && isset($orders)):  foreach($orders as $order):?>
                                <option value="<?= $order->id; ?>"><?= $order->ord_chassis_no; ?></option>
                              <?php endforeach; endif; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group" >
                          <div class="col-sm-8">
                            <button type="button" id="order_search" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ">Search</button>
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
            <div id="header" style="display: none;">
              <?php $this->load->view('admin/partials/print_header');?>
            </div>
            <div id="table-header" class="table-header">
              Car Wise Collection Report
            </div>
            <table  class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Chassis No</th>
                  <th>L/C No</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
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


<?php $this->load->view('admin/ajax/collection_ajax');?>
