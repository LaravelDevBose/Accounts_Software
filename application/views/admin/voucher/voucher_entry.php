
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Add New Voucher</h4>
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

                    <form  id="voucher_entry">
                        <div class="row">
                            <div class="col-md-12 alert alert-info">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-left" for="coll_sl">Voucher ID: </label>
                                        <div class="col-sm-8">
                                            <input type="text" id="coll_sl" required name="coll_sl" value="<?= $voucher_id; ?>" readonly class="form-control" placeholder="Collection SL." />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-left" for="date">Created By:<span class="text-bold text-danger">*</span> </label>
                                        <div class="col-sm-7">
                                            <input type="text" value="<?php echo $this->session->userData('name') ?>" readonly class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-left" for="date">Value Date:<span class="text-bold text-danger">*</span> </label>
                                        <div class="col-sm-7">
                                            <input class="form-control date-picker" required id="date" name="value_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label no-padding-left" for="cus_id">Dr. Particulars:<span class="text-bold text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <select class="form-control chosen-select " id="dr_ah_id" required name="dr_ah_id" style="height: 30px; border-radius: 5px;">
                                                    <option value=" ">Select a Particular</option>

                                                    <?php if(isset($heads) && $heads){ foreach($heads as $head){ ?>
                                                        <option value="<?= $head->ah_id ?>"><?= ucfirst($head->ah_name).' - '.$head->ah_code; ?></option>
                                                    <?php } }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-left" for="dr_amount">Dr. Amount: </label>
                                            <div class="col-sm-8">
                                                <input type="number" id="dr_amount" required name="dr_amount" class="form-control" placeholder="0" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-left" for="dr_note">Dr. Note: </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="dr_note" required name="dr_note"  class="form-control" placeholder="Debit note" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label no-padding-left" for="cr_ah_id">Cr. Particulars:<span class="text-bold text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <select class="form-control chosen-select " id="cr_ah_id" required name="cr_ah_id" style="height: 30px; border-radius: 5px;">
                                                    <option value=" ">Select a Particular</option>

                                                    <?php if(isset($heads) && $heads){ foreach($heads as $head){ ?>
                                                        <option value="<?= $head->ah_id ?>"><?= ucfirst($head->ah_name).' - '.$head->ah_code; ?></option>
                                                    <?php } }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-left" for="cr_amount">Cr. Amount: </label>
                                            <div class="col-sm-8">
                                                <input type="number" id="cr_amount" required name="cr_amount"  class="form-control" placeholder="0" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-left" for="cr_note">Cr. Note: </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="cr_note"  name="cr_note"  class="form-control" placeholder="Note" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-4 col-sm-offset-9" style="margin-top: 15px;">
                                <button type="button" style="height: 27px; padding-top: 0px; float: left; margin-right: 5px;  " class="btn btn-primary" id="voucher_save">Save</button>
                                <button type="button" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary" id="voucher_save_print">Save & Print</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/ajax/voucher_ajax');?>
