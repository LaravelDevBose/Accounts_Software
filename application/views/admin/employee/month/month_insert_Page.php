
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add Sallary Month Information</h4>
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
                  <label class="col-sm-4 control-label no-padding-left" for="year">Year:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select class="chosen-select form-control" id="year" name="year" required  style="height: 30px; border-radius: 5px;">
                      <option value="0">Select a Year</option>
                      <?php $year = date('Y'); $year = $year-2;  for($i = 1; $i <= 5; $i++):?>
                        <option value="<?= $year+$i ?>"><?= $year+$i; ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="month_id">Month Name:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select class="chosen-select form-control" id="month_id" name="month_id" required  style="height: 30px; border-radius: 5px;">
                      <option value="0">Select a Month Name</option>
                      <?php if($month_names && isset($month_names)):  foreach($month_names as $month):?>
                        <option value="<?= $month->id; ?>"><?= $month->month_name; ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>

              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="note">Note: </label>
                  <div class="col-sm-8">
                    <textarea id="note" required name="note" placeholder="Short Note" class="form-control" ></textarea>
                  </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="button" id="month_submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary month_submit">Submit</button>
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
        <h4 class="widget-title">Sallary Month Information List</h4>
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
                <th class="center" style="display:none;"> </th>
                <th>SL No</th>
                <th>Sallay Month Title</th>
                <th>Year</th>
                <th>Month Name</th>
                <th>Note</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody id="tBody">
              <?php $i=1; if($sallary_months && isset($sallary_months)): foreach($sallary_months as $sallary_month):?>
              <tr>
                <td class="center" style="display:none;">
                  
                </td>

                <td><?= $i++; ?></td>
                <td><?= $sallary_month->month_name.' - '.$sallary_month->year; ?></td>
                <td><?= $sallary_month->year; ?></td>
                <td><?= $sallary_month->month_name; ?></td>
                <td><?= $sallary_month->note; ?></td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>month/edit/<?= $sallary_month->id; ?>" >
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="<?= base_url(); ?>month/delete/<?= $sallary_month->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
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
      

<?php $this->load->view('admin/ajax/sallary_month_ajax');?>
