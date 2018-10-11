<?php  if($collections && isset($collections)): foreach($collections as $data):?>
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
    <td><?= number_format($data->amount) ?></td>
    <td><?= $data->description; ?></td>
  </tr>
  <?php endforeach; endif; ?>