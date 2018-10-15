<?php $i=1; $total_paid = 0; $total_due=0; if($salaries && isset($salaries)): foreach($salaries as $salary):?>
<tr>
  <td><?= $i++; ?></td>
  <td><?= ucfirst($salary->emp_name); ?></td>
  <td><?= $salary->month_name.' - '.$salary->year; ?></td>
  <td><?php $date = new DateTime($salary->date); echo date_format($date, 'd M Y'); ?></td>
  <td class="success"><?= number_format($salary->payment_amount, 2); ?></td>
  <td class="danger"><?= number_format($salary->due_amount, 2); ?></td>           
</tr>
<?php $total_paid = $total_paid+$salary->payment_amount; $total_due = $total_due+$salary->due_amount; ?>
<?php endforeach; endif; ?>
<tr style="background-color: #E7F2F8;">
  <td colspan="3" style="border: 0;"></td>
  <th>Sub Total</th>
  <td><?= number_format($total_paid,2) ?></td>
  <td><?= number_format($total_due,2) ?></td>
</tr>