<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Ledger Balance Report List</h4>
                <div class="widget-toolbar">

                    <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget-box " >
                                <div class="widget-body" style="background-color: #E7F2F8;">
                                    <div class="widget-main">
                                        <div class="row">
                                            <div class="col-sm-1">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label no-padding-left" for="ah_id">Account Head:<span class="text-bold text-danger">*</span></label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control chosen-select " id="ah_id" required name="ah_id" style="height: 30px; border-radius: 5px;">
                                                            <option value=" ">Select a Account head</option>
                                                            <?php if($account_heads && isset($account_heads)):  foreach($account_heads as $head):?>
                                                                <option value="<?= $head->ah_id; ?>"><?= $head->ah_code.'-'.ucfirst($head->ah_name); ?></option>
                                                            <?php endforeach; endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label no-padding-left" for="date_from"> Date From:<span class="text-bold text-danger">*</span> </label>
                                                    <div class="col-sm-7">
                                                        <input class="form-control date-picker" required id="date_from" name="date_from" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label no-padding-left" for="date_to"> Date To:<span class="text-bold text-danger">*</span> </label>
                                                    <div class="col-sm-7">
                                                        <input class="form-control date-picker" required id="date_to" name="date_to" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-1">
                                                <div class="form-group" >
                                                    <div class="col-sm-8">
                                                        <button type="button" id="ledger_search" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary pull-left">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="data_table">
                        <div id="header" style="display: none;">
                            <?php $this->load->view('admin/partials/print_header');?>
                        </div>
                        <div id="table-header" class="table-header">
                            Leader Report List
                        </div>
                        <table  class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Head Id</th>
                                <th>Head Name</th>
                                <th style="text-align: right;" >Debit Amount</th>
                                <th style="text-align: right;" >Credit Amount</th>
                                <th style="text-align: right;" >Balance</th>
                            </tr>
                            </thead>

                            <tbody id="tBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        
        $('#ledger_search').click(function() {
            ledger_search();
        });

        function ledger_search() {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            var ah_id = $('#ah_id').val();

            if(ah_id == 0 || ah_id == ''){
                alert('Select A Account Head');
                return false;
            }

            $.ajax({
                url:'<?= base_url()?>titu/ledger_result',
                type:'POST',
                dataType:'html',
                data:{ah_id:ah_id,date_from:date_from, date_to:date_to},
                success:function(data){
                    console.log(data);
                    $('#tBody').empty();
                    $('#tBody').html(data);
                },error:function(error){
                    console.log(error);
                }
            });
        }
    });
</script>