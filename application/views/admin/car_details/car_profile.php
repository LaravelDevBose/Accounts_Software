<style>
    .profile-info-name{
        width: 180px !important;
    }
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="">
            <div id="user-profile-2" class="user-profile">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-18">
                        <?php  if(isset($order) && $order){?>
                        <li class="active">
                            <a data-toggle="tab" href="#order">
                                <i class="green ace-icon fa fa-cart-plus bigger-120"></i>
                                Order
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#collection">
                                <i class="orange ace-icon fa fa-money bigger-120"></i>
                                Collection
                            </a>
                        </li>
                        <?php } if(isset($purchase) && $purchase){?>
                        <li class="<?= (isset($order) && $order)?'': 'active'?>">
                            <a data-toggle="tab" href="#purchase">
                                <i class="green ace-icon fa fa-cart-arrow-down bigger-120"></i>
                                Purchase
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#pictures">
                                <i class="pink ace-icon fa fa-picture-o bigger-120"></i>
                                Pictures
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#document">
                                <i class="blue ace-icon fa fa-file-o bigger-120"></i>
                                Document
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#lc_info">
                                <i class="blue ace-icon fa fa-list-ul bigger-120"></i>
                                L/C Details
                            </a>
                        </li>
                        <?php  if(isset($lc_info) && $lc_info){?>
                        <li>
                            <a data-toggle="tab" href="#lc_document">
                                <i class="blue ace-icon fa fa-file-text-o bigger-120"></i>
                                L/C Document
                            </a>
                        </li>
                        <?php }?>
                        <li>
                            <a data-toggle="tab" href="#shipping">
                                <i class="blue ace-icon fa fa-ship bigger-120"></i>
                                Shipping Info
                            </a>
                        </li>
                         <?php }?>
                    </ul>

                    <div class="tab-content no-border padding-24">
                        <?php if(isset($order) && $order){?>
                        <div id="order" class="tab-pane in active">
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <span class="profile-picture">
                                        <?php $image =base_url().'libs/BackEnd/assets/images/car_no_image_small.jpg';

                                            if(isset($cover_image) && $cover_image){
                                                $image = base_url().$cover_image->image_path;
                                                if(!@getimagesize($image)){

                                                    $image =base_url().'libs/BackEnd/assets/images/car_no_image_small.jpg';
                                                }
                                            }
                                        ?>

                                        <img class="editable img-responsive cover_image" alt="Car Image"  src="<?= $image ?>" style="max-height: 250px; width: 100%;" />
                                    </span>
                                    <div class="space space-4"></div>
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-sm-7">
                                    <div class="widget-box ">
                                        <div class="widget-header widget-header-small">
                                            <h4 class="widget-title smaller">
                                                Customer Details
                                            </h4>
                                            <a href="<?= base_url()?>customer/edit/<?= $order->cus_id; ?>" class="btn btn-info btn-xs" style="float: right;"><i class="fa fa-pencil-square-o bigger-110"></i></a>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Customer Name </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $order->cus_code.'-'.ucwords($order->cus_name) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Organization Name </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= ucwords($order->org_name)?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Contact Number </div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-phone light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?= $order->cus_contact_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Alt. Contact Number </div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-mobile-phone light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?= $order->alt_contact_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Email Address </div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-envelope light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?= $order->cus_email ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Address </div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?= $order->cus_address ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <div class="row">
                                <?php if($order->order_status == 'p'):?>
                                <div class="col-md-2">
                                    <a href="<?= base_url();?>purchase/insert/<?= $order->id;?>" class="btn btn-xs btn-block btn-success">
                                        <i class="ace-icon fa fa-cart-plus  bigger-110"></i>
                                        <span class="bigger-110">New Purchase Car</span>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url()?>ready/car/order/<?= $order->id ?>" class="btn btn-xs btn-block btn-success">
                                        <i class="ace-icon fa fa-cart-plus  bigger-110"></i>
                                        <span class="bigger-110">Exist Purchase Car</span>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="col-md-2">
                                    <a data-toggle="tab" href="#collection" class="btn btn-xs btn-block btn-primary">
                                        <i class="ace-icon fa fa-money  bigger-110"></i>
                                        <span class="bigger-110">Take Collection</span>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-xs btn-block btn-info">
                                        <i class="ace-icon fa fa-image  bigger-110"></i>
                                        <span class="bigger-110">Download Images</span>
                                    </a>
                                </div>
                                <?php if($order->order_status == 'a'):?>
                                <div class="col-md-2">
                                    <a href="<?= base_url();?>order/delivery/show/<?= $order->id;?>" class="btn btn-xs btn-block btn-warning linka fancybox fancybox.ajax">
                                        <i class="ace-icon fa fa-truck  bigger-110"></i>
                                        <span class="bigger-110">Order Deliver</span>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="space-4"></div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="widget-box ">
                                        <div class="widget-header widget-header-small">
                                            <h4 class="widget-title smaller">
                                                Order Details
                                            </h4>
                                            <a href="<?= base_url();?>order/edit/<?= $order->id; ?>" class="btn btn-info btn-xs" style="float: right;"><i class="fa fa-pencil-square-o bigger-110"></i></a>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Order No: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $order->order_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Car Model: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $order->ord_car_model ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Color:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->ord_color ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Chassis No:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->ord_chassis_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Engine No:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->ord_engine_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">L/C No:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->lc_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Type: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->ord_type ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="widget-box ">
                                        <div class="widget-header widget-header-small">
                                            <h4 class="widget-title smaller">
                                                Order Other Details
                                            </h4>
                                            <a href="<?= base_url();?>order/edit/<?= $order->id; ?>" class="btn btn-info btn-xs" style="float: right;"><i class="fa fa-pencil-square-o bigger-110"></i></a>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Make: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $order->ord_make_model ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Grade: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $order->ord_grade ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Year: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->ord_year ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Mileage: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->ord_mileage ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Budget Range: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= number_format($order->ord_budget_range, 2) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Advance: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= number_format($order->ord_advance, 2) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Other Term: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $order->ord_other_tirm ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div><!-- /#order -->
                        <?php } if(isset($purchase) && $purchase){?>
                        <div id="purchase" class="tab-pane <?= (isset($order) && $order)?'': 'in active'?> ">

                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <span class="profile-picture">
                                        <?php   $image =base_url().'libs/BackEnd/assets/images/car_no_image_small.jpg';

                                        if(isset($cover_image) && $cover_image){
                                            $image = base_url().$cover_image->image_path;
                                            if(!@getimagesize($image)){$image =base_url().'libs/BackEnd/assets/images/car_no_image_small.jpg';  }
                                        }
                                        ?>
                                        <img class="editable img-responsive avatar2 cover_image"  alt="Car Image"  src="<?= $image; ?>" style="max-height: 250px; width: 100%;" />
                                    </span>

                                    <div class="space space-4"></div>

                                </div><!-- /.col -->
    
                                <div class="col-xs-12 col-sm-7 ">
                                    <div class="widget-box ">
                                        <div class="widget-header widget-header-small">
                                            <h4 class="widget-title smaller">
                                                Supplier Details
                                            </h4>
                                            <a href="<?= base_url() ?>supplier/edit/<?= $purchase->supplier_id ?>" class="btn btn-info btn-xs" style="float: right;"><i class="fa fa-pencil-square-o bigger-110"></i></a>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Entry Date: </div>

                                                        <div class="profile-info-value">
                                                            <?php $date = new DateTime($purchase->sup_ent_date); $ent_date = date_format($date, 'd M Y'); ?>
                                                            <span class="editable" id="username"><?= $ent_date?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Supplier Name </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $purchase->sup_code.'-'.ucwords($purchase->sup_name)?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row" style="display: none;">
                                                        <div class="profile-info-name"> Organization Name </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username">alexdoe</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Contact No: </div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-phone light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?= $purchase->sup_phone; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Email Address: </div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-envelope light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?= $purchase->sup_email?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Address </div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                            <span class="editable" id="country"><?= $purchase->sup_address?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- /.col -->


                            </div><!-- /.row -->
                            <div class="row">
                                <?php if($purchase->order_id == '0'):?>
                                <div class="col-md-3">
                                    <a href="<?= base_url() ?>new_customer/order/<?= $purchase->id?>" class="btn btn-xs btn-block btn-success">
                                        <i class="ace-icon fa fa-cart-plus  bigger-110"></i>
                                        <span class="bigger-110"> New Customer's Order</span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url() ?>old_customer/order/<?= $purchase->id?>" class="btn btn-xs btn-block btn-success">
                                        <i class="ace-icon fa fa-cart-plus  bigger-110"></i>
                                        <span class="bigger-110"> Old Customer's Order</span>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url()?>ready/car/purchase/<?= $purchase->id?>" class="btn btn-xs btn-block btn-success">
                                        <i class="ace-icon fa fa-cart-plus  bigger-110"></i>
                                        <span class="bigger-110">Exist Order</span>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-xs btn-block btn-primary avatar2" >
                                        <i class="ace-icon fa fa-image  bigger-110"></i>
                                        <span class="bigger-110">Change Cover Image</span>
                                    </a>
                                </div>
                                <?php if(empty($price)): ?>
                                <div class="col-md-2">
                                    <a href="<?= base_url()?>pricing/purchase/<?= $purchase->id ?>" class="btn btn-xs btn-block btn-info">
                                        <i class="ace-icon fa fa-money  bigger-110"></i>
                                        <span class="bigger-110"> Add Pricing</span>
                                    </a>
                                </div>
                            <?php endif; ?>
                            </div>
                            <div class="space-4"></div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="widget-box ">
                                        <div class="widget-header widget-header-small">
                                            <h4 class="widget-title smaller">
                                                Purchase Details
                                            </h4>
                                            <a href="<?= base_url() ?>purchase/edit/<?= $purchase->id ?>" class="btn btn-info btn-xs" style="float: right;"><i class="fa fa-pencil-square-o bigger-110"></i></a>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Purchase No: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $purchase->pus_sl ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Car Model: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $purchase->puc_car_model ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Color:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->puc_color ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Chassis No:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->puc_chassis_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Engine No:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->puc_engine_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">L/C No:</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->lc_no ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Type: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->puc_type ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Make: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $purchase->puc_make ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Grade: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= $purchase->puc_grade ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Year: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->puc_year ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Mileage: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->puc_mileage ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Other Term: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= $purchase->puc_other_tirm ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Total Amount: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= number_format($purchase->total_price,2) ?></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="widget-box ">
                                        <div class="widget-header widget-header-small">
                                            <h4 class="widget-title smaller">
                                                Purchase Price Details
                                            </h4>
                                            <?php if(isset($price) && $price): ?>
                                            <a href="<?= base_url() ?>pricing/edit/<?= $price->id ?>" class="btn btn-info btn-xs" style="float: right;"><i class="fa fa-pencil-square-o bigger-110"></i></a>
                                            <?php endif;?>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">L/C Value: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= (isset($price->lc_value))? number_format($price->lc_value, 2) : '0.00'?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">OBC Value: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= (isset($price->obc_value))? number_format($price->obc_value, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Insurance Charge::</div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->insurance_charge))? number_format($price->insurance_charge, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Final Doc. Charge: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->final_dosis))? number_format($price->final_dosis, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Custom Duty: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->custom_value))? number_format($price->custom_value, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">C&F Agent: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->cf_agent))? number_format($price->cf_agent, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Cuharf Rent: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->cuharf_value))? number_format($price->cuharf_value, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">S/Charge:: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= (isset($price->s_charge))? number_format($price->s_charge, 2) : '0.00'?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Registration: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="username"><?= (isset($price->regi_charge))? number_format($price->regi_charge, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">1st Party Insurance: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->first_party_insu))? number_format($price->first_party_insu, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">3st Party Insurance: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->third_party_insu))? number_format($price->third_party_insu, 2) : '0.00' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">WorkShop Bill: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->workshop_bill))? number_format($price->workshop_bill, 2) : '0.00'?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Decoration Bill: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->decuration_bill))? number_format($price->decuration_bill, 2) : '0.00'?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Other Expense: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country"><?= (isset($price->other_exp))? number_format($price->other_exp, 2) : '0.00'?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Total Amount: </div>

                                                        <div class="profile-info-value">
                                                            <span class="editable" id="country">= <?= number_format($purchase->total_price,2) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div><!-- /#purchase -->
                        <?php  } if(isset($order) && $order){?>
                        <div id="collection" class="tab-pane">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title">Add New Collection</h4>
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

                                                <form id="collection_entry" >
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <style>
                                                                .chosen-container{
                                                                    width: 170px !important;
                                                                }
                                                            </style>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="coll_sl">Collection SL: </label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" id="coll_sl" required name="coll_sl" value="<?= $coll_sl; ?>" readonly class="form-control" placeholder="Collection SL." />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
                                                                <div class="col-sm-7">
                                                                    <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="cus_id">Customer Name:<span class="text-bold text-danger">*</span></label>
                                                                <div class="col-sm-7">
                                                                    <select class="form-control chosen-select "  required name="cus_id" style="height: 30px; border-radius: 5px;">
                                                                        <option value=" ">Select a Customer</option>
                                                                        <option selected  value="<?= $order->cus_id; ?>"><?= $order->cus_code.'-'.ucfirst($order->cus_name); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="order_no">Order No:<span class="text-bold text-danger">*</span></label>
                                                                <div class="col-sm-7">
                                                                    <select class="form-control chosen-select"  required name="order_no" style="height: 30px; border-radius: 5px;">
                                                                        <option value=" ">Select a Order No</option>
                                                                        <option selected  value="<?= $order->id; ?>"><?= $order->order_no; ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="lc_no">L/C No: </label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" id="lc_no" required name="lc_no" value="<?= $order->lc_no ?>" readonly class="form-control" placeholder="L/C Number" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">


                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="collection_type">Collection Type:<span class="text-bold text-danger">*</span></label>
                                                                <div class="col-sm-7">
                                                                    <select class="form-control chosen-select " id="collection_type" required name="collection_type" style="height: 30px; border-radius: 5px;">
                                                                        <option value="">Select a Collection Type</option>
                                                                        <option value="1">Advance</option>
                                                                        <option value="2">Part</option>
                                                                        <option value="3">Full Payment</option>
                                                                        <option value="4">Cheque</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="cheque_no"> Cheque No:</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" id="cheque_no" required name="cheque_no" readonly class="form-control" placeholder="Enter Cheque No" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="bank_name"> Bank Name: </label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" id="bank_name" required name="bank_name" readonly class="form-control" placeholder="Enter Bank Name" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                                                                <div class="col-sm-7">
                                                                    <input type="number" id="amount" required name="amount" class="form-control" placeholder="Enter The Amount" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label no-padding-left" for="description">Description: </label>
                                                                <div class="col-sm-7">
                                                                    <textarea id="description"  name="description" placeholder="Short Description" class="form-control" ></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="margin-top: 10px;">
                                                                <div class="col-sm-5 col-sm-offset-2">
                                                                    <button type="button" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="collection_save">Save</button>
                                                                </div>
                                                                <div class="col-sm-5" >
                                                                    <button type="button" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary" id="collection_save_print">Save & Print</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="widget-box red" style="text-align: center;">
                                                                <div class="widget-body">
                                                                    <div class="widget-main">
                                                                        <h4 class="widget-title" id="due_amount"><?= $due_amount; ?></h4>
                                                                        <P>Due Amount</P>
                                                                    </div>
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
                                            <h4 class="widget-title">Collection Information List</h4>
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
                                                        <th>SL. No</th>
                                                        <th>Date</th>
                                                        <th>Order No</th>
                                                        <th>Customer Name</th>
                                                        <th>Description</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody id="tBody">
                                                    <?php  if(isset($collections) && $collections): foreach($collections as $data):?>
                                                        <tr>
                                                            <td class="center"><?= $data->coll_sl ?></td>
                                                            <td>
                                                                <?php
                                                                $date = new DateTime($data->date);
                                                                echo date_format($date, 'd M Y');
                                                                ?>
                                                            </td>
                                                            <td class="center"><?= ucfirst($data->order_no) ?></td>
                                                            <td class="center"><?= ucfirst($data->cus_name) ?></td>
                                                            <td><?= $data->description; ?></td>
                                                            <td><?= number_format($data->amount) ?></td>
                                                            <td>
                                                                <div class="hidden-sm hidden-xs action-buttons">
                                                                    <a style="color: #F89406;" class="linka fancybox fancybox.ajax"  href="<?= base_url();?>collection/view/<?= $data->id;?>" >
                                                                        <i class="ace-icon fa fa-eye bigger-130" ></i>
                                                                    </a>
                                                                    <a class="green print_coll" id="<?= $data->id; ?>" >
                                                                        <i class="ace-icon fa fa-print bigger-130"></i>
                                                                    </a>
                                                                    <a class="green " href="<?= base_url();?>collection/edit/<?= $data->id; ?>" >
                                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                                    </a>
                                                                    <a class="red" href="<?= base_url(); ?>collection/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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
                        </div><!-- /#collection -->
                        <?php } if(isset($purchase) && $purchase){?>
                        <div id="pictures" class="tab-pane">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10" >
                                    <a href="#" class="btn btn-xs btn-block btn-info" id="upload_form">
                                        <i class="ace-icon fa fa-image  bigger-110"></i>
                                        <span class="bigger-110">Upload Images</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row" id="car_image_form" style="display: none;">
                                <div class="col-xs-12">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title">Add Car Images</h4>
                                            <div class="widget-toolbar">
                                                <a href="#" data-action="collapse">
                                                    <i class="ace-icon fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main">

                                                <form id="car_images" action="<?= base_url();?>car/images/store" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="hidden" id="pus_id" name="pus_id" value="<?= $purchase->id; ?>">
                                                            <input type="hidden" id="pus_id" name="location" value="profile">

                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label no-padding-left" for="amount"> Car Images:<span class="text-bold text-danger">*</span> </label>
                                                                <div class="col-sm-5">
                                                                    <input type="file" id="id-input-file-2"  name="images[]" multiple class="form-control" accept="image/*" />
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <button type="submit" style="height: 29px; padding-top: 0px; float: right; " class="btn btn-primary btn-block">Image Upload</button>
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
                            <div class="hr hr12 dotted"></div>
                            <?php if(isset($images) && $images){?>
                            <ul class="ace-thumbnails">
                                <?php foreach($images as $image):?>
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
                                <?php endforeach; ?>
                            </ul>

                            <?php } ?>
                        </div><!-- /#pictures -->
                        <div id="document" class="tab-pane">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10" >
                                    <a href="#" class="btn btn-xs btn-block btn-info" id="doc_upload_form">
                                        <i class="ace-icon fa fa-image  bigger-110"></i>
                                        <span class="bigger-110">Upload Document </span>
                                    </a>
                                </div>
                            </div>
                            <div class="row" id="car_doc_form" style="display: none;">
                                <div class="col-xs-12">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title">Add Car Documents</h4>
                                            <div class="widget-toolbar">
                                                <a href="#" data-action="collapse">
                                                    <i class="ace-icon fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main">

                                                <form id="car_images" action="<?= base_url();?>car/images/store" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="hidden" id="pus_id" name="pus_id" value="<?= $purchase->id; ?>">
                                                            <input type="hidden" id="pus_id" name="location" value="profile">

                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-left" for="id-input-file-2"> Car Documents:<span class="text-bold text-danger">*</span> </label>
                                                                <div class="col-sm-5">
                                                                    <input type="file" id="id-input-file-2"  name="documents[]" multiple class="form-control" accept="image/*" />
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <button type="submit" style="height: 29px; padding-top: 0px; float: right; " class="btn btn-primary btn-block">Image Upload</button>
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
                            <div class="hr hr12 dotted"></div>
                            <?php if(isset($documents) && $documents){?>
                                <ul class="ace-thumbnails">
                                    <?php foreach($documents as $doc):?>
                                        <li id="image_<?= $doc->id; ?>">
                                            <?php
                                            $image = base_url().$doc->image_path;
                                            if(!file_exists($image) && !getimagesize($image) ){
                                                $image =base_url().'libs/upload_pic/no.png';
                                            }
                                            ?>
                                            <a href="<?= $image ?>" data-rel="colorbox">
                                                <img width="150" height="150" alt="150x150" src="<?= $image ?>" />
                                            </a>
                                            <div class="tools tools-bottom">
                                                <a class="image_delete" id="<?= $doc->id;?>" >
                                                    <i class="ace-icon fa fa-times red"></i>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php } ?>
                        </div><!-- /#document -->

                        <div id="lc_info" class="tab-pane">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10" >
                                    <a href="<?= base_url()?>lc/list" class="btn btn-xs btn-block btn-info" >
                                        <i class="ace-icon fa fa-image  bigger-110"></i>
                                        <span class="bigger-110">Add L/C</span>
                                    </a>
                                </div>
                            </div>

                            <div class="hr hr12 dotted"></div>
                            <?php  if(isset($lc_info) && $lc_info){?>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 ">
                                        <div class="widget-box ">
                                            <div class="widget-header widget-header-small">
                                                <h4 class="widget-title smaller">
                                                    L/C Details Information
                                                </h4>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main row">
                                                    <div class="col-md-6">
                                                        <div class="profile-user-info profile-user-info-striped">
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name">L/C No: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="username"><?= $lc_info->lc_no?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name">Date: </div>

                                                                <div class="profile-info-value">
                                                                    <?php $date = new DateTime($lc_info->lc_date); $ent_date = date_format($date, 'd M Y'); ?>
                                                                    <span class="editable" id="username"><?= $ent_date?></span>
                                                                </div>
                                                            </div>


                                                            <div class="profile-info-row" style="">
                                                                <div class="profile-info-name"> L/C Amount: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="username"><?= number_format($lc_info->lc_amount, 2)?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Car Quantity: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="country"><?= $lc_info->car_qty; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name">Bank Name: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="country"><?= ucwords($lc_info->bank_name) ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Branch Name: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="country"><?= ucwords($lc_info->branch_name) ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Insurance: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="country"><?= $lc_info->lc_insur ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="profile-user-info profile-user-info-striped">
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name">Company Name: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="username"><?= ucwords($lc_info->comp_name)?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Supplier Name </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="username"><?= $lc_info->sup_code.'-'.ucwords($lc_info->sup_name)?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row" style="">
                                                                <div class="profile-info-name"> Agent Name </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="username"><?= $lc_info->agent_code.'-'.ucwords($lc_info->agent_name)?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Ship Name: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="country"><?= ucwords($lc_info->ship_name); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name">Arrival Date: </div>

                                                                <div class="profile-info-value">
                                                                    <?php $date = new DateTime($lc_info->arriv_date); $arriv_date = date_format($date, 'd M Y'); ?>
                                                                    <span class="editable" id="country"><?= $arriv_date ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Port Name: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="country"><?= $lc_info->port_name?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Note: </div>

                                                                <div class="profile-info-value">
                                                                    <span class="editable" id="country"><?= $lc_info->note?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div><!-- /.col -->
                                    <div class="col-xs-12 col-sm-12 ">
                                        <div class="widget-box ">
                                            <div class="widget-header widget-header-small">
                                                <h4 class="widget-title smaller">
                                                    L/C Details Information
                                                </h4>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <table  class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Purchase No. <br> Order No</th>
                                                            <th>Client Name</th>
                                                            <th>Chassis No.</th>
                                                            <th>Engine No</th>
                                                            <th>Car Model</th>
                                                            <th>Color</th>
                                                            <th>Year</th>
                                                            <th>Car Value</th>
                                                            <th>Freight Value</th>
                                                            <th>Sub Total</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody id="tBody">
                                                            <?php if(isset($lc_details) && $lc_details): foreach ($lc_details as $details):?>
                                                            <tr>
                                                                <td><?= $details->pus_sl.'<br>'.$details->order_no?></td>
                                                                <td><?= ucwords($details->cus_name) ?></td>
                                                                <td><?= $details->puc_chassis_no ?></td>
                                                                <td><?= $details->puc_engine_no ?></td>
                                                                <td><?= $details->puc_car_model ?></td>
                                                                <td><?= $details->puc_color ?></td>
                                                                <td><?= $details->puc_year ?></td>
                                                                <td><?= number_format($details->car_value,2) ?></td>
                                                                <td><?= number_format($details->fright_value,2) ?></td>
                                                                <td><?= number_format($details->total, 2) ?></td>
                                                            </tr>

                                                            <?php endforeach; endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            <?php }?>
                        </div><!-- /#lc_info -->
                        <?php  if(isset($lc_info) && $lc_info){?>
                        <div id="lc_document" class="tab-pane">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10" >
                                    <a href="#" class="btn btn-xs btn-block btn-info" id="lc_doc">
                                        <i class="ace-icon fa fa-image  bigger-110"></i>
                                        <span class="bigger-110">Upload Document </span>
                                    </a>
                                </div>
                            </div>
                            <div class="row" id="lc_doc_form" style="display: none;">
                                <div class="col-xs-12">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title">Add Car Documents</h4>
                                            <div class="widget-toolbar">
                                                <a href="#" data-action="collapse">
                                                    <i class="ace-icon fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <form action="<?= base_url();?>car/lc_document" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="hidden" id="pus_id" name="pus_id" value="<?= $purchase->id; ?>">
                                                            <input type="hidden" id="lc_id" name="lc_id" value="<?= $lc_info->id; ?>">
                                                            <input type="hidden" id="location" name="location" value="profile">

                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-left" for="id-input-file-2"> Car L/C Documents:<span class="text-bold text-danger">*</span> </label>
                                                                <div class="col-sm-5">
                                                                    <input type="file" id="id-input-file-2"  name="document[]" multiple class="form-control" accept="image/*" />
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <button type="submit" style="height: 29px; padding-top: 0px; float: right; " class="btn btn-primary btn-block">Upload</button>
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
                            <div class="hr hr12 dotted"></div>
                            <?php if(isset($lc_documents) && $lc_documents){?>
                                <ul class="ace-thumbnails">
                                    <?php foreach($lc_documents as $doc):?>
                                        <li id="image_<?= $doc->id; ?>">
                                            <?php
                                            $image = base_url().$doc->image_path;
                                            if(!file_exists($image) && !getimagesize($image) ){
                                                $image =base_url().'libs/upload_pic/no.png';
                                            }
                                            ?>
                                            <a href="<?= $image ?>" data-rel="colorbox">
                                                <img width="150" height="150" alt="150x150" src="<?= $image ?>" />
                                            </a>
                                            <div class="tools tools-bottom">
                                                <a class="image_delete" id="<?= $doc->id;?>" >
                                                    <i class="ace-icon fa fa-times red"></i>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php } ?>
                        </div><!-- /#lc_document -->
                        <?php }?>
                        <div id="shipping" class="tab-pane">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10" >
                                    <a href="<?= base_url();?>trans/status/chnage/<?= $purchase->id;?>" class="btn btn-xs btn-block btn-info linka fancybox fancybox.ajax">
                                        <i class="ace-icon fa fa-image  bigger-110"></i>
                                        <span class="bigger-110">Set Current Location </span>
                                    </a>
                                </div>
                            </div>
                            <div class="row" id="car_doc_form" style="display: none;">
                                <div class="col-xs-12">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title">Add Car Documents</h4>
                                            <div class="widget-toolbar">
                                                <a href="#" data-action="collapse">
                                                    <i class="ace-icon fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main">

                                                <form id="car_images" action="<?= base_url();?>car/images/store" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <input type="hidden" id="pus_id" name="pus_id" value="<?= $purchase->id; ?>">
                                                            <input type="hidden" id="pus_id" name="location" value="profile">

                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-left" for="id-input-file-2"> Car Documents:<span class="text-bold text-danger">*</span> </label>
                                                                <div class="col-sm-5">
                                                                    <input type="file" id="id-input-file-2"  name="documents[]" multiple class="form-control" accept="image/*" />
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <button type="submit" style="height: 29px; padding-top: 0px; float: right; " class="btn btn-primary btn-block">Image Upload</button>
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
                            <div class="hr hr12 dotted"></div>
                            <div class="col-xs-12 col-sm-12 ">
                                <div class="widget-box ">
                                    <div class="widget-header widget-header-small">
                                        <h4 class="widget-title smaller">
                                            Car shipping Location
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <table  class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Location</th>
                                                </tr>
                                                </thead>

                                                <tbody id="tBody">
                                                <?php $i = 1;  if(isset($shipping) && $shipping): foreach ($shipping as $data):?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <?php $date = new DateTime($data->trans_date); $arriv_date = date_format($date, 'd M Y'); ?>
                                                        <td><?= $arriv_date ?></td>
                                                        <td><?= $data->head_name ?></td>
                                                    </tr>

                                                <?php endforeach; endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /#shipping -->
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->

<?php $this->load->view('admin/ajax/collection_ajax');?>
<?php $this->load->view('admin/ajax/car_profile_ajax');?>

<script>
    $('.avatar2').on('click', function(){
        var modal =
            '<div class="modal fade">\
              <div class="modal-dialog">\
               <div class="modal-content">\
                <div class="modal-header">\
                    <button type="button" class="close" data-dismiss="modal">&times;</button>\
                    <h4 class="blue">Change Car Cover Image</h4>\
                </div>\
                \
                <form class="no-margin" action="<?= base_url();?>cover/images/store" method="POST" enctype="multipart/form-data" >\
                     <div class="modal-body">\
                        <div class="space-4"></div>\
                        <input type="hidden" id="pus_id" name="pus_id" value="<?= $purchase->id; ?>">\
                        <div style="width:75%;margin-left:12%;"><input type="file" name="cover_image" /></div>\
                     </div>\
                    \
                     <div class="modal-footer center">\
                        <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
                        <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                     </div>\
                    </form>\
                  </div>\
                 </div>\
                </div>';


        var modal = $(modal);
        modal.modal("show").on("hidden", function(){
            modal.remove();
        });

        var working = false;

        var form = modal.find('form:eq(0)');
        var file = form.find('input[type=file]').eq(0);
        file.ace_file_input({
            style:'well',
            btn_choose:'Click to choose new avatar',
            btn_change:null,
            no_icon:'ace-icon fa fa-picture-o',
            thumbnail:'small',
            before_remove: function() {
                //don't remove/reset files while being uploaded
                return !working;
            },
            allowExt: ['jpg', 'jpeg', 'png', 'gif'],
            allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
        });

        form.on('submit', function(){
            if(!file.data('ace_input_files')) return false;

            // file.ace_file_input('disable');
            form.find('button').attr('disabled', 'disabled');
            form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");

            var thumb = file.next().find('img').data('thumb');
            if(thumb) $('.cover_image').get(0).src = thumb;

            return true;
        });

    });
</script>
