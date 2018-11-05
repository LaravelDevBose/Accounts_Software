 
<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">L/C Information List</h4>
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
                        <th>L/C No</th>
                        <th>L/C Date</th>
                        <th>Bank Name</th>
                        <th>Company Name</th>
                        <th>Supplier Name</th>
                        <th>Car Qty</th>
                        <th>Amount</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>

                    <tbody id="tBody">
                        <?php  $i=1; if(isset($lc_data) && $lc_data): foreach($lc_data as $data):?>
                      <tr>
                        
                        <td><?= $data->lc_no ?></td>
                        <td>
                        	<?php 
			                    $date = new DateTime($data->lc_date);
			                    echo date_format($date, 'd M Y'); 
			                 ?>
                        </td>
                        <td><?= ucwords($data->bank_name); ?> </td>
                        <td><?= ucwords($data->comp_name); ?></td>
                        <td><?= ucwords($data->sup_name); ?></td>
                        <td><?= $data->car_qty; ?></td>
                        <td><?= number_format($data->lc_amount); ?></td>

                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                
                                <a style="color: #F89406;" title="View" href="<?= base_url();?>lc/view/<?= $data->id;?>" >
                                  <i class="ace-icon fa fa-eye bigger-130" ></i>
                                </a>

                                <a class="info" title="Edit" href="<?= base_url();?>lc/edit/<?= $data->id;?>" >
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" title="Delete" href="<?= base_url(); ?>lc/delete/<?= $data->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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




