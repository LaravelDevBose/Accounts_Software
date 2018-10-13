
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">L/C Wise Order Information</h4>
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
                            <label class="col-sm-4 control-label no-padding-left" for="ord_lc_no"> L / C No: <span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-8">
                              <select class="chosen-select form-control" required  id="ord_lc_no" name="ord_lc_no" style="height: 30px; border-radius: 5px;">
                                <option value="0">Please Select a L / C No</option>
                                <?php if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
                                  <option value="<?= $data->id; ?>"><?= $data->lc_no; ?></option>
                                <?php endforeach; endif;?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group" >
                            <div class="col-sm-8">
                              <button type="button" id="lc_search" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ">Search</button>
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
                L/C Wise Order Report
              </div>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>L/C No</th>
                    <th>Model | Engine No</th>
                    <th>Chassis No</th>
                    <th>Order No</th>
                    <th>Order Status</th>
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


<?php $this->load->view('admin/ajax/lc_wise_order_ajax') ?>








