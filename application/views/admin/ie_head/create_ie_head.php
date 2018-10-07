
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Income & Expense Head Information</h4>
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
              <div class="col-sm-2"></div>

              <div class="col-sm-4">
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="head_title">Head Title:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" id="head_title" name="head_title" placeholder="Head Title" class="form-control" />
                  </div>
                </div>
                
              </div>

              <div class="col-sm-4">

                <div class="form-group">
                  
                  <div class="col-sm-8">
                    <button type="Submit" id="head_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary cus_submit pull-left">Submit</button>
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

    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>
    <div class="table-header">
      L/C Information List
    </div>

      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center" style="display:none;">
              
            </th>
            <th>SL No</th>
            <th>Head Title</th>
            <th>Action</th>
            <th style="display:none;"></th>
            <th style="display:none;"></th>
            <th style="display:none;"></th>
            
          </tr>
        </thead>

        <tbody id="tBody">
            <?php $i=1; if($ie_heads && isset($ie_heads)): foreach($ie_heads as $ie_head):?>
          <tr>
            <td class="center" style="display:none;">
              
            </td>

            <td><?= $i++; ?></td>
            <td><?= $ie_head->head_title; ?></td>
            <td>
                <div class="hidden-sm hidden-xs action-buttons">
                    <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>ie_head/edit/<?= $ie_head->id; ?>" >
                      <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="<?= base_url(); ?>ie_head/delete/<?= $ie_head->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
                      <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td style="display:none;"></td>
            <td style="display:none;"></td>
            <td style="display:none;"></td>

            
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('admin/ajax/ie_head_ajax');?>
