
<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Total Due Report Information</h4>
        <div class="widget-toolbar">
          <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
        </div>
      </div>

      <div class="widget-body">
        <div class="widget-main">

          <div id="data_table">
            <div id="header" style="display: none;">
              <?php $this->load->view('admin/partials/print_header');?>
            </div>
            <div id="table-header" class="table-header">
              	Customer Total Due Report List
            </div>

            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                	<th>#</th>
                  <th>Customer Name</th>
                  <th>Phone NO.</th>
                  <th>Address</th>
                  <th>Total Order</th>
                  <th>Total Delivery</th>
                  <th>Total Receive</th>
                  <th>Total Payment</th>
                  <th>Summary</th>
                </tr>
              </thead>

              <tbody id="tBody">
                  <?php  
                    $i=1; $total_pay = 0; $total_rec= 0; $total_sub = 0; ;
                    if($reports && isset($reports)): foreach($reports as $report):
                      
                  ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $report['cus_name']; ?></td>
                  <td><?= $report['cus_phone']; ?></td>
                  <td><?= $report['cus_address']?> </td>
                  <td><?= $report['total_order'] ?></td>
                  <td><?= $report['total_deli'] ?></td>
                  <td><span class="pull-right"><?= number_format($report['total_rec'], 2); ?></span></td>
                  <td><span class="pull-right"><?= number_format($report['total_pay'], 2); ?></span></td>
                  
                  <td>
                    <?php if($report['sub_total'] > 0):?>
                    <span class="pull-right red"><?= number_format($report['sub_total']*(-1),2); ?></span>
                    <?php else: ?>
                    <span class="pull-right green"><?= number_format($report['sub_total']*(-1),2); ?></span>
                    <?php endif;?>
                  </td>
                </tr>
                <?php 
                  $total_rec +=$report['total_rec']; $total_pay +=$report['total_pay']; $total_sub +=$report['sub_total'];
                  endforeach; endif;
                ?>
                <tr>
                	<th colspan="6"><span class="pull-right" style="font-weight: bold;">Sub total: </span></th>
                  <th><span class="pull-right" style="font-weight: bold;"><?= number_format($total_rec,2);?></span></th>
                  <th><span class="pull-right" style="font-weight: bold;"><?= number_format($total_pay,2);?></span></th>
                	<th><span class="pull-right" style="font-weight: bold;"><?= number_format($total_sub,2);?></span></th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




