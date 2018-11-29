<?php  $i=1; if(isset($cars) && $cars): foreach($cars as $car):?>

    <?php if(isset($car->o_id) && isset($car->p_id)):?>
        <tr>
            <td>
                <?php
                $cover_image = base_url(). 'libs/backEnd/assets/images/car_no_image_small.jpg';
                $car_image = $this->Car_model->get_car_cover_image_by_purchase_id($car->p_id);
                if($car_image){
                    $cover_image = base_url().$car_image->image_path;
                    if(!@getimagesize($cover_image)){
                        $cover_image = base_url(). 'libs/backEnd/assets/images/car_no_image_small.jpg';
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
            <td><?= number_format($car->ord_budget_range,2).'<br>'.number_format($car->total_price,2)?></td>
            <td><?= ucwords($car->head_name)?></td>
            <td>
                <?php if($car->order_status == 'c'): ?>
                    <span class="label " style="background: green;">Delivered</span>
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
                <img class="editable img-responsive"  alt="Car Image"  src="<?= base_url().'libs/backEnd/assets/images/car_no_image_small.jpg'; ?>" style="height: 60px; width: 80px;" />
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
            <td><?= number_format($car->ord_budget_range,2).'<br> -----------'?></td>
            <td>-----------</td>
            <td>
                <?php if($car->order_status == 'c'): ?>
                    <span class="label " style="background: green;">Delivered</span>
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
                $cover_image = base_url(). 'libs/backEnd/assets/images/car_no_image_small.jpg';
                $car_image = $this->Car_model->get_car_cover_image_by_purchase_id($car->p_id);
                if($car_image){
                    $cover_image = base_url().$car_image->image_path;
                    if(!@getimagesize($cover_image)){
                        $cover_image = base_url(). 'libs/backEnd/assets/images/car_no_image_small.jpg';
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
                $pus_date = new DateTime($car->pus_date); $purchase_date = date_format($pus_date, 'd M Y');
                echo '--------<br>'.$purchase_date;
                ?>
            </td>
            <td><?= $car->puc_car_model.'<br>'.$car->puc_color ?></td>
            <td><?= $car->puc_year.'<br>'.$car->puc_mileage?></td>
            <td><?= '00.0<br>'.number_format($car->total_price,2)?></td>
            <td><?= ucwords($car->head_name)?></td>
            <td>
                <span class="label " style="background: #ec880a;">Order Not define</span>
            </td>
            <td>
                <a href="<?= base_url()?>purchase/details/profile/<?= $car->p_id ?>" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-info-circle bigger-130"></i> Details</a>
            </td>
        </tr>
    <?php endif; endforeach; endif; ?>