<div class="row" style="padding-top: 20px;">
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
              <label class="pos-rel">
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
              </label>
            </th>
            <th>SL No</th>
            <th>L/C Number</th>
            <th>Action</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody id="tbody">
            <?php $i=1; if($lc_data && isset($lc_data)): foreach($lc_data as $data):?>
          <tr>
            <td class="center" style="display:none;">
              <label class="pos-rel">
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
              </label>
            </td>

            <td><?= $i++; ?></td>
            <td><?= $data->lc_no; ?></td>
            
            <td>
                <div class="hidden-sm hidden-xs action-buttons">
                    <a class="green" href="" title="Eidt">
                      <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="#" onclick="deleted()">
                      <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>
            </td>
            <td></td>
            <td></td>
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

