<?php $i=1; if($heads && isset($heads)): foreach($heads as $head):?>
<tr>
  <td class="center" style="display:none;">
    
  </td>

  <td><?= $i++; ?></td>
  <td><?= $head->head_name; ?></td>
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>trans/head/edit/<?= $head->id; ?>" >
            <i class="ace-icon fa fa-pencil bigger-130"></i>
          </a>
          <a class="red" href="<?= base_url(); ?>trans/head/delete/<?= $head->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>
  <td style="display:none;"></td>
  <td style="display:none;"></td>
  <td style="display:none;"></td>


  
</tr>
<?php endforeach; endif; ?>