<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header"> 
        <h4 class="widget-title">Delivery Order Report List</h4>
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
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="col-sm-5 control-label no-padding-left" for="date_from"> Date From:<span class="text-bold text-danger">*</span> </label>
                          <div class="col-sm-7">
                             <input class="form-control date-picker" required id="date_from" name="date_from" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="col-sm-5 control-label no-padding-left" for="date_to"> Date To:<span class="text-bold text-danger">*</span> </label>
                          <div class="col-sm-7">
                             <input class="form-control date-picker" required id="date_to" name="date_to" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group" >
                          <div class="col-sm-8">
                            <button type="button" id="dilevery_search" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ">Search</button>
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
              Delivery Order Report List
            </div>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>L/C No</th>
                  <th>Model | Engine No</th>
                  <th>Chassis No</th>
                  <th>Order No</th>
                  <th>Budget Price</th>
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


<?php $this->load->view('admin/ajax/dilevery_order_ajax');?>