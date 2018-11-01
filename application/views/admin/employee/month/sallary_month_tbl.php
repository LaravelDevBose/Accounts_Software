<?php $i=1; if($sallary_months && isset($sallary_months)): foreach($sallary_months as $sallary_month):?>
  <tr>
    <td class="center" style="display:none;">
      
    </td>

    <td><?= $i++; ?></td>
    <td><?= $sallary_month->month_name.' - '.$sallary_month->year; ?></td>
    <td><?= $sallary_month->year; ?></td>
    <td><?= $sallary_month->month_name; ?></td>
    <td><?= $sallary_month->note; ?></td>
    <td>
        <div class="hidden-sm hidden-xs action-buttons">
            <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>month/edit/<?= $sallary_month->id; ?>" >
              <i class="ace-icon fa fa-pencil bigger-130"></i>
            </a>
            <a class="red" href="<?= base_url(); ?>month/delete/<?= $sallary_month->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
              <i class="ace-icon fa fa-trash-o bigger-130"></i>
            </a>
        </div>
    </td>                
  </tr>
<?php endforeach; endif; ?>