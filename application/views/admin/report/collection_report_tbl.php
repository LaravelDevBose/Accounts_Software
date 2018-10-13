<?php $total_amount = 0;  if($collections && isset($collections)): foreach($collections as $data):?>
  <tr>
    <td class="center"><?= ucfirst($data->cus_name) ?></td>
    <td><?= $data->ord_chassis_no; ?></td>
    <td><?= $data->lc_no; ?></td>
    <td>
      <?php 
        $date = new DateTime($data->date);
        echo date_format($date, 'd M Y'); 
      ?> 
    </td>
    <td><?= $data->description; ?></td>
    <td><?= number_format($data->amount,2) ?></td>
    <?php $total_amount += $data->amount; ?>
  </tr>
  <?php endforeach; endif; ?>
  <tr class="info">
    <th colspan="4"></th>
    <th>Sub Total: </th>
    <td><?= number_format($total_amount, 2); ?></td>
  </tr>