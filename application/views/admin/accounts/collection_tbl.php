<?php  if($collections && isset($collections)): foreach($collections as $data):?>
    <tr>
        <td class="center"><?= $data->coll_sl ?></td>
        <td>
            <?php
            $date = new DateTime($data->date);
            echo date_format($date, 'd M Y');
            ?>
        </td>
        <td class="center"><?= ucfirst($data->order_no) ?></td>
        <td class="center"><?= ucfirst($data->cus_name) ?></td>
        <td><?= $data->description; ?></td>
        <td><?= number_format($data->amount) ?></td>
        <td>
            <div class="hidden-sm hidden-xs action-buttons">
                <a style="color: #F89406;" class="linka fancybox fancybox.ajax"  href="<?= base_url();?>collection/view/<?= $data->id;?>" >
                    <i class="ace-icon fa fa-eye bigger-130" ></i>
                </a>
                <a class="green " href="<?= base_url();?>collection/edit/<?= $data->id; ?>" >
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
                <a class="red" href="<?= base_url(); ?>collection/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; endif; ?>