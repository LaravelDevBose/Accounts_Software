
<form id="CusOrderForm" method="post" action="<?= base_url(); ?>insurance_update/<?= $company->in_comp_id?>">
    <div class="widget-box" style="width: 450px">
        <div class="widget-header">
            <h4 class="widget-title">Update Insurance Company Information</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main">

                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_comp_name">Company Name:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <input type="text" id="in_comp_name" name="in_comp_name" value="<?= $company->in_comp_name?>" required placeholder="Company  Name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="owner_name">Owner Name:</label>
                            <div class="col-sm-7">
                                <input type="text" id="owner_name" name="owner_name" value="<?= $company->owner_name?>"  placeholder="Owner  Name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_comp_phone"> Contact No:</label>
                            <div class="col-sm-7">
                                <input type="number" id="in_comp_phone" name="in_comp_phone" value="<?= $company->in_comp_phone?>"  placeholder="Contact No" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_comp_email"> Email Address:</label>
                            <div class="col-sm-7">
                                <input type="email" id="in_comp_email" name="in_comp_email" value="<?= $company->in_comp_email?>" placeholder="Email Address" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-left" for="in_comp_address"> Address:<span class="text-bold text-danger">*</span> </label>
                            <div class="col-sm-7">
                                <textarea id="in_comp_address"  name="in_comp_address" placeholder="Address" class="form-control" ><?= $company->in_comp_address?></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10px;">
                            <label class="col-sm-5 control-label no-padding-left" for="ord_budget_range"> </label>
                            <div class="col-sm-7">
                                <button type="Submit" class="btn btn-primary cus_submit pull-right">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
