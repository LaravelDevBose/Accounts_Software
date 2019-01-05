<?php $t_gross = $t_net = $t_vat = $t_30 = $t_70 = $t_stamp= $t_bill = $t_pay = 0;

    if(isset($bills) && $bills): foreach($bills as $bill):?>
    <tr>
        <td class="center"><?= $bill->in_bill_code ?></td>
        <td>
            <?php
            $date = new DateTime($bill->in_bill_date);
            echo date_format($date, 'd M Y');
            ?>
        </td>
        <td class="center"><?= ucfirst($bill->mc_crt_no) ?></td>
        <td class="center"><?= ucfirst($bill->in_comp_name) ?></td>
        <td class="center"><?= ucfirst($bill->cus_name) ?></td>
        <td><?= $bill->remarks; ?></td>
        <td style="text-align: right"><?= number_format($bill->gross_premium) ?></td>
        <td style="text-align: right"><?= number_format($bill->net_premium) ?></td>
        <td style="text-align: right"><?= number_format($bill->in_bill_vat) ?></td>
        <td style="text-align: right"><?= number_format($bill->in_bill_30) ?></td>
        <td style="text-align: right"><?= number_format($bill->in_bill_70) ?></td>
        <td style="text-align: right"><?= number_format($bill->stamp) ?></td>
        <td style="text-align: right"><?= number_format($bill->bill_amount) ?></td>
        <td style="text-align: right"><?= number_format($bill->payment_amount) ?></td>
    </tr>
    <?php
        $t_gross += $bill->gross_premium;
        $t_net += $bill->net_premium;
        $t_vat += $bill->in_bill_vat;
        $t_30 += $bill->in_bill_30;
        $t_70 += $bill->in_bill_70;
        $t_stamp += $bill->stamp;
        $t_bill += $bill->bill_amount;
        $t_pay += $bill->payment_amount;

    ?>
<?php endforeach; endif; ?>

    <tr>
        <td colspan="6"> <b style="text-align: right">Total: </b></td>
        <td><b style="text-align: right"><?= number_format($t_gross,2)?></b></td>
        <td><b style="text-align: right"><?= number_format($t_net,2)?></b></td>
        <td><b style="text-align: right"><?= number_format($t_vat,2)?></b></td>
        <td><b style="text-align: right"><?= number_format($t_30,2)?></b></td>
        <td><b style="text-align: right"><?= number_format($t_70,2)?></b></td>
        <td><b style="text-align: right"><?= number_format($t_stamp,2)?></b></td>
        <td><b style="text-align: right"><?= number_format($t_bill,2)?></b></td>
        <td><b style="text-align: right"><?= number_format($t_pay,2)?></b></td>
    </tr>
