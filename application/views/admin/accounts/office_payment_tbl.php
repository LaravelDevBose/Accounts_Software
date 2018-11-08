<?php $i=1; if($payments && isset($payments)): foreach($payments as $data):?>
<tr>

  <td><?= $i++; ?></td>
  <td>
    <?php 
      $date = new DateTime($data->payment_date);
      echo date_format($date, 'd M Y'); 
    ?> 
  </td>
  <td><?= $data->payment_code; ?></td>
  <td><?= $data->head_title; ?></td>
  <td><?= $data->note; ?></td>
  <td><?= number_format($data->payment_amount,2) ?></td>
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>office_payment/edit/<?= $data->id; ?>" >
            <i class="ace-icon fa fa-pencil bigger-130"></i>
          </a>
          <a class="red" href="<?= base_url(); ?>office_payment/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>
</tr>
<?php endforeach; endif; ?>