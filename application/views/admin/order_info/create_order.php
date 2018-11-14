
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
                                <label class="col-sm-5 control-label no-padding-left" for="ord_car_model">Select Customer: <span class="text-bold text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="chosen-select form-control" id="cus_info" style="height: 30px; border-radius: 5px;">
                                        <option value=" ">Select a Customer</option>
                                        <?php if($customers && isset($customers)):  foreach($customers as $customer):?>
                                            <option value="<?= $customer->id; ?>"><?= $customer->cus_code.'-'.ucfirst($customer->cus_name); ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-left" for="cus_code"> Customer  Code </label>
                                <div class="col-sm-7">
                                    <input type="text" id="cus_code" name="cus_code" placeholder="Customer Code" class="form-control" readonly />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-left" for="cus_name"> Customer Name </label>
                                <div class="col-sm-7">
                                    <input type="text" id="cus_name" readonly name="cus_name" placeholder="Customer Name" class="form-control" />
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-left" for="cus_contact_no"> Contact No </label>
                                <div class="col-sm-8">
                                    <input type="text" id="cus_contact_no" readonly name="cus_contact_no" placeholder="Contact No" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-left" for="cus_email"> E-mail </label>
                                <div class="col-sm-8">
                                    <input type="text" id="cus_email" readonly name="cus_email" placeholder="E-mail" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-left" for="supaddress"> Address </label>
                                <div class="col-sm-8">
                                    <textarea id="cus_address" readonly name="cus_address" placeholder="Address" class="form-control" ></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--============Order Information============ -->
        <!--============Order Information============ -->
        <form id="OrderForm" method="post" action="<?= base_url(); ?>order/store">

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
                            <div class="col-sm-2">
                                <input type="hidden" name="cus_id">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="order_no"> Order No: <span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="order_no" name="order_no" value="<?= $order_no ;?>" readonly required placeholder="Order No" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_car_model"> Car Model:  </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_car_model"  name="ord_car_model" placeholder="Car Model" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_color"> Color: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_color" name="ord_color" placeholder="Color" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="pus_id"> Purchases No: </label>
                                    <div class="col-sm-8">
                                        <select class="chosen-select"  id="pus_id" name="pus_id" style="height: 30px; border-radius: 5px;">
                                            <option value="0">Please Select a Purchases No</option>
                                            <?php if($cars && isset($cars)): foreach($cars as $data):?>
                                                <option value="<?= $data->id; ?>"><?= $data->pus_sl.'-'.$data->puc_chassis_no; ?></option>
                                            <?php endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_chassis_no"> Chassis No: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_chassis_no" name="ord_chassis_no" readonly class="form-control" placeholder="Chassis No" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_engine_no"> Engine No: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_engine_no" readonly name="ord_engine_no" placeholder="Engine No" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_lc_no">L/C No: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_lc_no" readonly name="ord_lc_no" placeholder="L/C No" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_other_tirm"> Other Term: </label>
                                    <div class="col-sm-8">
                                        <textarea id="ord_other_tirm" name="ord_other_tirm" placeholder="Other Term" class="form-control" ></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_make"> Make: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_make" name="ord_make_model" placeholder="Make" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_grade">
                                        Grade: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_grade" name="ord_grade" placeholder="Grade" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_type">
                                        Type: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_type" name="ord_type" placeholder="Type" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_year">
                                        Year: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_year" name="ord_year" placeholder="Year" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_mileage"> Mileage: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_mileage" name="ord_mileage" placeholder="Mileage" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> Budget Range:</label>
                                    <div class="col-sm-8">
                                        <input type="number" id="ord_budget_range" name="ord_budget_range" placeholder="Budget Range" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_advance"> Advance:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="ord_advance" required name="ord_advance" placeholder="Order Advance" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group"><div class="col-sm-12" style="height: 10px;"></div></div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="Submit" id="order_submit" class="btn btn-primary">Submit</button>
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

<?php $this->load->view('admin/ajax/order_ajax');?>
<script>
    $('#pus_id').change(function(e){
        var pus_id = e.target.value;

        $('#ord_car_model').val('');
        $('#ord_color').val('');
        $('#ord_chassis_no').val('');
        $('#ord_engine_no').val('');
        $('#ord_lc_no').val('');
        $('#ord_other_tirm').val('');
        $('#ord_make').val('');
        $('#ord_grade').val('');
        $('#ord_type').val('');
        $('#ord_year').val('');
        $('#ord_mileage').val('');


        if(pus_id > 0 && pus_id !=''){
            $.ajax({
                url:'<?= base_url();?>find/car_info/'+pus_id,
                type:'POST',
                dataType:'Json',
                success:function(data){
                    if(data !=0){
                        $('#ord_car_model').val(data.puc_car_model);
                        $('#ord_color').val(data.puc_color);
                        $('#ord_chassis_no').val(data.puc_chassis_no);
                        $('#ord_engine_no').val(data.puc_engine_no);
                        $('#ord_lc_no').val(data.puc_lc_id);
                        $('#ord_other_tirm').val(data.puc_other_tirm);
                        $('#ord_make').val(data.puc_make);
                        $('#ord_grade').val(data.puc_grade);
                        $('#ord_type').val(data.puc_type);
                        $('#ord_year').val(data.puc_year);
                        $('#ord_mileage').val(data.puc_mileage);
                    }else{
                        swal({
                            text: "No Data Found",
                            icon: "info",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                },error:function(error){
                    console.log(error);
                }
            });
        }
    });
</script>
