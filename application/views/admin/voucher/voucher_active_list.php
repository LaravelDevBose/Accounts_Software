<style>
    #tBody tr td p{
        margin-bottom: 0px;
    }
    #tBody tr td{
        padding: 3px 0;
    }
    #tBody tr td p span:nth-child(1) {
        display: inline-block;
        width: 100%;
        border-bottom: 1px solid #ddd;
    }
    #tBody tr td p span:nth-child(2) {
        display: inline-block;
    }
    .approve{
        padding: 8px 3px!important;
    }
    .btn-xs{
        padding: 1px 2px;
        font-size: 10px;
        line-height: 1;
    }
    .action-buttons a{
        margin: 7px 1px 0px 0px;
    }
</style>
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
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th style="width: 80px">Invoice ID</th>
                                    <th style="width: 90px">Value Date</th>
                                    <th style="width: 200px">Particulars</th>
                                    <th style="width: 120px">Debit</th>
                                    <th style="width: 120px">Credit</th>
                                    <th style="width: 200px;">Reference</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody id="tBody">
                                <?php  $i=1; if(isset($vouchers) && $vouchers): foreach($vouchers as $voucher):?>
                                    <tr >
                                        <td ><?= $voucher->v_code ?></td>
                                        <td ><?php $date = new DateTime($voucher->value_date); echo date_format($date,'d M Y'); ?></td>
                                        <td >
                                            <p>
                                                <?php $dr_head = $this->AccountHead_model->data_by_id($voucher->dr_ah_id); ?>
                                                <?php $cr_head = $this->AccountHead_model->data_by_id($voucher->cr_ah_id); ?>
                                                <span><?= $dr_head->ah_code.'- '.ucfirst($dr_head->ah_name);?></span>
                                                <span><?= $cr_head->ah_code.'- '.ucfirst($cr_head->ah_name);?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <span><?= number_format($voucher->dr_amount, 2)?></span>
                                                <span>-</span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <span>-</span>
                                                <span><?= number_format($voucher->cr_amount, 2)?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <span><?= $voucher->dr_note; ?></span>
                                                <span><?= $voucher->cr_note; ?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="btn btn-xs btn-purple" title="Print" onclick="print_voucher('<?= $voucher->v_id; ?>')" >
                                                    <i class="ace-icon fa fa-print bigger-130" ></i>
                                                </a>
                                                <a class="btn btn-xs btn-info2 linka fancybox fancybox.ajax"  href="<?= base_url();?>titu/voucher_view/<?= $voucher->v_id;?>" >
                                                    <i class="ace-icon fa fa-eye bigger-130" ></i>
                                                </a>
                                                <?php if($voucher->approve_status != 'A'):?>
                                                    <a class=" btn btn-xs btn-success" title="Approved" href="<?= base_url(); ?>titu/voucher_approve/<?= $voucher->v_id ?>" onclick="return confirm('Are You Sure Went to Approve This! ')" >
                                                        <i class="ace-icon fa fa-check bigger-130" ></i>
                                                    </a>

                                                    <a class="btn btn-xs btn-primary" title="Edit" href="<?= base_url();?>titu/voucher_edit/<?= $voucher->v_id;?>" >
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-danger" title="Delete" href="<?= base_url(); ?>titu/voucher_delete/<?= $voucher->v_id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                <?php endif; ?>
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

<?php $this->load->view('admin/ajax/voucher_ajax');?>



