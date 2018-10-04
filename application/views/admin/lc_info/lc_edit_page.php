<div class="widget-box" style="width: 500px;">
        <div class="widget-header">
          <h4 class="widget-title">Update LC Information</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
			<form action="<?= base_url()?>lc/update/<?= $lc->id; ?>" method="POST">
	            <div class="row">
	              <div class="col-sm-12">
	                <div class="form-group">
	                  <label class="col-sm-2 control-label no-padding-left" for="lc_no"> L/C No. </label>
	                  <div class="col-sm-5">
	                    <input type="text" id="u_lc_no" name="lc_no" value="<?= $lc->lc_no; ?>" placeholder="L/C Number" class="form-control" />
	                    <span class="text-bold text-danger" id="msg" style="display: none;">L/C Number is Required </span>
	                  </div>
	                  <div class="col-sm-2">
	                    <button type="submit" id="lc_update"  class="btn btn-primary btn-sm" style="height: 27px;     padding: 1px 30px;">Update</button>
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
</script>

