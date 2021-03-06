
<div class="row">
    <div class="col-xs-12">

        <!--============Customer Information============ -->
        <!--============Customer Information============ -->
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Add Bank Transaction</h4>
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

                    <form id="bank_trans_entry" action="<?= base_url();?>bank_trans/store" method="POST" >
                        <div class="row">
                            <div class="col-sm-2">

                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="trans_id">Transaction Id: </label>
                                    <div class="col-sm-7">
                                        <input type="hidden" name="lc_id" id="lc_id">
                                        <input type="text" id="trans_id" required name="trans_id" value="<?= $trans_id; ?>" readonly class="form-control" placeholder="Transaction Id" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="trans_type">Transaction Type:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control chosen-select" id="trans_type" onchange="check_bank_banlance()" required name="trans_type" style="height: 30px; border-radius: 5px;">
                                            <option value="D">Deposit</option>
                                            <option value="W">Withdrawal</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="bank_id">Bank Info:<span class="text-bold text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control chosen-select" id="bank_id" onchange="check_bank_banlance()"  name="bank_id" style="height: 30px; border-radius: 5px;">
                                            <option value="">Select a Bank</option>
                                            <?php if(isset($banks)&& $banks): foreach($banks as $bank):?>
                                            <option value="<?= $bank->id; ?>"><?= $bank->bank_name.'-'.$bank->account_no; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>

                                    </div>
                                    <div class="col-sm-1" style="padding: 0;">
                                        <a href="<?= base_url('bank/insert')?>" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" title="Add New Bank Account"><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="trans_date"> Date:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control date-picker" required id="trans_date" name="trans_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="number" id="amount" required name="amount" oninput="check_bank_banlance()" class="form-control" placeholder="Enter The Amount" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="note">Description: </label>
                                    <div class="col-sm-8">
                                        <input type="text" id="note"  name="note" class="form-control" placeholder="Short Description" />
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " onclick=" return check_bank_banlance();" class="btn btn-primary trans_submit ">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                                <p style="text-align: center; font-size: 17px; color: blue; ">Current Balance: <span id="total_amount" style="font-size: 22px; font-weight: 800">00.00</span> TK</p>
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
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Bank Transaction Information List</h4>
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
                            <th>Trans. Id</th>
                            <th>Trans. Date</th>
                            <th>Bank Info </th>
                            <th>Trans. Type</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php  if(isset($trans) && $trans): foreach($trans as $data):?>
                            <tr>
                                <td><?= $data->trans_id; ?></td>
                                <td>
                                    <?php
                                    $date = new DateTime($data->trans_date);
                                    echo date_format($date, 'd M Y');
                                    ?>
                                </td>
                                <td><?= ucfirst($data->bank_name).'-'.$data->branch_name ?> <br> AC. NO- <?= $data->account_no; ?> </td>
                                <td><?php if($data->trans_type == 'D'){ ?>
                                    <span class="label label-success">Deposit</span>
                                    <?php }else{?>
                                    <span class="label label-warning">Withdrawal</span>
                                    <?php }?>
                                </td>
                                <td><?= number_format($data->amount) ?></td>
                                <td><?= $data->note; ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>bank_trans/edit/<?= $data->id; ?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>bank_trans/delete/<?= $data->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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

<script>
    $('document').ready(function(){

        $('#bank_id').change(function(e){

            var bank_id = e.target.value;
            $('#total_amount').html('00.00');

            if(bank_id != 0 && bank_id != ''){
                $.ajax({
                    url:'<?= base_url()?>find/bank_current_balance/'+bank_id,
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                        if(data != 0){
                            $('#total_amount').html(data);
                        }else{
                            swal({
                                text: "No Data Found!",
                                icon: "warning",
                                buttons: false,
                                timer: 1500,
                            });
                        }
                    },error:function(error){
                        console.log(error);
                        swal({
                            text: "Some thing Wrong...!",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                });
            }else{
                swal({
                    text: "Select a Bank Amount First..!",
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
            }
        });
    });

    function check_bank_banlance() {

        var amount = $('#amount').val();
        var total_amount = parseInt($('#total_amount').html());
        var trans_type = $('#trans_type').val();

        if(amount > 0 && trans_type == 'W'){
            if(amount > total_amount){
                alert('Withdraw Amount is Grater than Current Balance');
                $('#note').focus();
                return false;
            }
        }


    }
</script>

