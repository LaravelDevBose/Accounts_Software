<?php $i=1; if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
<tr>
  <td class="center" style="display:none;">
    
  </td>

  <td><?= $i++; ?></td>
  <td><?= $data->lc_no; ?></td>
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="green" href="" title="Eidt">
            <i class="ace-icon fa fa-pencil bigger-130"></i>
          </a>
          <a class="red" href="#" onclick="deleted()">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>

  <td style="display:none;" class="hidden-480">
    <span class="label label-sm label-info arrowed arrowed-righ"><?php //echo $row->ProductCategory_Name; ?></span>
  </td>
  
  <td style="display:none;"></td>
  <td style="display:none;"></td>
</tr>
<?php endforeach; endif; ?>