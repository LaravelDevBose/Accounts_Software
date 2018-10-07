<?php  $i=1; if($orders && isset($orders)): foreach($orders as $order):?>
<tr>
  <td><?= $i++ ?></td>
  <td><?= $order->cus_name ?></td>
  <td><?= $order->lc_no ?></td>
  <td><?= $order->ord_car_model.' | '.$order->ord_engine_no?> </td>
  <td><?= $order->ord_chassis_no; ?></td>
  <td><?= $order->order_no; ?></td>
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="green" title="View" href="<?= base_url();?>order/edit/<?= $order->id;?>" >
            <i class="ace-icon fa fa-eye bigger-130"></i>
          </a>
      </div>
  </td>

  
</tr>
<?php endforeach; endif; ?>