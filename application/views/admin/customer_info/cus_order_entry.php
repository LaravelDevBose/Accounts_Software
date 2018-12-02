
<div class="row">
    <div class="col-xs-12">
        <form id="CusOrderForm" method="post" action="<?= base_url('customer/order/store'); ?>" autocomplete="off" enctype="multipart/form-data">

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
                            <div class="col-sm-2">
                                <input type="hidden" name="redirect_url" value="<?= $_SERVER['HTTP_REFERER']?>">
                            </div>

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
                                    <label class="col-sm-5 control-label no-padding-left" for="org_name"> Organization Name:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="org_name" name="org_name" placeholder="Organization Name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cus_contact_no"> Contact No:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="number" id="cus_contact_no" name="cus_contact_no"  required placeholder="Contact No" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="alt_contact_no"> Alt. Contact No:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="alt_contact_no" name="alt_contact_no" placeholder="Alt. Contact No" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="cus_email"> E-mail:</label>
                                    <div class="col-sm-7">
                                        <input type="email" id="cus_email" name="cus_email" placeholder="E-mail" class="form-control" />
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
                                    <label class="col-sm-4 control-label no-padding-left" for="cus_address"> Address:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <textarea id="cus_address" required name="cus_address" placeholder="Address" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="cus_fb"> Facebook Id:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="cus_fb" readonly name="cus_fb" placeholder="Facebook Id Url" class="form-control" />
                                    </div>
                                    <div class="col-sm-1" style="padding: 0;">
                                        <a href="<?= base_url()?>get_fb_url" class="btn btn-xs btn-danger linka fancybox fancybox.ajax"  style="height: 25px; border: 0; width: 27px; margin-left: -10px;" ><i class="fa fa-pencil" aria-hidden="true" style="margin-top: 5px;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2"> Image:</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="cus_image"  id="id-input-file-2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="id-input-file-2">Business Card:</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="cus_bus_card" id="id-input-file-2" class="form-control">
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
                                    <label class="col-sm-4 control-label no-padding-left" for="order_no"> Order No:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="order_no" name="order_no" value="<?= $order_no; ?>" readonly required placeholder="Order No" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_car_model"> Car Model: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_car_model" name="ord_car_model" value="<?= (isset($purchase) && $purchase)? $purchase->puc_car_model :'' ?>" placeholder="Car Model" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_color"> Color: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_color" name="ord_color" placeholder="Color" value="<?= (isset($purchase) && $purchase)? $purchase->puc_color :'' ?>" class="form-control" />
                                    </div>
                                </div>
                                <?php if(isset($purchase) && $purchase):?>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="pus_id"> Purchases No: </label>
                                    <div class="col-sm-8">
                                        <select class="chosen-select"  id="pus_id" name="pus_id" style="height: 30px; border-radius: 5px;">
                                            <option value="0">Please Select a Purchases No</option>
                                            <?php if($cars && isset($cars)): foreach($cars as $data):?>
                                                <?php if($purchase->id == $data->id):?>
                                                <option selected value="<?= $data->id; ?>"><?= $data->pus_sl.'-'.$data->puc_chassis_no; ?></option>
                                            <?php endif; endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                                <?php else:?>
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
                                <?php endif; ?>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_chassis_no"> Chassis No: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_chassis_no" name="ord_chassis_no" value="<?= (isset($purchase) && $purchase)? $purchase->puc_chassis_no :'' ?>" readonly class="form-control" placeholder="Chassis No" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_engine_no"> Engine No: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_engine_no" readonly name="ord_engine_no" value="<?= (isset($purchase) && $purchase)? $purchase->puc_engine_no :'' ?>" placeholder="Engine No" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_lc_no">L/C No: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_lc_no" readonly name="ord_lc_no" value="<?= (isset($purchase) && $purchase)? $purchase->lc_no :'' ?>" placeholder="L/C No" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_other_tirm"> Other Term: </label>
                                    <div class="col-sm-8">
                                        <textarea id="ord_other_tirm" name="ord_other_tirm" value="<?= (isset($purchase) && $purchase)? $purchase->puc_other_tirm :'' ?>" placeholder="Other Term" class="form-control" ></textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_make"> Make: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_make" name="ord_make_model" value="<?= (isset($purchase) && $purchase)? $purchase->puc_make :'' ?>" placeholder="Make" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_grade">
                                        Grade: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_grade" name="ord_grade" value="<?= (isset($purchase) && $purchase)? $purchase->puc_grade :'' ?>" placeholder="Grade" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_type">
                                        Type: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_type" name="ord_type" value="<?= (isset($purchase) && $purchase)? $purchase->puc_type :'' ?>" placeholder="Type" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_year">
                                        Year:</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_year" name="ord_year" value="<?= (isset($purchase) && $purchase)? $purchase->puc_year :'' ?>" placeholder="Year" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_mileage"> Mileage: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="ord_mileage" name="ord_mileage" value="<?= (isset($purchase) && $purchase)? $purchase->puc_mileage :'' ?>" placeholder="Mileage" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> Budget Range:</label>
                                    <div class="col-sm-8">
                                        <input type="number" id="ord_budget_range"  name="ord_budget_range" placeholder="Budget Range" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_advance"> Advance:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="ord_advance"  name="ord_advance" placeholder="Order Advance" class="form-control" />
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

<script>
    $('#pus_id').change(function(e){
        var pus_id = e.target.value;

        $('#ord_car_model').val('');
        $('#ord_color').val('');
        $('#ord_chassis_no').val('');
        $('#ord_engine_no').val('');
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




    $('#input_fb').on('click',function() {
        alert('uuuu');
        $('#cus_fb').val($('#url_fb').val());
        modal.remove();
    })

</script>




