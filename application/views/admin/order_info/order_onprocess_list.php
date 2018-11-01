
<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Order Information List</h4>
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
              <div class="col-xs-12">
                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Customer Name</th>
                        <th>L/C No</th>
                        <th>Model | Engine No</th>
                        <th>Chassis No</th>
                        <th>Order No</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>

                    <tbody id="tBody">
                        <?php  $i=1; if($orders && isset($orders)): foreach($orders as $order):?>
                      <tr>
                        
                        <td><?= $order->cus_name ?></td>
                        <td>
                          <?php 
                            $lc_no = ''; if($order->ord_lc_no != 0 && $order->ord_lc_no !=  ''){
                              $lc_info = $this->LC_model->lc_data_by_id($order->ord_lc_no);
                              $lc_no = $lc_info->lc_no;
                            }
                          ?>
                          <?= $lc_no ?>
                            
                          </td>
                        <td><?= $order->ord_car_model.' | '.$order->ord_engine_no?> </td>
                        <td><?= $order->ord_chassis_no; ?></td>
                        <td><?= $order->order_no; ?></td>
                        <td>
                          <span class="label " style="background: #36a2ec;">Active</span>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green linka fancybox fancybox.ajax "  href="<?= base_url();?>order/delivery/show/<?= $order->id;?>" >
                                  <i class="ace-icon fa fa-truck bigger-130"></i>
                                </a>

                                <!-- <a style="color: #7e35de;" title="Purchase" href="<?= base_url();?>purchase/insert/<?= $order->id;?>" >
                                  <i class="ace-icon fa fa-cart-arrow-down bigger-130" ></i>
                                </a> -->
                                <a style="color: #F89406;" title="View" href="<?= base_url();?>order/view/<?= $order->id;?>" >
                                  <i class="ace-icon fa fa-eye bigger-130" ></i>
                                </a>

                                <a class="info" title="Edit" href="<?= base_url();?>order/edit/<?= $order->id;?>" >
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" title="Delete" href="<?= base_url(); ?>order/delete/<?= $order->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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
      </div>
  </div>
</div>




