
<div class="row">
  <div class="col-xs-3"></div>
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
                        <option value="<?= $supplire->id; ?>" <?= ($purchase->supplier_id == $supplire->id)?'selected':'' ?> ><?= $supplire->sup_code.'-'.ucfirst($supplire->sup_name); ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_code"> Supplier Code </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_code" name="sup_code" value="<?= $supplier->sup_code; ?>" placeholder="Supplier Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_name"> Supplier Name </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_name" readonly name="sup_name" value="<?= $supplier->sup_name; ?>" placeholder="Supplier Name" class="form-control" />
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_phone"> Contact No </label>
                  <div class="col-sm-7">
                    <input type="text" id="sup_phone" readonly value="<?= $supplier->sup_phone; ?>" name="sup_phone" placeholder="Contact No" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="sup_address"> Address </label>
                  <div class="col-sm-7">
                    <textarea id="sup_address" readonly name="sup_address" placeholder="Address" class="form-control" ><?= $supplier->sup_address; ?></textarea>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-xs-12">
    <form id="OrderForm" method="post" action="<?= base_url(); ?>purchase/update/<?= $purchase->id ?>"> 
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
                <input type="hidden" name="supplier_id" value="<?= $supplier->id; ?>">
                <input type="hidden" name="order_id" value="<?= $purchase->order_id; ?>">
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_lc_id"> L / C No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <select class="chosen-select form-control"  id="puc_lc_id" name="puc_lc_id" style="height: 30px; border-radius: 5px;">
                      <option value="0">Please Select a L / C No</option>
                      <?php if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
                        <option value="<?= $data->id; ?>" <?php if(isset($purchase)&& $purchase): if($purchase->puc_lc_id == $data->id): echo 'selected'; endif; endif; ?> ><?= $data->lc_no; ?></option>
                      <?php endforeach; endif;?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_car_model"> Car Model:<span class="text-bold text-danger">*</span>  </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_car_model"  name="puc_car_model" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_car_model : '' ?>" placeholder="Car Model" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_color"> Color:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_color" name="puc_color" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_color : '' ?>" placeholder="Color" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_engine_no"> Engine No:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_engine_no"  name="puc_engine_no" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_engine_no : '' ?>" placeholder="Engine No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_chassis_no"> Chassis No:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_chassis_no"  name="puc_chassis_no" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_chassis_no : '' ?>" placeholder="Chassis No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_other_tirm"> Other Tirm: </label>
                  <div class="col-sm-8">
                    <textarea id="puc_other_tirm" name="puc_other_tirm"  placeholder="Other Tirm" class="form-control" ><?= (isset($purchase)&& $purchase)? $purchase->puc_other_tirm : '' ?></textarea>
                  </div>
                </div>

              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_make"> Make: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_make" name="puc_make" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_make : '' ?>" placeholder="Make" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_grade"> 
                  Grade: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_grade" name="puc_grade" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_grade : '' ?>" placeholder="Grade" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_type"> 
                  Type: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_type" name="puc_type" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_type : '' ?>" placeholder="Type" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left"  for="puc_year"> 
                  Year: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_year" name="puc_year" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_year : '' ?>" placeholder="Year" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="puc_mileage"> Mileage: </label>
                  <div class="col-sm-8">
                    <input type="text" id="puc_mileage" name="puc_mileage" value="<?= (isset($purchase)&& $purchase)? $purchase->puc_mileage : '' ?>" placeholder="Mileage" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Estimating Price Information</h4>
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
              <div class="col-sm-1">
              </div>
              <?php $prices = $this->Purchase_model->get_purchase_prices($purchase->id); if($prices): ?>
              <div class="col-sm-5">
                
                <?php $i=5; foreach ($prices as $price):  ?>
                <div class="form-group">
                  <div class="col-sm-7">
                    <select class="chosen-select form-control"  id="head_id<?= $i;?>" name="head_id[<?= $i;?>]" onchange="apr_priceing('<?= $i;?>')"  style="height: 30px; border-radius: 5px;">
                      <option value="0">Please Select a Expense Head</option>
                      <?php if($heads && isset($heads)): foreach($heads as $data):?>
                        <option value="<?= $data->id; ?>" <?= ($price->head_id == $data->id) ? 'selected':''?> ><?= $data->head_title; ?></option>
                      <?php endforeach; endif;?>
                    </select>
                  </div>

                  <div class="col-sm-5">
                    <input type="text" id="amount<?= $i;?>"  name="amount[<?= $i;?>]" placeholder="Amount" value="<?= $price->amount; ?>" class="form-control" />
                  </div>
                </div>
                <?php $i++; endforeach; ?>
              </div>
              <?php endif; ?>

              <div class="col-sm-5">
                <div class="form-group">
                  <div class="col-sm-7">
                    <select class="chosen-select form-control"  id="head_id1" name="head_id[1]" onchange="apr_priceing(1)" style="height: 30px; border-radius: 5px;">
                      <option value="0">Please Select a Expense Head</option>
                      <?php if($heads && isset($heads)): foreach($heads as $data):?>
                        <option value="<?= $data->id; ?>" ><?= $data->head_title; ?></option>
                      <?php endforeach; endif;?>
                    </select>
                  </div>

                  <div class="col-sm-5">
                    <input type="text" id="amount1"  name="amount[1]" placeholder="Amount" disabled class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-7">
                    <select class="chosen-select form-control"  id="head_id2" name="head_id[2]" onchange="apr_priceing(2)"  style="height: 30px; border-radius: 5px;">
                      <option value="0">Please Select a Expense Head</option>
                      <?php if($heads && isset($heads)): foreach($heads as $data):?>
                        <option value="<?= $data->id; ?>"><?= $data->head_title; ?></option>
                      <?php endforeach; endif;?>
                    </select>
                  </div>

                  <div class="col-sm-5">
                    <input type="text" id="amount2"  name="amount[2]" placeholder="Amount" disabled class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-7">
                    <select class="chosen-select form-control"  id="head_id3" name="head_id[3]" onchange="apr_priceing(3)"  style="height: 30px; border-radius: 5px;">
                      <option value="0">Please Select a Expense Head</option>
                      <?php if($heads && isset($heads)): foreach($heads as $data):?>
                        <option value="<?= $data->id; ?>"><?= $data->head_title; ?></option>
                      <?php endforeach; endif;?>
                    </select>
                  </div>

                  <div class="col-sm-5">
                    <input type="text" id="amount3"  name="amount[3]" placeholder="Amount" disabled class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-7">
                    <select class="chosen-select form-control"  id="head_id4" name="head_id[4]" onchange="apr_priceing(4)" style="height: 30px; border-radius: 5px;">
                      <option value="0">Please Select a Expense Head</option>
                      <?php if($heads && isset($heads)): foreach($heads as $data):?>
                        <option value="<?= $data->id; ?>"><?= $data->head_title; ?></option>
                      <?php endforeach; endif;?>
                    </select>
                  </div>

                  <div class="col-sm-5">
                    <input type="text" id="amount4"  name="amount[4]" placeholder="Amount" disabled class="form-control" />
                  </div>
                </div>
                <div class="form-group" >
                  <div class="col-sm-12" style="margin-top: 30px;">
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