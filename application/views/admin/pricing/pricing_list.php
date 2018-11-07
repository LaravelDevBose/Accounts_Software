
<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Car Purchase Pricing Information List</h4>
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
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Chassis No</th>
                        <th>Engine No</th>
                        <th>Model</th>
                        <th>Total Price</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>

                    <tbody id="tBody">
                        <?php  $i=1; if(isset($prices) && $prices): foreach($prices as $price):?>
                      <tr>
                        <td>
                          <?php 
                            $date = new DateTime($price->created_at);
                            echo date_format($date, 'd M Y'); 
                          ?> 
                        </td>
                        <td><?= $price->cus_name ?></td>
                        
                        <td><?= $price->puc_chassis_no; ?></td>
                        <td><?= $price->puc_engine_no; ?></td>
                        <td><?= $price->puc_car_model; ?> </td>
                        <td><?= number_format($price->total_price,2); ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a style="color: #F89406;" title="View"  href="<?= base_url();?>pricing/view/<?= $price->id;?>" >
                                  <i class="ace-icon fa fa-eye bigger-130" ></i>
                                </a>

                                <a class="info" title="Edit" href="<?= base_url();?>pricing/edit/<?= $price->id;?>" >
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" title="Delete" href="<?= base_url(); ?>pricing/delete/<?= $price->id ?>/<?= $price->pus_id; ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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




