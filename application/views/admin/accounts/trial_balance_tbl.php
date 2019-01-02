<?php $i=1; $dr = 0; $cr=0; if(isset($account_heads) && $account_heads): foreach($account_heads as $head):?>
    <tr>
        <td class="center"><?= $i++ ?></td>
        <td class="center"><?= $head->ah_code ?></td>
        <td class="center"><?= ucfirst($head->ah_name) ?></td>
        <?php
            $dr_amount = $this->Voucher_model->account_head_wise_dr_sum($head->ah_id);
            $cr_amount = $this->Voucher_model->account_head_wise_cr_sum($head->ah_id);
        ?>
        <td style="text-align: right;" ><?= number_format($dr_amount,2) ?></td>
        <td style="text-align: right;" ><?= number_format($cr_amount,2) ?></td>
    </tr>
<?php $dr = $dr+$dr_amount; $cr = $cr+ $cr_amount;  endforeach; endif; ?>

<tr>
    <td colspan="3" style="text-align: right;" > <b>Total Amount:</b></td>
    <td style="text-align: right;" > <b><?= number_format($dr,2) ?></b></td>
    <td style="text-align: right;" > <b><?= number_format($cr,2) ?></b></td>
</tr>
