<?php  if($collections && isset($collections)): foreach($collections as $data):?>
  <tr>
    <td>
      <?php 
        $date = new DateTime($data->date);
        echo date_format($date, 'd M Y'); 
      ?> 
    </td>
    <td class="center"><?= ucfirst($data->cus_name) ?></td>
    <td><?= $data->ord_chassis_no; ?></td>
    <td><?= $data->lc_no; ?></td>
    
    <td><?= number_format($data->amount) ?></td>
    <td><?= $data->description; ?></td>
    <td>
        <div class="hidden-sm hidden-xs action-buttons">
            <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>collection/edit/<?= $data->id; ?>" >
              <i class="ace-icon fa fa-pencil bigger-130"></i>
            </a>
            <a class="red" href="<?= base_url(); ?>collection/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
              <i class="ace-icon fa fa-trash-o bigger-130"></i>
            </a>
        </div>
    </td>
  </tr>
  <?php endforeach; endif; ?>