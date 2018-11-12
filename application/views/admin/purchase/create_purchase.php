
<div class="row">
  <?php if(!isset($order)): ?>
    <div class="col-xs-3"></div>
  <?php endif; ?>
  <div class="col-xs-6">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Supplier Information</h4>
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

              <div class="col-sm-8">
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_info">Select Supplier <span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-7">
                    <select class="chosen-select form-control" id="sup_info" style="height: 30px; border-radius: 5px;">
                      <option value=" ">Select a Supplier</option>
                      <?php if($supplires && isset($supplires)):  foreach($supplires as $supplire):?>
                        <option value="<?= $supplire->id; ?>"><?= $supplire->sup_code.'-'.ucfirst($supplire->sup_name); ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_code"> Supplier Code </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_code" name="sup_code" placeholder="Supplier Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_name"> Supplier Name </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_name" readonly name="sup_name" placeholder="Supplier Name" class="form-control" />
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_phone"> Contact No </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_phone" readonly name="sup_phone" placeholder="Contact No" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_address"> Address </label>
                  <div class="col-sm-7">
                    <textarea id="sup_address" readonly name="sup_address" placeholder="Address" class="form-control" ></textarea>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>
  </div>
  <?php if(isset($order) && $order): ?>
  <div class="col-xs-6">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Customer Information</h4>
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
              <div class="col-sm-8">

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_info">Select Customer:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-7">
                    <select class="chosen-select form-control" id="cus_info" <?= (isset($order) && $order)?'disabled':''  ?> style="height: 30px; border-radius: 5px;">
                      <option value=" ">Select a Customer</option>
                      <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                        <option value="<?= $customer->id; ?>" <?php if(isset($order)&& $order): if($order->cus_id == $customer->id): echo 'selected '; endif; endif; ?>  ><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_code"> Customer  Code </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_code" name="cus_code" value="<?= (isset($order)&& $order)? $order->cus_code : '' ?>" placeholder="Customer Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_name"> Customer Name </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_name"  readonly name="cus_name" value="<?= (isset($order)&& $order)? $order->cus_name : '' ?>" placeholder="Customer Name" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_contact_no"> Contact No </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_contact_no" readonly name="cus_contact_no" value="<?= (isset($order)&& $order)? $order->cus_contact_no : '' ?>" placeholder="Contact No" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="supaddress"> Address </label>
                  <div class="col-sm-7">
                    <textarea id="cus_address" readonly name="cus_address" placeholder="Address" class="form-control" ><?= (isset($order)&& $order)? $order->cus_address : '' ?></textarea>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>
  </div>
  <?php endif; ?>
  <div class="col-xs-12">
    <form id="OrderForm" method="post" action="<?= base_url(); ?>purchase/store"> 
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Car Information</h4>
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
              <div class="col-sm-2">
                <input type="hidden" name="customer_id" value="<?= (isset($order)&& $order)? $order->cus_id : '' ?>">
                <input type="hidden" name="supplier_id">
                <input type="hidden" name="order_id" value="<?= (isset($order)&& $order)? $order->id : '' ?>">
              </div>

              <div class="col-sm-4">
                  <div class="form-group">
                      <label class="col-sm-4 control-label no-padding-left" for="pus_sl">Purchase Code: </label>
                      <div class="col-sm-8">
                          <input type="text" id="pus_sl" name="pus_sl" value="<?= $pus_sl ?>" placeholder="Purchase Code" class="form-control" readonly />
                      </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_car_model"> Car Model:</label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_car_model"  name="puc_car_model" value="<?= (isset($order)&& $order)? $order->ord_car_model : '' ?>" placeholder="Car Model" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_color"> Color: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_color" name="puc_color" value="<?= (isset($order)&& $order)? $order->ord_color : '' ?>" placeholder="Color" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_engine_no"> Engine No:</label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_engine_no"  name="puc_engine_no" value="<?= (isset($order)&& $order)? $order->ord_engine_no : '' ?>" placeholder="Engine No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_chassis_no"> Chassis No: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_chassis_no"  name="puc_chassis_no" value="<?= (isset($order)&& $order)? $order->ord_chassis_no : '' ?>" placeholder="Chassis No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_other_tirm"> Other Tirm: </label>
                  <div class="col-sm-8">
                    <textarea id="puc_other_tirm" name="puc_other_tirm"  placeholder="Other Tirm" class="form-control" ><?= (isset($order)&& $order)? $order->ord_other_tirm : '' ?></textarea>
                  </div>
                </div>

              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_make"> Make: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_make" name="puc_make" value="<?= (isset($order)&& $order)? $order->ord_make_model : '' ?>" placeholder="Make" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_grade"> 
                  Grade: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_grade" name="puc_grade" value="<?= (isset($order)&& $order)? $order->ord_grade : '' ?>" placeholder="Grade" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_type"> 
                  Type: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_type" name="puc_type" value="<?= (isset($order)&& $order)? $order->ord_type : '' ?>" placeholder="Type" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left"  for="puc_year"> 
                  Year: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_year" name="puc_year" value="<?= (isset($order)&& $order)? $order->ord_year : '' ?>" placeholder="Year" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_mileage"> Mileage: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_mileage" name="puc_mileage" value="<?= (isset($order)&& $order)? $order->ord_mileage : '' ?>" placeholder="Mileage" class="form-control" />
                  </div>
                </div>
                <div class="form-group" >
                  <div class="col-sm-12" style="margin-top: 10px;">
                    <button type="Submit" class="btn btn-primary pull-right" id="pus_submit" style="width: 50%;">Purchase</button>
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

<?php $this->load->view('admin/ajax/purchase_ajax');?>
