
<div class="row">
  <div class="col-xs-12">

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Add New Collection</h4>
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
            
            <form id="collection_entry" >
              <div class="row">
                <div class="col-sm-2">
                  <input type="hidden" name="enty_type" value="1">
                  <input type="hidden" name="account_type" value="c_enty">
                  <input type="hidden" name="status" value="a">
                </div>

                <div class="col-sm-4">
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="ie_head">IE Head:<span class="text-bold text-danger">*</span></label>
                    <div class="col-sm-8">
                      <select class="form-control select-chosen" id="ie_head" name="ie_head" style="height: 30px; border-radius: 5px;">
                        <option value=" ">Select a head</option>
                        <?php if($ie_heads && isset($ie_heads)):  foreach($ie_heads as $head):?>
                          <option value="<?= $head->id; ?>"><?= ucfirst($head->head_title); ?></option>
                        <?php endforeach; endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="description">Note: </label>
                    <div class="col-sm-8">
                      <textarea id="description" name="description" placeholder="Short Note" class="form-control" ></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="date"> Date:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-8">
                       <input class="form-control date-picker" required id="date" name="date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-left" for="amount"> Amount:<span class="text-bold text-danger">*</span> </label>
                    <div class="col-sm-8">
                       <input type="number" id="amount" required name="amount" class="form-control" placeholder="Enter The Amount" />
                    </div>
                  </div>

                  <div class="form-group" style="margin-top: 10px;">
                    <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                    <div class="col-sm-8">
                      <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary ">Submit</button>
                    </div>
                  </div>


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

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Collection Information List</h4>
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
                <th>IE Head</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Action</th>
                
              </tr>
            </thead>

            <tbody id="tBody">
                <?php $i=1; if($c_entys && isset($c_entys)): foreach($c_entys as $data):?>
              <tr>
                <td class="center" style="display:none;"> </td>

                <td><?= $i++; ?></td>
                <td><?= $data->head_title; ?></td>
                <td>
                  <?php 
                    $date = new DateTime($data->date);
                    echo date_format($date, 'd M Y'); 
                  ?> 
                </td>
                <td><?= number_format($data->amount) ?></td>
                <td><?= $data->description; ?></td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>collection/edit/<?= $data->id; ?>" >
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="<?= base_url(); ?>collection/delete/<?= $data->id?>" onclick="confirm('Are You Sure Went to Delete This! ')">
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

<?php $this->load->view('admin/ajax/accounts_ajax');?>
