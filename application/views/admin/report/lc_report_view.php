<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">L/C Information Report List</h4>
                <div class="widget-toolbar">
                    <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>

                </div>

            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div id="data_table">
                        <div id="header" style="display: none;">
                            <?php $this->load->view('admin/partials/print_header');?>
                        </div>
                        <div id="table-header" class="table-header" >
                            L/C Information List
                        </div>


                        <table   class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>L/C Number</th>
                                <th>Bank Name - Branch Name</th>
                                <th>Company Name</th>
                                <th>Supplier Name</th>
                                <th>Car Qty</th>
                                <th>Note</th>
                                <th>L/C Amount</th>
                            </tr>
                            </thead>

                            <tbody id="tBody">
                            <?php $i=1; $total = 0; if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <?php
                                            $date = new DateTime($data->lc_date);
                                            echo date_format($date, 'd M Y');
                                        ?>
                                    </td>
                                    <td><?= $data->lc_no; ?></td>
                                    <td><?= $data->bank_name.'-'.$data->branch_name; ?></td>
                                    <td><?= $data->comp_name; ?></td>
                                    <td><?= $data->sup_name; ?></td>
                                    <td><?= $data->car_qty; ?></td>
                                    <td><?= $data->note; ?></td>
                                    <td><?= number_format($data->lc_amount,2); ?></td>
                                </tr>
                            <?php $total +=$data->lc_amount; endforeach; endif; ?>
                                <tr>
                                    <th colspan="8" style="text-align: right;">Sub Total: </th>
                                    <th><?= number_format($total, 2); ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

