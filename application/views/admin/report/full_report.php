<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header"> 
        <h4 class="widget-title">Car Full Report List</h4>
        <div class="widget-toolbar">

          <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
        </div>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            <div class="col-md-12">
              <div class="widget-box " >
                <div class="widget-body" style="background-color: #E7F2F8;">
                  <div class="widget-main">
                    <div class="row">
    
                      <div class="col-sm-1"></div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label class="col-sm-5 control-label no-padding-left" for="order_id">Chassis Number:<span class="text-bold text-danger">*</span></label>
                          <div class="col-sm-7">
                            <select class="chosen-select form-control" id="order_id" required name="cus_id" style="height: 30px; border-radius: 5px;">
                              <option value=" ">Select a Chassis Number</option>
                              <?php if($orders && isset($orders)):  foreach($orders as $order):?>
                                <option value="<?= $order->id; ?>"><?= $order->ord_chassis_no; ?></option>
                              <?php endforeach; endif; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group" >
                          <div class="col-sm-8">
                            <button type="button" id="report_search" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ">Search</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div id="data_table" class="row">
            <div id="header" style="display: none;">
              <?php $this->load->view('admin/partials/print_header');?>
            </div>
            <div id="rBody">
              
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> 
</div>


<script>
  $('#report_search').on('click', function(){
    var order_id = $('#order_id').val();

    if(order_id >= 1){
      $.ajax({
        url:'<?= base_url(); ?>find/full_report/'+order_id,
        type:'POST',
        dataType:'html', 
        success:function(data){
          $('#rBody').empty();

          if(data != 0){
                $('#rBody').html(data);
          }else{
            swal({
                    text: "No Data Found..!",
                    icon: "info",
                    buttons: false,
                    timer: 1500,
                  });
          }
        },error:function(error){
          console.log(error);
              swal({
                      text: "Searching Unsuccessfull..! Some Error Found",
                      icon: "error",
                      buttons: true,
                      timer: 2500,
                  });
        }
      });
    }else{
      swal({
              text: "Pleass Select Chassis No First",
              icon: "warning",
              buttons: false,
              timer: 1500,
            });
    }
  });
</script>
