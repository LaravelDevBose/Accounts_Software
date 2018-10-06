
<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Customer Information List</h4>
          <div class="widget-toolbar">
            <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
          </div>
        </div>

        <div class="widget-body">
          <div class="widget-main">


            <div class="row">
              <div class="col-xs-12">

                <div class="clearfix">
                  <div class="pull-right tableTools-container"></div>
                </div>
                <div id="data_table">
                  <div class="table-header">
                    Customer Information List
                  </div>

                    <table  class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                         
                          <th>Customer Code</th>
                          <th>Customer Name</th>
                          <th>Contact No.</th>
                          <th>Email Address</th>
                          <th>Entry Date</th>
                          <th>Address</th>
                        </tr>
                      </thead>

                      <tbody id="tBody">
                          <?php  if($customers && isset($customers)): foreach($customers as $customer):?>
                        <tr>
                          <td><?= $customer->cus_code ?></td>
                          <td><?= $customer->cus_name ?></td>
                          <td><?= $customer->cus_contact_no.'<br>'.$customer->alt_contact_no ?></td>
                          <td><?= $customer->cus_email ?> </td>
                          <td>
                            <?php 
                              $date = new DateTime($customer->cus_entry_date);
                              echo date_format($date, 'd M Y'); 
                            ?>
                                
                          </td>
                          <td><?= $customer->cus_address; ?></td>
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
</div>




