<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <div class="space-6"></div>

    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="widget-box transparent">
          
          <div class="widget-body">
            <div class="widget-main padding-24">
              <div class="row">
                <div class="col-sm-6" style="width: 50%; float: left;">
                  <div >
                    <label for="" class="lable label-lg " style="background-color: #4584e2; width: 100%; text-align: center; font-weight: 600; color: #fff; padding: 3px; border: 1px solid #ddd;">Customer Information</label>
                  </div>
                  

                  <div class="profile-user-info profile-user-info-striped" style="width: 100%;">
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Name:</div>

                        <div class="profile-info-value">
                            <span class="editable" id="username"><?= $customer->cus_name; ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name">Customer Id:</div>

                        <div class="profile-info-value">
                            <span class="editable" id="city"><?= $customer->cus_code; ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Contact No: </div>

                        <div class="profile-info-value">
                            <span class="editable" id="age"><?= $customer->cus_contact_no; ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Alt. Contact No: </div>

                        <div class="profile-info-value">
                            <span class="editable" id="signup"><?= $customer->alt_contact_no; ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> E-mail: </div>

                        <div class="profile-info-value">
                            <span class="editable" id="login"><?= $customer->cus_email; ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Address: </div>

                        <div class="profile-info-value">
                            <span class="editable" id="about"><?= $customer->cus_address; ?></span>
                        </div>
                    </div>
                  </div>
                </div><!-- /.col -->

                <div class="col-sm-6" style="width: 50%; float: left;">
                  <div>
                    <label for="" class="lable label-lg " style="background-color: #00bedc; width: 100%; text-align: center; font-weight: 600; color: #fff; padding: 3px; border: 1px solid #ddd;">Car Information</label>
                  </div>

                  <div class="profile-user-info profile-user-info-striped" style="width: 100%;">
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Order No: </div>

                        <div class="profile-info-value">
                            <span class="editable" id="username"><?= $order->order_no; ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> L/C No: </div>

                        <div class="profile-info-value">
                            <?php 
                              $lc_no = ''; $bank_name = ''; if($order->ord_lc_no != 0 && $order->ord_lc_no !=  ''){
                                $lc_info = $this->LC_model->lc_data_by_id($order->ord_lc_no);
                                $lc_no = $lc_info->lc_no;
                                $bank_name = $lc_info->bank_name.'-';
                              }
                            ?>
                            <span class="editable" id="city"><?= $bank_name.$lc_no ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Chassis No </div>

                        <div class="profile-info-value">
                            <span class="editable" id="age"><?= $order->ord_chassis_no ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Engine No: </div>

                        <div class="profile-info-value">
                            <span class="editable" id="signup"><?= $order->ord_engine_no ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Car Model: </div>

                        <div class="profile-info-value">
                            <span class="editable" id="login"><?= $order->ord_car_model ?></span>
                        </div>
                    </div>
                  </div>
                </div><!-- /.col -->
              </div><!-- /.row -->

              <div class="space"></div>

              <div class="col-md-6" style="width: 50%; float: left;">
                <div >
                  <label for="" class="lable label-lg " style="background-color: #109055; width: 100%; text-align: center; font-weight: 600; color: #fff; padding: 3px; border: 1px solid #ddd;">Payment Collection</label>
                </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th class="center">#</th>
                      <th>Date</th>
                      <th>Amount</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i = 1; $total_col= 0; if($collections && isset($collections)): foreach ($collections as $collection): ?>
                    <tr>
                      <td class="center"><?= $i++; ?></td>

                      <td>
                        <?php 
                          $date = new DateTime($collection->date);
                          echo date_format($date, 'd M Y'); 
                        ?> 
                      </td>
                      <td>
                        <?= number_format($collection->amount, 2); ?>
                      </td>
                    </tr>
                  <?php $total_col = $total_col+$collection->amount;  endforeach; $grd_total = $total_col+$order->ord_advance;  ?>
                    <tr>
                      <td colspan="2"><span style="float: right; font-weight: bold;">Total: </span></td>
                      <td ><?= number_format($grd_total, 2)?></td>
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6" style="width: 50%; float: left;">
                <div >
                  <label for="" class="lable label-lg " style="background-color: #bb6103; width: 100%; text-align: center; font-weight: 600; color: #fff; padding: 3px; border: 1px solid #ddd;">Payment Information</label>
                </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th class="center">#</th>
                      <th>Date</th>
                      <th >Expence Head</th>
                      <th class="hidden-480">Amount</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i = 1; $total_pay= 0; if($payments && isset($payments)): foreach ($payments as $payment): ?>
                    <tr>
                      <td class="center"><?= $i++; ?></td>

                      <td>
                        <?php 
                          $date = new DateTime($payment->payment_date);
                          echo date_format($date, 'd M Y'); 
                        ?> 
                      </td>
                      <td ><?= $payment->head_title; ?> </td>
                      <td><?= number_format($payment->payment_amount, 2); ?></td>
                    </tr>
                    <?php $total_pay =$total_pay+$payment->payment_amount;  endforeach; ?>
                    <tr>
                      <td colspan="3"><span style="float: right; font-weight: bold;">Total: </span></td>
                      <td ><?= number_format($total_pay, 2); ?></td>
                    </tr>
                  <?php endif;?>
                  </tbody>
                </table>
              </div>

              <div class="hr hr8 hr-double hr-dotted"></div>

              <div class="row">
                <div class="col-sm-5 pull-right">
                  <table class="table  ">
                    <thead>
                      <tr>
                        <th colspan="2">Payment Summery</th>
                      </tr>
                    </thead>
                  <tbody >
                    <tr >
                      <th style="text-align: right;">Total Payment:</th>
                      <td style="text-align: right;"><?= number_format($grd_total, 2)?></td>
                    </tr>
                    <tr>
                      <th style="text-align: right;">Total Cost:</th>
                      <td style="text-align: right;"><?= number_format($total_pay, 2); ?></td>
                    </tr>
                    <tr>
                      <th style="text-align: right;">=</th>
                      <?php $eql = $total_pay - $grd_total;  ?>
                      <th style="text-align: right; font-weight: bold;"><?php  echo number_format($eql,2); ?></th>
                    </tr>
                  </tbody>
                </table>
                </div>
                
              </div>

              <div class="space-6"></div>
              <div class="well" style="display: none;">
                Thank you for choosing Ace Company products. We believe you will be satisfied by our services.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div>
