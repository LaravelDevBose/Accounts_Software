
<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Car Transport Location Information List</h4>
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
                        <th>Chassis No</th>
                        <th>Engine No</th>
                        <th>Model | Color</th>
                        <th>Supplier Name</th>
                        <th>Customer Name</th>
                        <th>Current Location</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>

                    <tbody id="tBody">
                        <?php  $i=1; if($purchases && isset($purchases)): foreach($purchases as $purchase):?>
                      <tr>
                        
                        <td><?= $purchase->puc_chassis_no; ?></td>
                        <td><?= $purchase->puc_engine_no; ?></td>
                        <td><?= $purchase->puc_car_model.' | '.$purchase->puc_color?> </td>
                        <td><?= $purchase->sup_name ?></td>
                        <?php 
                          $cus_name = '';
                          if($purchase->customer_id != 0){
                            $cus_info = $this->Customer_model->customer_by_id($purchase->customer_id);
                            $cus_name = $cus_info->cus_name;
                          } 
                        ?>
                        <td><?= $cus_name ?></td>
                        <?php 
                          $curt_loc = 'Not Selected';

                            if($purchase->transport_id != 0 && !is_null($purchase->transport_id)){
                              $trans_info = $this->Transport_model->car_last_location($purchase->transport_id);
                             
                              $curt_loc = $trans_info->head_name;
                            }
                         ?>
                        <td><?= $curt_loc ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="info linka fancybox fancybox.ajax "  href="<?= base_url();?>trans/status/chnage/<?= $purchase->id;?>" >
                                  <i class="ace-icon fa fa-pencil bigger-130" ></i>
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




