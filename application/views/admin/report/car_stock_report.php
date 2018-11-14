
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Car Stock Information List</h4>
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
                        <div id="table-header" class="table-header">
                            Car Stock Information List
                        </div>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Purchase Sl.</th>
                                <th>Supplier Name</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Model | Color</th>
                                <th>Customer Name</th>
                                <th>Order No</th>
                                <th>Current Location</th>
                                <th>Estimate Price</th>
                            </tr>
                            </thead>

                            <tbody id="tBody">
                            <?php  $i=1; $total = 0; if($cars && isset($cars)): foreach($cars as $car):?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $car->pus_sl; ?></td>
                                    <td><?= $car->sup_name ?></td>
                                    <td><?= $car->puc_chassis_no; ?></td>
                                    <td><?= $car->puc_engine_no; ?></td>
                                    <td><?= $car->puc_car_model.' | '.$car->puc_color?> </td>
                                    <td><?= $car->cus_name ?></td>
                                    <td><?= $car->order_no; ?></td>
                                    <td><?= $car->head_name; ?></td>
                                    <td><span class="pull-right"><?= number_format($car->total_price,2); ?></span></td>
                                </tr>
                                <?php $total +=$car->total_price;  endforeach; endif; ?>
                            <tr>
                                <th colspan="9"><span class="pull-right" style="font-weight: bold;">Sub total: </span></th>
                                <th><span class="pull-right" style="font-weight: bold;"><?= number_format($total,2);?></span></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




