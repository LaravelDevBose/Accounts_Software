<?php $i=1; if(isset($heads) && $heads): foreach($heads as $head):?>
    <tr>
        <td class="center"><?= $i++ ?></td>
        <td><?= $head->ah_code; ?></td>
        <td><?= $head->ah_name ?></td>
        <td>
            <div class="hidden-sm hidden-xs action-buttons">
                <a class="red" href="<?= base_url(); ?>titu/ac_head_delete/<?= $head->ah_id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
            </div>
        </td>
        <td style="display:none;"></td>
        <td style="display:none;"></td>



    </tr>
<?php endforeach; endif; ?>