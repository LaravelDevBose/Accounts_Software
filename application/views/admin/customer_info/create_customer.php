
<div class="row">
  <div class="col-xs-12">
    <form id="CusOrderForm" method="post" action="<?= base_url('customer/store'); ?>">  

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
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
                  <label class="col-sm-5 control-label no-padding-left" for="cus_code"> Customer  Code:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_code" value="<?= $cus_code?>" name="cus_code" placeholder="Customer Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_name"> Customer Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_name" name="cus_name" required placeholder="Customer Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="cus_contact_no"> Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="cus_contact_no" name="cus_contact_no" required placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="alt_contact_no"> Alt. Contact No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <input type="text" id="alt_contact_no" name="alt_contact_no" placeholder="Alt. Contact No" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_entry_date"> Entry Date:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                     <input class="form-control date-picker" required id="cus_entry_date" name="cus_entry_date" type="text" value="<?php echo date('Y-m-d'); ?>" 
                      data-date-format="yyyy-mm-dd" />

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_email"> E-mail:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_email" name="cus_email" placeholder="E-mail" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_address"> Address:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="cus_address" required name="cus_address" placeholder="Address" class="form-control" ></textarea>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>



      <!--============Order Information============ -->
      <!--============Order Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Order Information</h4>
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
                  <label class="col-sm-4 control-label no-padding-left" for="ord_lc_no"> L / C No: <span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <select class="form-control"  id="ord_lc_no" name="ord_lc_no" style="height: 30px; border-radius: 5px;">
                      <option value="0">Please Select a L / C No</option>
                      <?php if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
                        <option value="<?= $data->id; ?>"><?= $data->lc_no; ?></option>
                      <?php endforeach; endif;?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_car_model"> Car Model: <span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_car_model" name="ord_car_model"  placeholder="Car Model" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_color"> Color: <span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_color" name="ord_color" placeholder="Color" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_engine_no"> Engine No: <span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_engine_no" name="ord_engine_no" placeholder="Engine No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_chassis_no"> Chassis No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_chassis_no" name="ord_chassis_no" placeholder="Chassis No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="order_no"> Order No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="order_no" name="order_no" placeholder="Order No" class="form-control" />
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_other_tirm"> Other Tirm:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <textarea id="ord_other_tirm" name="ord_other_tirm" placeholder="Other Tirm" class="form-control" ></textarea>
                  </div>
                </div>

              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_make"> Make:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_make" name="ord_make_model" placeholder="Make" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_grade"> 
                  Grade:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_grade" name="ord_grade" placeholder="Grade" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_type"> 
                  Type:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_type" name="ord_type" placeholder="Type" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_year"> 
                  Year:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_year" name="ord_year" placeholder="Year" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_mileage"> Mileage:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_mileage" name="ord_mileage" placeholder="Mileage" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> Budget Range:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_budget_range" name="ord_budget_range" placeholder="Budget Range" class="form-control" />
                  </div>
                </div>
                <div class="form-group"><div class="col-sm-12" style="height: 10px;"></div></div>

                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" class="btn btn-primary cus_submit">Submit</button>
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

