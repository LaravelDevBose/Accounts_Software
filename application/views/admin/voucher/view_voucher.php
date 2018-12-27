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

<div class="widget-box" style="height: 200px;">
    <div class="widget-header">
        <h4 class="widget-title">View Voucher Information List</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <div id="data_table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 80px">Invoice ID</th>
                            <th style="width: 90px">Value Date</th>
                            <th style="width: 200px">Particulars</th>
                            <th style="width: 120px">Debit</th>
                            <th style="width: 120px">Credit</th>
                            <th style="width: 200px;">Reference</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody id="tBody">
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
                            <td class="approve">
                                <?php if($voucher->approve_status == 'A'):?>
                                    <label class="label label-success">Approved</label>
                                <?php else:?>
                                    <label class="label label-warning">Pending</label>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

