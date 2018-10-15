<div class="widget-box" style="width: 700px;">
        <div class="widget-header">
          <h4 class="widget-title">Update LC Information</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
			<form action="<?= base_url()?>lc/update/<?= $lc->id; ?>" method="POST">
	            <div class="row">

	              <div class="col-sm-6">
	                
	                <div class="form-group">
	                  <label class="col-sm-4 control-label no-padding-left" for="lc_no">L/C No.:<span class="text-bold text-danger">*</span></label>
	                  <div class="col-sm-8">
	                    <input type="text" id="lc_no" name="lc_no" value="<?= $lc->lc_no ?>" placeholder="L/C Number" class="form-control" />
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label class="col-sm-4 control-label no-padding-left" for="lc_note">Note: </label>
	                  <div class="col-sm-8">
	                    <textarea id="lc_note" required name="lc_note" placeholder="Short Note" class="form-control" ><?= $lc->lc_note; ?></textarea>
	                  </div>
	                </div>
	              </div>

	              <div class="col-sm-6">

	                <div class="form-group">
	                  <label class="col-sm-4 control-label no-padding-left" for="bank_name">Bank Name:<span class="text-bold text-danger">*</span> </label>
	                  <div class="col-sm-8">
	                    <input type="text" id="bank_name" value="<?= $lc->bank_name ?>"  name="bank_name" required placeholder="Bank Name" class="form-control"  />
	                  </div>
	                </div>


	                <div class="form-group">
	                  <label class="col-sm-4 control-label no-padding-left" for="lc_date"> Date:<span class="text-bold text-danger">*</span> </label>
	                  <div class="col-sm-8">
	                     <input class="form-control date-picker" value="<?= $lc->lc_date ?>" required id="lc_date" name="lc_date" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
	                  </div>
	                </div>

	                <div class="form-group" style="margin-top: 10px;">
	                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
	                  <div class="col-sm-8">
	                    <button type="Submit" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary cus_submit">Update</button>
	                  </div>
	                </div>


	              </div>

	            </div>
            </form>
          </div>
        </div>
      </div>

<script>
	
	$('#lc_update').on('click', function(){
		var lc_no = $('#u_lc_no').val();
		alert(lc_no);
		if(lc_no == ''|| lc_length <=0 ){

			$('#msg').css('display', 'block');
			return false;
		}else{
			return true; 
		}
	});

    $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
  </script>

