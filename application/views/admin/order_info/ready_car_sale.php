<div class="row">
  <div class="col-xs-12">
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

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_id">Select Customer</label>
                  <div class="col-sm-7">
                    <select class="chosen-select form-control" id="cus_id" name="cus_id" style="height: 30px; border-radius: 5px;">
                      <option value=" ">Select a Customer</option>
                      <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                        <option value="<?= $customer->id; ?>"><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="order_id">Select Customer</label>
                  <div class="col-sm-7">
                    <select class="chosen-select form-control" id="order_id" name="order_id" style="height: 30px; border-radius: 5px;">
                      <option value=" ">Select a Customer</option>
                      <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                        <option value="<?= $customer->id; ?>"><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="ord_model">Car Model</label>
                  <div class="col-sm-7">
                    <input type="text" id="ord_model"  placeholder="Order Car Model" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="ord_color">Car Color</label>
                  <div class="col-sm-7">
                    <input type="text" id="ord_color" readonly placeholder="Order Car Color" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="ord_year">Car Year</label>
                  <div class="col-sm-7">
                    <input type="text" id="ord_year" readonly placeholder="Order Car Year" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="ord_mileage">Car Mileage</label>
                  <div class="col-sm-7">
                    <input type="text" id="ord_mileage" readonly placeholder="Order Car Mileage" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="pus_id">Select Customer</label>
                  <div class="col-sm-7">
                    <select class="chosen-select form-control" id="pus_id" name="pus_id" style="height: 30px; border-radius: 5px;">
                      <option value=" ">Select a Chassis No</option>
                      <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                        <option value="<?= $customer->id; ?>"><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="engine_no">Engine No</label>
                  <div class="col-sm-7">
                    <input type="text" id="engine_no"  placeholder="Car Engine No" class="form-control" readonly />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="pus_model">Car Model</label>
                  <div class="col-sm-7">
                    <input type="text" id="pus_model"  placeholder="Purchase Car Model" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="pus_color">Car Color</label>
                  <div class="col-sm-7">
                    <input type="text" id="pus_color" readonly placeholder="Purchase Car Color" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="pus_year">Car Year</label>
                  <div class="col-sm-7">
                    <input type="text" id="pus_year" readonly placeholder="Purchase Car Year" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="pus_mileage">Car Mileage</label>
                  <div class="col-sm-7">
                    <input type="text" id="pus_mileage" readonly placeholder="Purchase Car Mileage" class="form-control" />
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>