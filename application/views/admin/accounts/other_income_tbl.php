<?php $i=1; if($incomes && isset($incomes)): foreach($incomes as $data):?>
  <tr>
    <td class="center" style="display:none;"> </td>

    <td><?= $i++; ?></td>
    <td><?= $data->head_title; ?></td>
    <td>
      <?php 
        $date = new DateTime($data->date);
        echo date_format($date, 'd M Y'); 
      ?> 
    </td>
    <td><?= number_format($data->amount) ?></td>
    <td><?= $data->description; ?></td>
    <td>
        <div class="hidden-sm hidden-xs action-buttons">
            <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>other_income/edit/<?= $data->id; ?>" >
              <i class="ace-icon fa fa-pencil bigger-130"></i>
            </a>
            <a class="red" href="<?= base_url(); ?>other_income/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
              <i class="ace-icon fa fa-trash-o bigger-130"></i>
            </a>
        </div>
    </td>
  </tr>
<?php endforeach; endif; ?>