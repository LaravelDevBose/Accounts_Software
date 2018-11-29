
<div class="row">
    <div class="col-xs-12">

        <!--============Customer Information============ -->
        <!--============Customer Information============ -->
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Add New LC Information</h4>
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
                    <form id="lc_form">
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="lc_no">L/C No.:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="lc_no" name="lc_no"  placeholder="L/C Number" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="lc_date"> Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control date-picker"  id="lc_date" name="lc_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="lc_amount">L/C Amount:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="lc_amount"  name="lc_amount"  placeholder="L/C Amount" class="form-control"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="car_qty">Car QTY:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="car_qty"  name="car_qty"  placeholder="Car Quantity" class="form-control"  />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="bank_name">Bank Name:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="bank_name"  name="bank_name"  placeholder="Bank Name" class="form-control"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="branch_name">Branch Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="branch_name"  name="branch_name"  placeholder="Branch Name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="lc_insur">Insurance: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="lc_insur"  name="lc_insur"  placeholder="Insurance Id" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="comp_id" style="padding-right: 0px;"> Company Name:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <select name="comp_id" id="comp_id"  class="form-control chosen-select" style="height: 28px; border-radius: 5px;">
                                            <option value="0">Select A Company Name</option>
                                            <?php if(isset($companies) && $companies): foreach($companies as $company):?>
                                                <option value="<?= $company->id ?>"><?= $company->comp_name; ?></option>
                                            <?php  endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding: 0;">
                                        <a href="<?= base_url('company/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="supplier_id"> Supplier:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <select name="supplier_id" id="supplier_id"  class="form-control chosen-select" style="height: 28px; border-radius: 5px;">
                                            <option value="0">Select A Supplier Name</option>
                                            <?php if(isset($suppliers) && $suppliers): foreach($suppliers as $supplier):?>
                                                <option value="<?= $supplier->id ?>"><?= $supplier->sup_code.'-'.$supplier->sup_name; ?></option>
                                            <?php  endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding: 0;">
                                        <a href="<?= base_url('supplier/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="agent_id"> Agent Name:</label>
                                    <div class="col-sm-7">
                                        <select name="agent_id" id="agent_id" class="form-control chosen-select" style="height: 28px; border-radius: 5px;">
                                            <?php if(isset($agents) && $agents): foreach($agents as $agent):?>
                                                <option value="<?= $agent->id ?>"><?= $agent->agent_code.'-'.$agent->agent_name; ?></option>
                                            <?php  endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding: 0;">
                                        <a href="<?= base_url('agent/insert')?>" title="Add New Supplier" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ship_name">Ship Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ship_name"  name="ship_name" placeholder="Ship Name" class="form-control"  />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="arriv_date">Arrival Date:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control date-picker"  id="arriv_date" name="arriv_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="port_name">Port Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="port_name" name="port_name"   class="form-control" placeholder="Port name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="note">Note:</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="note" name="note" class="form-control" placeholder="Note.." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-body">
                <div class="widget-main">
                    <form id="lc_car_info">
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="pus_id"> Chassis No:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <select name="pus_id" id="pus_id" class="form-control chosen-select" style="height: 28px; border-radius: 5px;">
                                            <option value="0">Select A Chassis Number</option>
                                            <?php if(isset($purchases) && $purchases): foreach($purchases as $purchase):?>
                                                <option value="<?= $purchase->id ?>"><?= $purchase->puc_chassis_no; ?></option>
                                            <?php  endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="cus_info">Customer: </label>
                                    <div class="col-sm-8">
                                        <input type="hidden" id="customer_id"  name="customer_id" />
                                        <input type="text" id="cus_info"  name="cus_info" readonly required placeholder="Customer Name" class="form-control"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="engine_no">Engine No:</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" id="chassis_no"  name="chassis_no" />
                                        <input type="hidden" id="order_id"  name="order_id" />
                                        <input type="text" id="engine_no"  name="engine_no" readonly required placeholder="Engine No" class="form-control"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="car_model">Car Model:</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="car_model"  name="car_model" readonly placeholder="Car Model" class="form-control"  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="car_color">Color: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="car_color" readonly name="car_color" placeholder="Car Color" class="form-control"  />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="car_year">Year:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="car_year" id="car_year" class="form-control" readonly placeholder="Car Year" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="car_value">Car Value:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="car_value" name="car_value" required  class="form-control" placeholder="0.00" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="fright_value">Fright Value:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="fright_value" name="fright_value" required  class="form-control" placeholder="0.00" />
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="button" id="lc_car_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary cus_submit">Add</button>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-2">
                                <p style="text-align: center; font-size: 15px; font-weight: 600"> Available L/C Amount: <br>
                                    <strong id="avi_lc_amt" >00.0</strong></p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var cart_qty = 0;
    var cart_total = 0;
</script>
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">

            <div class="widget-body">
                <div class="widget-main">
                    <table  class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Client Name</th>
                            <th>Chassis N0.</th>
                            <th>Engine No</th>
                            <th>Car Model</th>
                            <th>Color</th>
                            <th>Year</th>
                            <th>Car Value</th>
                            <th>Freight  Value</th>
                            <th>Sub Total</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody id="tBody">

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                <div class="col-sm-8">
                                    <button type="button" id="lc_submit" style=" float: right; " class="btn btn-primary cus_submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/ajax/lc_ajax');?>
