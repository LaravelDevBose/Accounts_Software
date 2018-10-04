
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

              <div class="col-sm-4">
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="lc_no">L/C No.:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" id="lc_no" name="lc_no" placeholder="L/C Number" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="lc_note">Note: </label>
                  <div class="col-sm-8">
                    <textarea id="lc_note" required name="lc_note" placeholder="Short Note" class="form-control" ></textarea>
                  </div>
                </div>
              </div>

              <div class="col-sm-4">

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="bank_name">Bank Name:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                    <input type="text" id="bank_name"  name="bank_name" required placeholder="Bank Name" class="form-control"  />
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="lc_date"> Date:<span class="text-bold text-danger">*</span> </label>
                  <div class="col-sm-8">
                     <input class="form-control date-picker" required id="lc_date" name="lc_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                  </div>
                </div>

                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="Submit" id="lc_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary cus_submit">Submit</button>
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
            <th>Bank Name</th>
            <th>Date</th>
            <th>Note</th>
            <th>Action</th>
            
          </tr>
        </thead>

        <tbody id="tBody">
            <?php $i=1; if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
          <tr>
            <td class="center" style="display:none;">
              
            </td>

            <td><?= $i++; ?></td>
            <td><?= $data->lc_no; ?></td>
            <td><?= $data->bank_name; ?></td>
            <td><?php 
                  $date = new DateTime($data->lc_date);
                  echo date_format($date, 'd M Y'); 
                ?></td>
            <td><?= $data->lc_note; ?></td>
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

            
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('admin/ajax/lc_ajax');?>