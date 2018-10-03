
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
                  <label class="col-sm-2 control-label no-padding-left" for="cus_name"> L/C No. </label>
                  <div class="col-sm-5">
                    <input type="text" id="cus_name" name="cus_name" placeholder="Customer Name" class="form-control" />
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-primary btn-sm" style="height: 27px;     padding: 1px 30px;">Submit</button>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
  </div>  
</div>



      
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
            <th>Brand Name</th>
            <th class="hidden-480">Description</th>

            <th>Action</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="center" style="display:none;">
              <label class="pos-rel">
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
              </label>
            </td>

            <td></td>
            <td><a href="#"></a></td>
            <td class="hidden-480"></td>
            <td>
            <div class="hidden-sm hidden-xs action-buttons">
                <a class="blue" href="#">
                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                </a>

                <a class="green" href="" title="Eidt">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>

                <a class="red" href="#" onclick="deleted()">
                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
              </div>
            </td>

            <td class="hidden-480">
              <span class="label label-sm label-info arrowed arrowed-righ"><?php //echo $row->ProductCategory_Name; ?></span>
            </td>

            <td></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
