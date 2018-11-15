<?php $i=1; $total_salary = 0; $total_paid = 0; $total_due=0; if($employees && isset($employees)): foreach($employees as $employee):?>
    <tr>
        <td><?= $i++; ?></td>
        <td><?= ucfirst($employee->emp_name); ?></td>
        <?php $data = $this->SallaryMonth_model->sallary_month_by_id($month_id); ?>
        <td><?= $data->month_name.' - '.$data->year; ?></td>
        <td><?= number_format($employee->emp_sallary, 2); ?></td>
        <?php $paid_amount = $this->Salary_model->paid_salary_amount($employee->id, $month_id); $due_amount =$employee->emp_sallary - $paid_amount->payment_amount;  ?>
        <td class="success"><?= number_format($paid_amount->payment_amount, 2); ?></td>
        <td class="danger"><?= number_format($due_amount, 2); ?></td>
        <td style="width: 150px ; height: 30px;"></td>
    </tr>
    <?php $total_salary +=$employee->emp_sallary; $total_paid = $total_paid+$paid_amount->payment_amount; $total_due = $total_due+$due_amount; ?>
<?php endforeach; endif; ?>
<tr style="background-color: #E7F2F8;">
    <td colspan="2" style="border: 0;"></td>
    <th>Sub Total</th>
    <td><?= number_format($total_salary,2) ?></td>
    <td><?= number_format($total_paid,2) ?></td>
    <td><?= number_format($total_due,2) ?></td>
    <td></td>
</tr>