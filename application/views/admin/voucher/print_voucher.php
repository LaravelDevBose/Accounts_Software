<style>
    @media print {
        table tr td {
            font-size: 12px;
        }
        .colTable{
            border: 0px!important;
        }
    }
</style>
<div class="row">
    <div class="col-xs-12">

        <div id="data_table">
            <div id="header" >
                <?php $this->load->view('admin/partials/print_header');?>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 80px">Invoice ID</th>
                        <th style="width: 90px">Value Date</th>
                        <th style="width: 155px">Particulars</th>
                        <th style="width: 100px">Debit</th>
                        <th style="width: 100px">Credit</th>
                        <th>Reference</th>
                    </tr>
                </thead>

                <tbody id="tBody">
                    <tr>
                        <td ><?= $voucher->v_code ?></td>
                        <td ><?php $date = new DateTime($voucher->value_date); echo date_format($date,'d M Y'); ?></td>
                        <td colspan="4">
                            <table   style="width: 100%; border: 2px solid #fff;" id="mid_tbl" border="0">
                                <tr>
                                    <?php $acc_head = $this->AccountHead_model->data_by_id($voucher->dr_ah_id); ?>
                                    <td style="width: 150px;"><?= $acc_head->ah_code.'- '.ucfirst($acc_head->ah_name);?></td>
                                    <td style="width: 100px;"><?= number_format($voucher->dr_amount, 2)?></td>
                                    <td style="width: 100px;">0.00</td>
                                    <td><?= $voucher->dr_note; ?></td>
                                </tr>
                                <tr>
                                    <?php $acc_head = $this->AccountHead_model->data_by_id($voucher->cr_ah_id); ?>
                                    <td style="width: 150px;"><?= $acc_head->ah_code.'- '.ucfirst($acc_head->ah_name);?></td>
                                    <td style="width: 100px;">0.00</td>
                                    <td style="width: 100px;"><?= number_format($voucher->cr_amount, 2)?></td>
                                    <td><?= $voucher->cr_note; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="width: 100%; margin-top: 50px; position: fixed;">
                <div style="width: 30%;  float: left; margin: 10px auto;">
                    <p style="font-weight: 800; font-size: 14px; text-align: center; border-bottom: 2px solid #000;">Prepared By</p>
                    <span style="text-align: center; width: 100%; display: inline-block;  margin-bottom: 3px!important;"><?= ucwords($voucher->created_by)?></span><br>
                    <span style="text-align: center; width: 100%; display: inline-block;   margin-top: 3px!important; "><?php $date = New dateTime($voucher->created_at); echo date_format($date,'d M Y'); ?></span>
                </div>
                <div style="width: 40%; float: left;"></div>
                <div style="width: 30%;  float: right; margin: 10px auto;">
                    <p style="font-weight: 800; font-size: 14px; text-align: center; border-bottom: 2px solid #000;">Approved By</p>
                </div>
            </div>
        </div>
    </div>
</div>




