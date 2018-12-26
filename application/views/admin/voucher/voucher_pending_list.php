
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Voucher Information List</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>

                    <a href="#" data-action="close">
                        <i class="ace-icon fa fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main">


                    <div class="row">
                        <div class="col-xs-12">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Voucher No</th>
                                    <th>Date</th>
                                    <th>Account Head</th>
                                    <th>L/C No</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody id="tBody">
                                <?php  $i=1; if(isset($vouchers) && $vouchers): foreach($vouchers as $voucher):?>
                                    <tr>
                                        <td><?= $voucher->order_no; ?></td>
                                        <td><?= $order->cus_name ?></td>

                                        <td>
                                            <?php
                                            $pus_sl = ''; if($order->pus_id != 0 && $order->pus_id !=  ''){
                                                $pus_sl = $this->db->where('id', $order->pus_id)->get('purchase')->row()->pus_sl;
                                            }
                                            ?>
                                            <?= $pus_sl ?>
                                        </td>
                                        <td>
                                            <?php
                                            $lc_no = ''; if($order->ord_lc_no != 0 && $order->ord_lc_no !=  ''){
                                                $lc_info = $this->LC_model->lc_data_by_id($order->ord_lc_no);
                                                $lc_no = $lc_info->lc_no;
                                            }
                                            ?>
                                            <?= $lc_no ?>
                                        </td>
                                        <td><?= $order->ord_chassis_no.'||'.$order->ord_engine_no?> </td>
                                        <td>
                                            <?php if($order->order_status == 'c'): ?>
                                                <span class="label " style="background: green;">Delivered</span>
                                            <?php elseif($order->order_status == 'a'): ?>
                                                <span class="label " style="background: #36a2ec;">Active</span>
                                            <?php else: ?>
                                                <span class="label " style="background: #ec880a;">Pending</span>
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a style="color: #7e35de;" title="Purchase" href="<?= base_url();?>purchase/insert/<?= $order->id;?>" >
                                                    <i class="ace-icon fa fa-cart-arrow-down bigger-130" ></i>
                                                </a>
                                                <a style="color: #F89406;" title="View" href="<?= base_url();?>order/view/<?= $order->id;?>" >
                                                    <i class="ace-icon fa fa-eye bigger-130" ></i>
                                                </a>

                                                <a class="info" title="Edit" href="<?= base_url();?>order/edit/<?= $order->id;?>" >
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                                <a class="red" title="Delete" href="<?= base_url(); ?>order/delete/<?= $order->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





