<?php  if(isset($bills) && $bills): foreach($bills as $bill):?>
    <tr>
        <td class="center"><?= $bill->entry_code ?></td>
        <td>
            <?php
            $date = new DateTime($bill->bp_date);
            echo date_format($date, 'd M Y');
            ?>
        </td>
        <td class="center"><?= ucfirst($bill->bill_no) ?></td>
        <td class="center"><?= ucfirst($bill->agent_name) ?></td>
        <td><?= $bill->particulars; ?></td>
        <td><?= $bill->remarks; ?></td>
        <?php if($bill->entry_type =='Bill'):?>
        <td><?= number_format($bill->bill_amount) ?></td>
        <?php else: ?>
        <td><?= number_format($bill->paid_amount) ?></td>
        <?php endif; ?>
        <td>
            <div class="hidden-sm hidden-xs action-buttons">
                <a class="green linka fancybox fancybox.ajax " href="<?= base_url();?>titu/agent_bill_edit/<?= $bill->bill_id; ?>" >
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
                <a class="red" href="<?= base_url(); ?>titu/agent_bill_delete/<?= $bill->bill_id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; endif; ?>