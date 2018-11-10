<div class="row">
    <div class="col-xs-12">

        <!--============Customer Information============ -->
        <!--============Customer Information============ -->
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Add New Bank Account</h4>
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

                    <form id="payment_entry" action="<?= base_url()?>bank/store" method="POST" >
                        <div class="row">
                            <div class="col-sm-1"></div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="bank_name">Bank Name:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="bank_name" required name="bank_name"  class="form-control" placeholder="Bank Name" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="branch_name">Branch Name:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="branch_name" required name="branch_name"  class="form-control" placeholder="Branch Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="account_no">Account No:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="account_no" required name="account_no" class="form-control" placeholder="Account Number" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="opening_date">Opening Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control date-picker" required id="opening_date" name="opening_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="current_balance">Current Balance:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="current_balance" required name="current_balance" class="form-control" placeholder="Current Balance" />
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12">

        <!--============Customer Information============ -->
        <!--============Customer Information============ -->
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Bank Information List</h4>
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
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bank Name</th>
                            <th>Branch Name</th>
                            <th>Account No</th>
                            <th>Opening Date</th>
                            <th>Balance</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php $i=1; if(isset($banks) && $banks ): foreach($banks as $bank):?>
                            <tr>
                                <td class="center"><?= $i++ ?> </td>

                                <td><?= ucfirst($bank->bank_name) ?></td>
                                <td><?= ucfirst($bank->branch_name) ?></td>
                                <td><?= $bank->account_no; ?></td>
                                <td>
                                    <?php
                                    $date = new DateTime($bank->opening_date);
                                    echo date_format($date, 'd M Y');
                                    ?>
                                </td>
                                <td><?= number_format($bank->current_balance) ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>bank/edit/<?= $bank->id; ?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>bank/delete/<?= $bank->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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

