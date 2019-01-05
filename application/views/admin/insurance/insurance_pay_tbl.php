<?php  if(isset($bills) && $bills): foreach($bills as $bill):?>
    <tr>
        <td class="center"><?= $bill->in_bill_code ?></td>
        <td>
            <?php
            $date = new DateTime($bill->in_bill_date);
            echo date_format($date, 'd M Y');
            ?>
        </td>
        <td class="center"><?= ucfirst($bill->in_comp_name) ?></td>
        <td><?= $bill->remarks; ?></td>
        <td><?= number_format($bill->payment_amount) ?></td>
        <td>
            <div class="hidden-sm hidden-xs action-buttons">
                <a class="green linka fancybox fancybox.ajax " href="<?= base_url();?>titu/insurance_bill_edit/<?= $bill->in_bill_id; ?>" >
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
                <a class="red" href="<?= base_url(); ?>titu/insurance_bill_delete/<?= $bill->in_bill_id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; endif; ?>