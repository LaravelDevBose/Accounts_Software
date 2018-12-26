
<div class="row">
    <div class="col-xs-12">

        <!--============Customer Information============ -->
        <!--============Customer Information============ -->
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Add New Account Head Information</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">

                    <div class="row">
                        <div class="col-sm-1"></div>

                        <div class="col-sm-4">

                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-left" for="head_title">Account Head ID:<span class="text-bold text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text"  placeholder="Head ID" readonly value="<?= $head_id; ?>" class="form-control" />
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-left" for="head_title">Head Title:<span class="text-bold text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" id="ah_name" name="ah_name" placeholder="Head Title" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 " for="head_type"></div>
                                <div class="col-sm-8">
                                    <button type="Submit" id="head_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Submit</button>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Account Head Information List</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center"> #</th>
                                <th>Head ID</th>
                                <th>Head Name</th>
                                <th>Action</th>
                                <th style="display:none;"></th>
                                <th style="display:none;"></th>
                                <th style="display:none;"></th>
                            </tr>
                        </thead>

                        <tbody id="tBody">
                        <?php $i=1; if(isset($heads) && $heads): foreach($heads as $head):?>
                            <tr>
                                <td class="center"><?= $i++ ?></td>
                                <td><?= $head->ah_code; ?></td>
                                <td><?= $head->ah_name ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>ie_head/edit/<?= $head->ah_id; ?>" >
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                        <a class="red" href="<?= base_url(); ?>ie_head/delete/<?= $head->ah_id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                                <td style="display:none;"></td>
                                <td style="display:none;"></td>



                            </tr>
                        <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $this->load->view('admin/ajax/account_head_ajax');?>
