
<div class="row">
    <div class="col-xs-12">
        <form id="CusOrderForm" method="post" action="<?= base_url('insurance_store'); ?>">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Add New Insurance Company Information</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="in_comp_name">Company Name:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" id="in_comp_name" name="in_comp_name" required placeholder="Company  Name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="owner_name">Owner Name:</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="owner_name" name="owner_name"  placeholder="Owner  Name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label no-padding-left" for="in_comp_phone"> Contact No:</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="in_comp_phone" name="in_comp_phone"  placeholder="Contact No" class="form-control" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="in_comp_email"> Email Address:</label>
                                    <div class="col-sm-8">
                                        <input type="email" id="in_comp_email" name="in_comp_email" placeholder="Email Address" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-left" for="in_comp_address"> Address:<span class="text-bold text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <textarea id="in_comp_address"  name="in_comp_address" placeholder="Address" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                                    <div class="col-sm-8">
                                        <button type="Submit" class="btn btn-primary cus_submit pull-right">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Insurance Company Information List</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">


                    <div class="row">
                        <div class="col-xs-12">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="">#</th>
                                        <th>Company Name</th>
                                        <th>Owner Name</th>
                                        <th>Contact No.</th>
                                        <th>Email Address</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="tBody">
                                <?php $i=1;  if(isset($companies) && $companies): foreach($companies as $company):?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $company->in_comp_name ?></td>
                                        <td><?= $company->owner_name ?></td>
                                        <td><?= $company->in_comp_phone ?></td>
                                        <td><?= $company->in_comp_email ?> </td>
                                        <td><?= $company->in_comp_address; ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green linka fancybox fancybox.ajax " href="<?= base_url();?>insurance_edit/<?= $company->in_comp_id;?>" >
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                                <a class="red" href="<?= base_url(); ?>insurance_delete/<?= $company->in_comp_id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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



