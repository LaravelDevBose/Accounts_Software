<?php $i = 1; $total_esti_price = 0; $total_paid = 0; $i=1; if($orders && isset($orders)): foreach($orders as $order):?>
    <tr>
        <td><?= $i++; ?></td>
        <td>
            <?php
            $date = new DateTime($order->delivery_date);
            echo date_format($date, 'd/m/Y');
            ?>
        </td>

        <td><?= $order->order_no; ?></td>
        <td><?= $order->pus_sl; ?></td>
        <td><?= ucfirst($order->cus_name) ?></td>
        <td><?= ucfirst($order->sup_name) ?></td>
        <td><?= $order->lc_no ?></td>
        <td><?= $order->ord_chassis_no.'||'.$order->ord_engine_no?> </td>
        <td><?= number_format($order->total_price,2); ?></td>
        <?php
        $paid_amount = $this->Collection_model->find_paid_amount($order->id);
        $total_esti_price += $order->total_price;
        $total_paid += $paid_amount;
        ?>
        <td class="success"><?= number_format($paid_amount,2); ?></td>
        <td class="danger"><?= number_format($order->ord_budget_range-$paid_amount,2); ?></td>
    </tr>

<?php endforeach; endif; ?>
<tr style="background-color: #E7F2F8;">
    <td colspan="7" style="border: 0;"></td>
    <th>Sub Total</th>
    <td><?= number_format($total_esti_price,2) ?></td>
    <td><?= number_format($total_paid,2) ?></td>
    <td><?= number_format($total_esti_price-$total_paid,2) ?></td>
</tr>