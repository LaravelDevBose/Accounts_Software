
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Car Purchase Information List</h4>
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
                                    <th>Pus SL.</th>
                                    <th>Supplier Name</th>
                                    <th>Customer Name</th>
                                    <th>L/C No</th>
                                    <th>Engine No || Chassis No</th>
                                    <th>Estimate Price</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody id="tBody">
                                <?php  $i=1; if($purchases && isset($purchases)): foreach($purchases as $purchase):?>
                                    <tr>

                                        <td><?= $purchase->pus_sl ?></td>
                                        <td><?= $purchase->sup_name ?></td>
                                        <td><?= $purchase->cus_name ?></td>
                                        <td><?= $purchase->lc_no ?></td>
                                        <td><?= $purchase->puc_engine_no.'||'.$purchase->puc_chassis_no; ?></td>
                                        <td><?= number_format($purchase->total_price,2); ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">

                                                <a style="color: #04921c;" title="Price" href="<?= base_url();?>pricing/purchase/<?= $purchase->id;?>" >
                                                    <i class="ace-icon fa fa-usd bigger-130" ></i>
                                                </a>

                                                <a style="color: #F89406;" title="View" href="<?= base_url();?>purchase/view/<?= $purchase->id;?>" >
                                                    <i class="ace-icon fa fa-eye bigger-130" ></i>
                                                </a>

                                                <a class="info" title="Edit" href="<?= base_url();?>purchase/edit/<?= $purchase->id;?>" >
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                                <a class="red" title="Delete" href="<?= base_url(); ?>purchase/delete/<?= $purchase->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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





