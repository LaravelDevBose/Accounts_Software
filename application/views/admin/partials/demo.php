
<div class="row">
  <div class="col-xs-12">

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
              <div class="col-xs-12">

                <div class="clearfix">
                  <div class="pull-right tableTools-container"></div>
                </div>
                <div class="table-header">
                  L/C Information List
                </div>

                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="center" style="display:none;">
              
            </th>
                        <th>SL No</th>
                        <th>Customer Name</th>
                        <th>L/C No</th>
                        <th>Car Model</th>
                        <th>Color</th>
                        <th>Engine No</th>
                        <th>Chassis No</th>
                        <th>Order No</th>
                        <th>Make</th>
                        <th>Grade</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>Mileage</th>
                        <th>Budget Range</th>
                        <th>Other Tirm</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody id="tBody">
                        <?php $i=1; if($orders && isset($orders)): foreach($orders as $order):?>
                      <tr>
                        <td class="center" style="display:none;">
              
            </td>
                        <td><?= $i++; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td><?= $order->cus_name; ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>lc/edit/<?= $order->id; ?>" >
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="<?= base_url(); ?>lc/delete/<?= $order->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
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


