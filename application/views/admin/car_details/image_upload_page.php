
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Add New Car Images</h4>
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

                    <form id="car_images" action="<?= base_url();?>car/images/store" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="pus_sl">Purchase Id: </label>
                                    <div class="col-sm-7">
                                        <input type="hidden" id="pus_id" name="pus_id">
                                        <input type="text" id="pus_sl"  name="pus_sl" value="" readonly class="form-control" placeholder="Purchases No." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="customer_name">Customer Id: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="customer_name"  name="customer_name" value="" readonly class="form-control" placeholder="Customer Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="sup_name">Supplier Name: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="sup_name"  name="sup_name" value="" readonly class="form-control" placeholder="Supplier name" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="chassis_no"> Chassis No:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="chassis_no"  name="chassis_no" readonly class="form-control" placeholder="Chassis No" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="eng_no">Engine No: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="eng_no"  name="eng_no" readonly class="form-control" placeholder="Engine no" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="amount"> Car Images:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="file" id="id-input-file-2"  name="images[]" multiple class="form-control" accept="image/*" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="amount"> Car Documents:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="file" id="id-input-file-2"  name="documents[]" multiple class="form-control" accept="image/*" />
                                    </div>
                                </div>


                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="collection_save">Save</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Car Information List</h4>
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
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL.No</th>
                            <th>Purchase Id</th>
                            <th>Customer Name</th>
                            <th>Supplier Name</th>
                            <th>Chassis No || Engine No</th>
                            <th>Total Images</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php $i=1; if(isset($cars) && $cars ): foreach($cars as $data):?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td class="center"><?= $data->pus_sl ?></td>
                                <td class="center"><?= ucfirst($data->cus_name) ?></td>
                                <td class="center"><?= ucfirst($data->sup_name) ?></td>
                                <td><?= $data->puc_chassis_no."||".$data->puc_engine_no; ?></td>
                                <td><?php $total = $this->Car_model->get_car_image_by_purchase_id($data->id); echo count($total);?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green add_image"  id="<?= $data->id;?>" >
                                            <i class="ace-icon fa fa-plus-square bigger-130" ></i>
                                        </a>
                                        <a class="warning" href="<?= base_url();?>car/images/view/<?= $data->id;?>" >
                                            <i class="ace-icon fa fa-eye bigger-130"></i>
                                        </a>
                                        <a class="info " href="<?= base_url();?>car/images/edit/<?= $data->id;?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>car/images/delete/<?= $data->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.add_image').click(function() {
        var pus_id = $(this).attr('id');
        $('#pus_id').val('');
        $('#pus_sl').val('');
        $('#customer_name').val('');
        $('#sup_name').val('');
        $('#chassis_no').val('');
        $('#eng_no').val('');
        $.ajax({
            url:'<?= base_url();?>find/car/purchase_info/'+pus_id,
            type:'POST',
            dataType:'json',
            success:function (data){

                if(data != 0){
                    $('#pus_id').val(data.id);
                    $('#pus_sl').val(data.pus_sl);
                    $('#customer_name').val(data.cus_name);
                    $('#sup_name').val(data.sup_name);
                    $('#chassis_no').val(data.puc_chassis_no);
                    $('#eng_no').val(data.puc_engine_no);
                }else{
                    console.log(error);
                    swal({
                        text: "Data not Found. Something Wrong..!",
                        icon: "error",
                        buttons: true,
                        timer: 2500,
                    });
                }
            },error:function(error){
                console.log(error);
                swal({
                    text: "Some Error Found",
                    icon: "error",
                    buttons: true,
                    timer: 2500,
                });
            }
        });
    });
</script>
