
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New LC Information</h4>
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

              <div class="col-sm-7">
                
                <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-left" for="lc_no"> L/C No. </label>
                  <div class="col-sm-5">
                    <input type="text" id="lc_no" name="lc_no" placeholder="L/C Number" class="form-control" />
                  </div>
                  <div class="col-sm-2">
                    <button type="button" id="lc_submit" class="btn btn-primary btn-sm" style="height: 27px;     padding: 1px 30px;">Submit</button>
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
            <th>L/C Number</th>
            <th>Action</th>
            <th style="display:none;"></th>
            <th style="display:none;"></th>
            <th style="display:none;"></th>
          </tr>
        </thead>

        <tbody id="tBody">
            <?php $i=1; if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
          <tr>
            <td class="center" style="display:none;">
              
            </td>

            <td><?= $i++; ?></td>
            <td><?= $data->lc_no; ?></td>
            <td>
                <div class="hidden-sm hidden-xs action-buttons">
                    <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>lc/edit/<?= $data->id; ?>" >
                      <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="<?= base_url(); ?>lc/delete/<?= $data->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
                      <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>

            <td style="display:none;" class="hidden-480">
              <span class="label label-sm label-info arrowed arrowed-righ"><?php //echo $row->ProductCategory_Name; ?></span>
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
<?php $this->load->view('admin/ajax/lc_ajax');?>
