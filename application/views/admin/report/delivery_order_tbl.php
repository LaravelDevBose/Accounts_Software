<?php $total_budget = 0; $total_paid = 0; $i=1; if($orders && isset($orders)): foreach($orders as $order):?>
<tr>
  <td><?= ucfirst($order->cus_name) ?></td>
  <td>
    <?php 
      $lc_no = ''; if($order->ord_lc_no != 0 && $order->ord_lc_no !=  ''){
        $lc_info = $this->LC_model->lc_data_by_id($order->ord_lc_no);
        $lc_no = $lc_info->lc_no;
      }
    ?>
    <?= $lc_no ?> 
  </td>
  <td><?= $order->ord_car_model.' | '.$order->ord_engine_no?> </td>
  <td><?= $order->ord_chassis_no; ?></td>
  <td><?= $order->order_no; ?></td>
  <td><?= number_format($order->ord_budget_range,2); ?></td>
  <?php 
    $paid_amount = $this->Order_model->find_paid_amount($order->id);  
    $total_budget =$total_budget+ $order->ord_budget_range;
    $total_paid =$total_paid+ $paid_amount;
  ?>
  <td class="success"><?= number_format($paid_amount,2); ?></td>
  <td class="danger"><?= number_format($order->ord_budget_range-$paid_amount,2); ?></td>
</tr>

<?php endforeach; endif; ?>
<tr style="background-color: #E7F2F8;">
  <td colspan="4" style="border: 0;"></td>
  <th>Sub Total</th>
  <td><?= number_format($total_budget,2) ?></td>
  <td><?= number_format($total_paid,2) ?></td>
  <td><?= number_format($total_budget-$total_paid,2) ?></td>
</tr>