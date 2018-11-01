<?php $i=1; if($salaries && isset($salaries)): foreach($salaries as $salary):?>
<tr>
  
  <td><?= $i++; ?></td>
  <td><?= ucfirst($salary->emp_name); ?></td>
  <td><?= $salary->month_name.' - '.$salary->year; ?></td>
  <td><?php $date = new DateTime($salary->date); echo date_format($date, 'd M Y'); ?></td>
  <td><?= number_format($salary->payment_amount, 2); ?></td>
  <td><?= number_format($salary->due_amount, 2); ?></td>
  
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>salary/edit/<?= $salary->id; ?>" >
            <i class="ace-icon fa fa-pencil bigger-130"></i>
          </a>
          <a class="red" href="<?= base_url(); ?>salary/delete/<?= $salary->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>                
</tr>
<?php endforeach; endif; ?>