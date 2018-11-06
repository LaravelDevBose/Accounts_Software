
<div class="row">
  <div class="col-md-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Purchase Car Information</h4>
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
                <label class="col-sm-5 control-label no-padding-left" for="car_pus_id">Chassis No.<span class="text-bold text-danger">*</span></label>
                <div class="col-sm-7">
                  <select class="chosen-select form-control" id="car_pus_id" style="height: 30px; border-radius: 5px;">
                    <option value=" ">Select a Chassis No</option>
                    <?php if(isset($purchases) && $purchases):  foreach($purchases as $pus):?>
                      <option value="<?= $pus->id; ?>"><?= $pus->puc_chassis_no; ?></option>
                    <?php endforeach; endif; ?>
                  </select>
                </div>
              </div>
              <form id="pus_info">
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="engine_no"> Engine No </label>
                <div class="col-sm-7">
                  <input type="text" id="engine_no" name="engine_no" placeholder="Engine No" class="form-control" readonly />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="car_model"> Model </label>
                <div class="col-sm-7">
                  <input type="text" id="car_model" readonly name="car_model" placeholder="Car Model" class="form-control" />
                </div>
              </div>
            
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="car_color"> Color </label>
                <div class="col-sm-7">
                  <input type="text" id="car_color" readonly name="car_color" placeholder="Car Color" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="car_year"> Year </label>
                <div class="col-sm-7">
                   <input type="text" id="car_year" readonly name="car_year" placeholder="Car Year" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="order_no"> Order No </label>
                <div class="col-sm-7">
                  <input type="text" id="order_no" name="order_no" placeholder="Order No" class="form-control" readonly />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="cus_name"> Customer Name </label>
                <div class="col-sm-7">
                  <input type="text" id="cus_name" name="cus_name" placeholder="Customer Name" class="form-control" readonly />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="cus_phone"> Customer Phone No </label>
                <div class="col-sm-7">
                  <input type="text" id="cus_phone" readonly name="cus_phone" placeholder="Contact No" class="form-control" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="sup_name"> Supplier Name </label>
                <div class="col-sm-7">
                  <input type="text" id="sup_name" readonly name="sup_name" placeholder="Supplier Name" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label no-padding-left" for="sup_phone"> Supplier Phone No </label>
                <div class="col-sm-7">
                  <input type="text" id="sup_phone" readonly name="sup_phone" placeholder="Contact No" class="form-control" />
                </div>
              </div>
            </div>
          </div>

            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <form id="OrderForm" method="post" action="<?= base_url(); ?>pricing/store"> 
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Car Estimating Price Information</h4>
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
                <input type="hidden" name="pus_id" id="pus_id">
              </div>
              <div class="col-sm-4">
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="lc_value"> L/C Value:</label>
                  <div class="col-sm-7">
                    <input type="number" id="lc_value"  name="lc_value" value="" oninput="amount_cal()" placeholder="L/C Value" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="obc_value"> OBC Value:</label>
                  <div class="col-sm-7">
                    <input type="number" id="obc_value" name="obc_value" value="" oninput="amount_cal()" placeholder="OBC Value" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="insurance_charge">Incurance Charge:</label>
                  <div class="col-sm-7">
                    <input type="number" id="insurance_charge"  name="insurance_charge" value="" oninput="amount_cal()" placeholder="Incurance Charge" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="final_dosis">Final Dosis:</label>
                  <div class="col-sm-7">
                    <input type="number" id="final_dosis"  name="final_dosis" value="" oninput="amount_cal()" placeholder="Final Dosis-1000" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="custom_value">Custom Duty: </label>
                  <div class="col-sm-7">
                    <input type="number" id="custom_value"  name="custom_value" value="" oninput="amount_cal()" placeholder="Custom Duty" class="form-control price" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cf_agent"> C&F Agent: </label>
                  <div class="col-sm-7">
                    <input type="number" id="cf_agent" name="cf_agent" value="" oninput="amount_cal()" placeholder="C&F Agent" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cuharf_value">Cuharf Rent: </label>
                  <div class="col-sm-7">
                    <input type="number" id="cuharf_value" name="cuharf_value" value="" oninput="amount_cal()" placeholder="Cuharf Rent" class="form-control price" />
                  </div>
                </div>

              </div>


              <div class="col-sm-4">
                

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="s_charge">S/Charge: </label>
                  <div class="col-sm-7">
                    <input type="number" id="s_charge" name="s_charge" value="" oninput="amount_cal()" placeholder="S/Charge" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left"  for="regi_charge">Registration: </label>
                  <div class="col-sm-7">
                    <input type="number" id="regi_charge" name="regi_charge" value="" oninput="amount_cal()" placeholder="Registration" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="first_party_insu">1st Party Insurance: </label>
                  <div class="col-sm-7">
                    <input type="number" id="first_party_insu" name="first_party_insu" value="" oninput="amount_cal()" placeholder="1st Party Insurance" class="form-control price" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="third_party_insu">3st Party Insurance: </label>
                  <div class="col-sm-7">
                    <input type="number" id="third_party_insu" name="third_party_insu" value="" oninput="amount_cal()" placeholder="3st Party Insurance" class="form-control price" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="workshop_bill">WorkShop Bill: </label>
                  <div class="col-sm-7">
                    <input type="number" id="workshop_bill" name="workshop_bill" value="" oninput="amount_cal()" placeholder="WorkShop Bill" class="form-control price" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="decuration_bill">Decuration Bill: </label>
                  <div class="col-sm-7">
                    <input type="number" id="decuration_bill" name="decuration_bill" value="" oninput="amount_cal()" placeholder="Decuration Bill" class="form-control price" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="other_exp">Other Expense: </label>
                  <div class="col-sm-7">
                    <input type="number" id="other_exp" name="other_exp" value="" oninput="amount_cal()" placeholder="Other Expense" class="form-control price" />
                  </div>
                </div>
                <div class="form-group" >
                  <div class="col-sm-12" style="margin-top: 30px;">
                    <button type="Submit" class="btn btn-primary pull-right" id="pus_submit" style="width: 50%;">Purchase</button>
                  </div>
                </div>
              </div>
              

              <div class="col-md-2">
                <input type="hidden" name="total_price" id="total_price">
                <p style="text-align: center; font-size: 17px; color: blue; ">Total Estimate Price: <span id="total_amount" style="font-size: 22px; font-weight: 800">00.00</span> TK</p>
              </div>
              
            </div>
          </div>
        </div>

      </div>
    </form> 
  </div>
</div>

<?php $this->load->view('admin/ajax/purchase_pricing_ajax');?>
