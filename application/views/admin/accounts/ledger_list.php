<?php $i=1; $dr = 0; $cr=0; $total = 0;  if(isset($ledgers) && $ledgers): foreach($ledgers as $ledger):?>
    <tr>
        <td class="center"><?= $i++ ?></td>
        <td class="center"><?php $date = new DateTime($ledger->value_date); echo date_format($date, 'd M Y');?></td>
        <td class="center"><?= $head->ah_code ?></td>
        <td class="center"><?= ucfirst($head->ah_name) ?></td>

        <?php if($ledger->dr_ah_id == $head->ah_id){?>

        <td style="text-align: right;" ><?= number_format($ledger->dr_amount,2) ?></td>
        <td style="text-align: right;" >0.00</td>

        <?php 
            $total += $ledger->dr_amount; 
            $dr = $dr+$ledger->dr_amount; 

            }else if($ledger->cr_ah_id == $head->ah_id){
        ?>
        <td style="text-align: right;" >0.00</td>
        <td style="text-align: right;" ><?= number_format($ledger->cr_amount,2) ?></td>
        <?php 
            $total -= $ledger->cr_amount; 
            $cr = $cr+ $ledger->cr_amount;
        }?>
        <td style="text-align: right;" ><?= number_format($total,2) ?></td>
    </tr>
<?php endforeach; endif; ?>

<tr>
    <td colspan="4" style="text-align: right;" > <b>Total Amount:</b></td>
    <td style="text-align: right;" > <b><?= number_format($dr,2) ?></b></td>
    <td style="text-align: right;" > <b><?= number_format($cr,2) ?></b></td>
    <td style="text-align: right;" > <b><?= number_format($total,2) ?></b></td>
</tr>
