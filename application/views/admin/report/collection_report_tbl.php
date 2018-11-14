<?php $i=1; $total_amount = 0;  if($collections && isset($collections)): foreach($collections as $data):?>
    <tr>
        <td><?= $i++ ?></td>
        <td>
            <?php
            $date = new DateTime($data->date);
            echo date_format($date, 'd M Y');
            ?>
        </td>
        <td><?= $data->coll_sl ?></td>
        <td><?= $data->order_no ?></td>
        <td><?= ucfirst($data->cus_name) ?></td>
        <td>
            <?php if($data->collection_type == 1):?>
                <span style="background-color: #2F9B84; padding:2px 5px; color: #fff; font-size: 12px">Advance</span>
            <?php elseif($data->collection_type == 2):?>
                <span style="background-color: #0c8b9b; padding:2px  5px; color: #fff; font-size: 12px">Part</span>
            <?php elseif($data->collection_type == 3):?>
                <span style="background-color: #019b20; padding:2px  5px; color: #fff; font-size: 12px">Full Payment</span>
            <?php else:?>
                <span style="background-color: #129B59; padding:2px  5px; color: #fff; font-size: 12px">Cheque</span>
            <?php endif?>
        </td>
        <td><?= $data->description; ?></td>
        <td><?= number_format($data->amount,2) ?></td>
        <?php $total_amount += $data->amount; ?>
    </tr>
<?php endforeach; endif; ?>
<tr class="info">
    <th colspan="6"></th>
    <th>Sub Total: </th>
    <td><?= number_format($total_amount, 2); ?></td>
</tr>