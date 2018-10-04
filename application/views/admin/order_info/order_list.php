
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

                <div class="clearfix">
                  <div class="pull-right tableTools-container"></div>
                </div>
                <div class="table-header">
                  Order Information List
                </div>

                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                       
                        <th>SL No</th>
                        <th>Customer Name</th>
                        <th>L/C No</th>
                        <th>Model | Engine No</th>
                        <th>Chassis No</th>
                        <th>Order No</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>

                    <tbody id="tBody">
                        <?php $i=1; if($orders && isset($orders)): foreach($orders as $order):?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $order->cus_name ?></td>
                        <td><?= $order->lc_no ?></td>
                        <td><?= $order->ord_car_model.' | '.$order->ord_engine_no?> </td>
                        <td><?= $order->ord_chassis_no; ?></td>
                        <td><?= $order->order_no; ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green " href="<?= base_url();?>order/edit/<?= $order->id;?>" >
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="<?= base_url(); ?>order/delete/<?= $order->id ?>" onclick="confirm('Are You Sure Went to Delete This! ')">
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



