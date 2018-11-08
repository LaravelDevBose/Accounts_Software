<div class="widget-box" style="width: 700px;">
    <div class="widget-header">
      <h4 class="widget-title">Car Deliver Information</h4>
    </div>

    <div class="widget-body">
      <div class="widget-main padding-24">
		<form action="<?= base_url()?>order/deliver/<?= $order->id?>" method="POST">
            <div class="row">
            	<?php if($order->ord_budget_range-$paid_amount > 0): ?>
            	<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<strong>
						<i class="ace-icon fa fa-times"></i>
						Warning!
					</strong>
					Order Full Amount is not Paid...!
					<br>
				</div>
				<?php endif;  if($order->ord_lc_no == '' || $order->ord_chassis_no == ''): ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
						<strong>
							<i class="ace-icon fa fa-times"></i>
							Warning!
						</strong>
						Order Lc Number and Chassis Number not added add First..!
						<br>
					</div>
				<?php endif; ?>

				<div class="col-sm-6">
					<div class="row">
						<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
							<b>Customer Info</b>
						</div>
					</div>

					<div>
						<ul class="list-unstyled spaced">
							<li>
								<i class="ace-icon fa fa-caret-right blue"></i>Name: <?= ucfirst($customer->cus_name); ?>
							</li>

							<li>
								<i class="ace-icon fa fa-caret-right blue"></i>Contact No: <?= $customer->cus_contact_no; ?>
							</li>

							<li>
								<i class="ace-icon fa fa-caret-right blue"></i>Address: <?= $customer->cus_address; ?>
							</li>

						</ul>
					</div>
				</div><!-- /.col -->

				<div class="col-sm-6">
					<div class="row">
						<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
							<b>Order Info</b>
						</div>
					</div>

					<div>
						<ul class="list-unstyled  spaced">
							<li>
								<i class="ace-icon fa fa-caret-right green"></i>Order No.:<?= $order->order_no; ?>
							</li>

							<li>
								<?php 
							      $lc_no = ''; if($order->ord_lc_no != 0 && $order->ord_lc_no !=  ''){
							        $lc_info = $this->LC_model->lc_data_by_id($order->ord_lc_no);
							        $lc_no = $lc_info->lc_no;
							      }
							    ?>
							    
								<i class="ace-icon fa fa-caret-right green"></i>L/C NO.: <?= $lc_no ?>
							</li>

							<li>
								<i class="ace-icon fa fa-caret-right green"></i>Chasiss No: <?= $order->ord_chassis_no; ?>
							</li>

							<li>
								<i class="ace-icon fa fa-caret-right green"></i> Engine No: <?= $order->ord_engine_no; ?>
							</li>
						</ul>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<div class="row">
				<div class="col-md-7">
					<?php if($order->order_status != 'c'):?>
					<div class="widget-box " >
						<div class="widget-body" style="background-color: #E7F2F8;">
							<div class="widget-main">
								<div class="row">
									<div class="col-sm-9" >
										<div class="form-group">
											<label class="col-sm-6 control-label no-padding-left" for="delivery_date"> Delivery Date:<span class="text-bold text-danger">*</span> </label>
											<div class="col-sm-6" style="padding: 0">
												<input class="form-control date-picker" required id="delivery_date" name="delivery_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
											</div>
										</div>
									</div>

									<div class="col-md-3" style="padding-left: 0;">
										<div class="form-group" >
											<div class="col-sm-12" style="padding: 0">
												<button type="submit" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ">Deliver</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endif;?>
				</div>
				<div class="col-md-5">
					<div class="widget-box " >
						<div class="widget-body" >
							<div class="widget-main">
								<table class="table table-borderd" style="margin-bottom: 0;">
									<tr class="info">
										<th>Budget Amount: </th>
										<td><?= number_format($order->ord_budget_range,2); ?></td>
									</tr>
									<tr class="success">
										<th>Advance Amount: </th>
										<td><?= number_format($order->ord_advance,2); ?></td>
									</tr>
									<tr class="success">
										<th>Paid Amount: </th>
										<td><?= number_format($paid_amount,2); ?></td>
									</tr>
									<tr></tr>
									<tr class="danger" style="border-top: 3px solid #000;">
										<th>Due Amount: </th>
										<td><?= number_format($order->ord_budget_range-$paid_amount,2); ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
        </form>
      </div>
    </div>
</div>
<script>
	$('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
</script>

