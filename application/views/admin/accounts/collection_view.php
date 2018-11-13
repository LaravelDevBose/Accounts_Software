<div class="widget-box" style="width: 500px;">
    <div class="widget-header">
        <h4 class="widget-title">View Collection Information</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">


            <div class="row">
                <div class="col-xs-12">
                    <table  class="table table-striped table-bordered table-hover">
                        <tbody id="tBody">
                        <tr>
                            <th>Collection SL: </th>
                            <td><?= $collection->coll_sl ?></td>
                        </tr>
                        <tr>
                            <th>Date: </th>
                            <td>
                                <?php
                                $date = new DateTime($collection->date);
                                echo date_format($date, 'd M Y');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Customer Name: </th>
                            <td><?= $collection->cus_name ?></td>
                        </tr>
                        <tr>
                            <th>Order NO.: </th>
                            <td><?= $collection->order_no ?></td>
                        </tr>
                        <tr>
                            <th>Collection Type: </th>
                            <td> <?php if($collection->collection_type ==1 ): echo 'Advance'; elseif($collection->collection_type ==2): echo 'Part'; elseif($collection->collection_type ==3): echo 'Full Payment'; elseif($collection->collection_type ==4): echo 'Cheque'; endif; ?></td>
                        </tr>
                        <?php if($collection->collection_type ==4):?>
                        <tr>
                            <th>Cheque No: </th>
                            <td><?= $collection->cheque_no ?></td>
                        </tr>
                        <tr>
                            <th>Sallary: </th>
                            <td><?= $collection->bank_name ?></td>
                        </tr>
                        <?php endif;?>
                        <tr>
                            <th>Amount: </th>
                            <td><?= number_format($collection->amount, 2) ?></td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td><?= $collection->description?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>