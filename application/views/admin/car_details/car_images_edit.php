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
                            <div class="col-sm-2">
                                <input type="hidden" id="pus_id" name="pus_id" value="<?= $purchase->id; ?>">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="pus_sl">Purchase Id: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="pus_sl"  name="pus_sl" value="<?= $purchase->pus_sl ?>" readonly class="form-control" placeholder="Purchases No." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="customer_name">Customer Name: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="customer_name"  name="customer_name" value="<?= $purchase->cus_name ?>" readonly class="form-control" placeholder="Customer Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="sup_name">Supplier Name: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="sup_name"  name="sup_name" value="<?= $purchase->sup_name ?>" readonly class="form-control" placeholder="Supplier name" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="chassis_no"> Chassis No:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="chassis_no"  name="chassis_no" value="<?= $purchase->puc_chassis_no ?>" readonly class="form-control" placeholder="Chassis No" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="eng_no">Engine No: </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="eng_no"  name="eng_no" value="<?= $purchase->puc_engine_no ?>" readonly class="form-control" placeholder="Engine no" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="amount"> Car Images:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="file" id="id-input-file-2" required name="images[]" multiple class="form-control" accept="image/*" />
                                    </div>
                                </div>


                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" >Update</button>
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
        <div>
            <ul class="ace-thumbnails clearfix">

                <?php if(isset($images)&& $images): foreach($images as $image):?>
                    <li id="image_<?= $image->id; ?>">
                        <?php
                        $image_path = base_url().$image->image_path;
                        if(!file_exists($image_path) && !getimagesize($image_path) ){
                            $image_path =base_url().'libs/upload_pic/no.png';
                        }
                        ?>
                        <a href="<?= $image_path ?>" data-rel="colorbox">
                            <img width="150" height="150" alt="150x150" src="<?= $image_path ?>" />
                        </a>
                        <div class="tools tools-bottom">
                            <a class="image_delete" id="<?= $image->id;?>" >
                                <i class="ace-icon fa fa-times red"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>

<script>
    $('.image_delete').click(function(){
        var con = confirm('Are You Sure Went to Delete This! ');

        if(con){
            var id = $(this).attr('id');
            $.ajax({
                url:'<?= base_url();?>car/image/delete/'+id,
                type:'POST',
                dataType:'json',
                success:function(data){
                    if(data == 1){
                        $('#image_'+id).fadeOut();
                        swal({
                            text: "Image Delete Successfully",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }else{
                        swal({
                            text: "Image Not Delete Successfully",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                },error:function(error){
                    console.log(error);
                    swal({
                        text: "Some Thing Find Wrong..!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    });
                }

            });
        }
    })
</script>