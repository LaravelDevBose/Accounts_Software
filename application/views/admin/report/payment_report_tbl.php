<?php $total = 0;  if($payments && isset($payments)): foreach($payments as $data):?>
<tr>

  <td><?= $data->payment_code ?></td>
  <td>
    <?php 
      $date = new DateTime($data->payment_date);
      echo date_format($date, 'd M Y'); 
    ?> 
  </td>

  <td><?= $data->sup_name; ?></td>
  <td> <?= $data->ord_chassis_no ?> </td>
  <td> <?= $data->lc_no ?> </td>
  <td> <?= $data->head_title ?> </td>
  <td><?= number_format($data->payment_amount,2) ?></td>
</tr>
<?php $total += $data->payment_amount;  endforeach; ?>
<tr>
  <th colspan="6" ><span style="float: right;">Sub Total:</span></th>
  <td><?= number_format($total,2); ?></td>
</tr>
<?php endif;?>