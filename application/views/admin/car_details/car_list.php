<style>
    .search_row .col-sm-2{
        padding-left: 5px;
        padding-right: 0px;
    }
    .search_row .form-control {
        width: 100%;
        height: 30px;
        margin-bottom:0px;
    }
    .search_row .chosen-container>.chosen-single, [class*=chosen-container]>.chosen-single{
        height: 30px;
    }
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box widget-color-dark">
            <div class="widget-header">
                <h4 class="widget-title">Car Summary List</h4>
                <div class="pull-right">   
                <a href="<?= base_url()?>customer/order/insert" class="btn btn-sm btn-success">Customer entry & Order</a>
                <a href="<?= base_url()?>order/insert" class="btn btn-sm btn-info">Order Entry</a>
                <a href="<?= base_url()?>purchase/insert" class="btn btn-sm btn-warning">Purchase Entryr</a>
                </div>
                
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="widget-box ">
                        <div class="widget-body ">
                            <div class="widget-main alert-info">
                                <form id="car_search_form" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="search_row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" id="order_no" name="order_no" onblur="car_search($(this).val(), 'order_no')" placeholder="Order No" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" id="purchase_no" name="purchase_no" onblur="car_search($(this).val(), 'purchase_no')" placeholder="Purchase No" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" id="chassis_no" name="chassis_no" onblur="car_search($(this).val(), 'chassis_no')" placeholder="Chassis No" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" id="order_date" name="order_date" onchange="car_search($(this).val(), 'order_date')"  placeholder="Order date" class="form-control date-picker"   data-date-format="yyyy-mm-dd" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <select class="chosen-select"  id="location" name="location" onchange="car_search($(this).val(), 'location')" style="height: 30px; border-radius: 5px;">
                                                            <option value="">Select Location</option>
                                                            <?php if(isset($locations) && $locations): foreach($locations as $loc):?>
                                                            <option value="<?= $loc->id ?>"><?= ucwords($loc->head_name)?></option>
                                                            <?php endforeach; endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <select class="chosen-select"  id="status" name="status" onchange="car_search($(this).val(), 'status')" style="height: 30px; border-radius: 5px;">
                                                            <option value="">Select Car Status</option>
                                                            <option value="a">Active Order</option>
                                                            <option value="p">Pending Order</option>
                                                            <option value="c">Sold Out Order</option>
                                                            <option value="u">Stock Car</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Car Image</th>
                                    <th>Order No /<br> Purchase No</th>
                                    <th>Customer Name</th>
                                    <th>Chassis No</th>
                                    <th>Order Date /<br> Purchase Date</th>
                                    <th>Car Model /<br> <small>Car Color</small></th>
                                    <th>Car Year <br> <small>Mileage</small></th>
                                    <th>Budget Price / <br>Collention Amount</th>
                                    <th>Car Location</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody id="search_tbody">
                                <?php  $i=1; if(isset($cars) && $cars): foreach($cars as $car):?>

                                    <?php if(isset($car->o_id) && isset($car->p_id)):?>
                                    <tr>
                                        <td>
                                            <?php
                                            $cover_image = base_url(). 'libs/BackEnd/assets/images/car_no_image_small.jpg';
                                            $car_image = $this->Car_model->get_car_cover_image_by_purchase_id($car->p_id);
                                            if($car_image){
                                                $cover_image = base_url().$car_image->image_path;
                                                if(!@getimagesize($cover_image)){
                                                    $cover_image = base_url(). 'libs/BackEnd/assets/images/car_no_image_small.jpg';
                                                }
                                            }

                                            ?>
                                            <img class="editable img-responsive"  alt="Car Image"  src="<?= $cover_image; ?>" style="height: 60px; width: 80px;" />
                                        </td>
                                        <td><?= $car->order_no.'<br>'.$car->pus_sl ?></td>
                                        <td><?= $car->cus_name ?></td>
                                        <td><?= $car->ord_chassis_no ?></td>
                                        <td>
                                            <?php
                                                $ord_date = new DateTime($car->created_at); $order_date = date_format($ord_date, 'd M Y');
                                                $pus_date = new DateTime($car->pus_date); $purchase_date = date_format($pus_date, 'd M Y');
                                                echo $order_date.'<br>'.$purchase_date;
                                            ?>
                                        </td>
                                        <td><?= $car->ord_car_model.'<br>'.$car->ord_color ?></td>
                                        <td><?= $car->ord_year.'<br>'.$car->ord_mileage?></td>
                                        <td><?= number_format($car->ord_budget_range,2).'<br>'.number_format($this->Order_model->find_total_colection_amount($car->o_id)->amount,2)?></td>
                                        <td><?= ucwords($car->head_name)?></td>
                                        <td>
                                            <?php if($car->order_status == 'c'): ?>
                                                <span class="label " style="background: green;">Sold Out</span>
                                            <?php elseif($car->order_status == 'a'): ?>
                                                <span class="label " style="background: #36a2ec;">Active</span>
                                            <?php else: ?>
                                                <span class="label " style="background: #ec880a;">Pending</span>
                                            <?php endif;?>

                                            </td>
                                        <td>
                                            <a href="<?= base_url()?>order/details/profile/<?= $car->o_id ?>" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-info-circle bigger-130"></i> Details</a>
                                        </td>
                                    </tr>
                                <?php elseif(isset($car->o_id) && !isset($car->p_id) && 0== $car->pus_id ):?>
                                    <tr>
                                        <td>
                                            <img class="editable img-responsive"  alt="Car Image"  src="<?= base_url().'libs/BackEnd/assets/images/car_no_image_small.jpg'; ?>" style="height: 60px; width: 80px;" />
                                        </td>
                                        <td><?= $car->order_no.'<br> ----------' ?></td>
                                        <td><?= $car->cus_name ?></td>
                                        <td>----------</td>
                                        <td>
                                            <?php
                                            $ord_date = new DateTime($car->created_at); $order_date = date_format($ord_date, 'd M Y');
                                            echo $order_date.'<br> -----------';
                                            ?>
                                        </td>
                                        <td><?= $car->ord_car_model.'<br>'.$car->ord_color ?></td>
                                        <td><?= $car->ord_year.'<br>'.$car->ord_mileage?></td>

                                        <td> <?= number_format($car->ord_budget_range,2).'<br>'.number_format($this->Order_model->find_total_colection_amount($car->o_id)->amount,2) ?></td>
                                        <td>------------</td>
                                        <td>
                                            <?php if($car->order_status == 'c'): ?>
                                                <span class="label " style="background: green;">Sold Out</span>
                                            <?php elseif($car->order_status == 'a'): ?>
                                                <span class="label " style="background: #36a2ec;">Active</span>
                                            <?php else: ?>
                                                <span class="label " style="background: #ec880a;">Pending</span>
                                            <?php endif;?>

                                        </td>
                                        <td>
                                            <a href="<?= base_url()?>order/details/profile/<?= $car->o_id ?>" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-info-circle bigger-130"></i> Details</a>
                                        </td>
                                    </tr>
                                <?php elseif(!isset($car->o_id) && isset($car->p_id) && 0==$car->order_id):?>
                                    <tr>
                                        <td>
                                            <?php
                                            $cover_image = base_url(). 'libs/BackEnd/assets/images/car_no_image_small.jpg';
                                            $car_image = $this->Car_model->get_car_cover_image_by_purchase_id($car->p_id);
                                            if($car_image){
                                                $cover_image = base_url().$car_image->image_path;
                                                if(!@getimagesize($cover_image)){
                                                    $cover_image = base_url(). 'libs/BackEnd/assets/images/car_no_image_small.jpg';
                                                }
                                            }

                                            ?>
                                            <img class="editable img-responsive"  alt="Car Image"  src="<?= $cover_image; ?>" style="height: 60px; width: 80px;" />
                                        </td>
                                        <td><?= '------<br>'.$car->pus_sl ?></td>
                                        <td><?= '--------' ?></td>
                                        <td><?= $car->puc_chassis_no ?></td>
                                        <td>
                                            <?php
                                            $pus_date = new DateTime($car->created_at); $purchase_date = date_format($pus_date, 'd M Y');
                                            echo '--------<br>'.$purchase_date;
                                            ?>
                                        </td>
                                        <td><?= $car->puc_car_model.'<br>'.$car->puc_color ?></td>
                                        <td><?= $car->puc_year.'<br>'.$car->puc_mileage?></td>
                                        <td><?= '00.0<br>'.number_format($car->total_price,2)?></td>
                                        <td><?= ucwords($car->head_name)?></td>
                                        <td>
                                            <span class="label label-primary " style="background: #ec880a;">Stock</span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url()?>purchase/details/profile/<?= $car->p_id ?>" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-info-circle bigger-130"></i> Details</a>
                                        </td>
                                    </tr>
                                <?php endif; endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/ajax/car_profile_ajax');?>




