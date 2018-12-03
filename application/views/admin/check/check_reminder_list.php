<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Cheque Information List</h4>
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
                <th>Cheque Date</th>
                <th>Cheque No</th>
                <th>Bank Name - Branch Name</th>
                <th>Customer Name</th>
                <th>Reminder Date</th>
                <th>Cheque Amount</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody id="tBody">
                <?php $i=1; if(isset($checks)&&$checks ): foreach($checks as $check):?>
              <tr>
                <td>
                  <?php 
                    $date = new DateTime($check->check_date);
                    echo date_format($date, 'd M Y'); 
                  ?>
                </td>
                <td><?= $check->check_no; ?></td>
                <td><?= $check->bank_name.'-'.$check->branch_name; ?></td>
                <td><?= $check->cus_name; ?></td>
                
                <td>
                  <?php 
                    $date = new DateTime($check->remid_date);
                    echo date_format($date, 'd M Y'); 
                  ?>
                </td>
                <td><?= number_format($check->check_amount,2); ?></td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                      <a class="linka fancybox fancybox.ajax" style="color: #F89406;"  href="<?= base_url();?>check/view/<?= $check->id;?>" >
                        <i class="ace-icon fa fa-eye bigger-130" ></i>
                      </a>
                      <a class="green" href="<?= base_url();?>check/edit/<?= $check->id; ?>" >
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                      </a>
                      <a class="red" href="<?= base_url(); ?>check/delete/<?= $check->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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
  