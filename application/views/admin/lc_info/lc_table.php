<?php $i=1; if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
<tr>
  <td class="center" style="display:none;">
    
  </td>

  <td><?= $i++; ?></td>
  <td><?= $data->lc_no; ?></td>
  <td><?= $data->bank_name; ?></td>
  <td>
    <?php 
      $date = new DateTime($data->lc_date);
      echo date_format($date, 'd M Y'); 
    ?>
  </td>
  <td><?= $data->lc_note; ?></td>
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>lc/edit/<?= $data->id; ?>" >
            <i class="ace-icon fa fa-pencil bigger-130"></i>
          </a>
          <a class="red" href="<?= base_url(); ?>lc/delete/<?= $data->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>

  
</tr>
<?php endforeach; endif; ?>