<div class="widget-box" style="width: 500px;">
    <div class="widget-header">
      <h4 class="widget-title">Update Salary Month Information</h4>
    </div>

    <div class="widget-body">
      <div class="widget-main">
		<form action="<?= base_url()?>month/update/<?= $sallary_month->id; ?>" method="POST">
            <div class="row">
			  <div class="col-md-2"></div>
              <div class="col-sm-8">
                
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="e_year">Year:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-7">
                    <select class="chosen-select form-control" id="e_year" name="year" required  style="height: 30px; border-radius: 5px;">
                      <option value="0">Select a Year</option>
                      <?php $year = date('Y'); $year = $year-2;  for($i = 1; $i <= 5; $i++):?>
                        <option value="<?= $year+$i ?>" <?= ($year+$i == $sallary_month->year)?'selected':'' ?>><?= $year+$i; ?></option>
                      <?php endfor; ?>
                    </select>
                    <span id="msg1" style="color: red; display: none;">This Field Is Required</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="e_month_id">Month Name:<span class="text-bold text-danger">*</span></label>
                  <div class="col-sm-7">
                    <select class="chosen-select form-control" id="e_month_id" name="month_id" required  style="height: 30px; border-radius: 5px;">
                      <option value="0">Select a Month Name</option>
                      <?php if($month_names && isset($month_names)):  foreach($month_names as $month):?>
                        <option value="<?= $month->id; ?>" <?= ($month->id == $sallary_month->month_id)?'selected':'' ?> ><?= $month->month_name; ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                    <span id="msg2" style="color: red; display: none;">This Field Is Required</span>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-5 control-label no-padding-left" for="note">Note: </label>
                  <div class="col-sm-7">
                    <textarea id="note"  name="note" placeholder="Short Note" class="form-control" ><?= $sallary_month->note ?></textarea>
                  </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                  <label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
                  <div class="col-sm-8">
                    <button type="submit" id="month_update" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary month_submit">Update</button>
                  </div>
                </div>


              </div>

            </div>
        </form>
      </div>
    </div>
  </div>

<script>
	
	$('#month_update').on('click', function(){
		var year = $('#e_year').val();
		var month_id = $('#e_month_id').val();
		if(year <=0 && month_id <= 0){

			$('#msg1').css('display', 'block');
			$('#msg2').css('display', 'block');
			return false;
		}else if(year <= 0){
			$('#msg1').css('display', 'block');
			return false;
		}else if(month_id <= 0){
			$('#msg2').css('display', 'block');
			return false;
		}else{
			return true;
		}
	});
</script>

