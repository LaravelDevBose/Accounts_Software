
<div class="row">
  <div class="col-xs-12">

    <form id="CusOrderForm" method="post">  

      <!--============Customer Information============ -->
      <!--============Customer Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Customer Information</h4>
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
                  <label class="col-sm-4 control-label no-padding-left" for="cus_code"> Customer  Code </label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_code" name="cus_code" placeholder="Customer Code" class="form-control" readonly />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_name"> Customer Name </label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_name" name="cus_name" placeholder="Customer Name" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_contact_no"> Contact No </label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_contact_no" name="cus_contact_no" placeholder="Contact No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_contact_no"> Alt. Contact No </label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_contact_no" name="cus_contact_no" placeholder="Alt. Contact No" class="form-control" />
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_entry_date"> Entry Date </label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_entry_date" name="cus_entry_date" placeholder="Entry Date" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="cus_email"> E-mail </label>
                  <div class="col-sm-8">
                    <input type="text" id="cus_email" name="cus_email" placeholder="E-mail" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="supaddress"> Address </label>
                  <div class="col-sm-8">
                    <textarea id="cus_address" name="cus_address" placeholder="Address" class="form-control" ></textarea>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>



      <!--============Order Information============ -->
      <!--============Order Information============ -->
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Order Information</h4>
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
                  <label class="col-sm-4 control-label no-padding-left" for="ord_car_model"> L / C No </label>
                  <div class="col-sm-8">
                    <select class="form-control">
                      <option>Please Select a L / C No</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_car_model"> Car Model </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_car_model" name="ord_car_model" placeholder="Car Model" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_color"> Color </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_color" name="ord_color" placeholder="Color" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_engine_no"> Engine No </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_engine_no" name="ord_engine_no" placeholder="Engine No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_chassis_no"> Chassis No </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_chassis_no" name="ord_chassis_no" placeholder="Chassis No" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_order_no"> Order No </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_order_no" name="ord_order_no" placeholder="Order No" class="form-control" />
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_other_tirm"> Other Tirm </label>
                  <div class="col-sm-8">
                    <textarea id="ord_other_tirm" name="ord_other_tirm" placeholder="Other Tirm" class="form-control" ></textarea>
                  </div>
                </div>

              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_make"> Make </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_make" name="ord_make_model" placeholder="Make" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_grade"> 
                  Grade </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_grade" name="ord_grade" placeholder="Grade" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_type"> 
                  Type </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_type" name="ord_type" placeholder="Type" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_year"> 
                  Year </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_year" name="ord_year" placeholder="Year" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_mileage"> Mileage </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_mileage" name="ord_mileage" placeholder="Mileage" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> Budget Range </label>
                  <div class="col-sm-8">
                    <input type="text" id="ord_budget_range" name="ord_budget_range" placeholder="Budget Range" class="form-control" />
                  </div>
                </div>
                <div class="form-group"><div class="col-sm-12" style="height: 10px;"></div></div>

                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="button" class="btn btn-primary">Submit</button>
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

    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>
    <div class="table-header">
      Brand Information
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
