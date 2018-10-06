<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">L/C Information Report List</h4>
          <div class="widget-toolbar">
            <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>

          </div>

        </div>

        <div class="widget-body">
          <div class="widget-main">

            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <div id="data_table">
              <div class="table-header" >
                L/C Information List
              </div>
            
            
              <table   class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SL No</th>
                    <th>L/C Number</th>
                    <th>Bank Name</th>
                    <th>Date</th>
                    <th>Note</th>
                  </tr>
                </thead>

                <tbody id="tBody">
                    <?php $i=1; if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $data->lc_no; ?></td>
                    <td><?= $data->bank_name; ?></td>
                    <td><?php 
                          $date = new DateTime($data->lc_date);
                          echo date_format($date, 'd M Y'); 
                        ?></td>
                    <td><?= $data->lc_note; ?></td>
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

