<div class="widget-box" style="width: 500px; height: 400px">
    <div class="widget-header">
      <h4 class="widget-title">Update Transport Location Information</h4>
    </div>

    <div class="widget-body">
      	<div class="widget-main">
			<form action="<?= base_url()?>trans/status/update" method="POST">
            	<div class="row">
					<input type="hidden" name="purchase_id" value="<?= $id; ?>">
              		<div class="col-sm-10">
                		<div class="form-group">
		                  	<label class="col-sm-4 control-label no-padding-left" for="trans_head_id">Transport Head</label>
		                  	<div class="col-sm-7">
			                    <select class="chosen-select form-control" id="trans_head_id" name="trans_head_id" style="height: 30px; border-radius: 5px;">
			                      	<option value="0">Select a Location</option>
			                      	<?php if($trans_heads && isset($trans_heads)):  foreach($trans_heads as $head):?>
			                        	<option value="<?= $head->id; ?>"><?= ucfirst($head->head_name); ?></option>
			                      	<?php endforeach; endif; ?>
			                    </select>
			                    <span class="text-danger text text-bold" id="msg" style="display: none;">Transport Head is Required</span>
		                  	</div>
                            <div class="col-sm-1" style="padding: 0;">
                                <a href="<?= base_url('transport/head')?>" title="Add New Transport Head" class="btn btn-xs btn-danger" style="height: 25px; border: 0; width: 27px; margin-left: -10px;" target="_blank" ><i class="fa fa-plus" aria-hidden="true" style="margin-top: 5px;"></i></a>
                            </div>
		                </div>
                		<div class="form-group">
		                  	<label class="col-sm-4 control-label no-padding-left" for="trans_date"> Date:<span class="text-bold text-danger">*</span> </label>
		                  	<div class="col-sm-8">
		                     	<input type="text" id="trans_date" name="trans_date" value="<?= date('Y-m-d') ?>" required class="form-control date-picker" data-date-format="yyyy-mm-dd" />
		                  	</div>
		                </div>
              
		                <div class="form-group" style="margin-top: 10px;">
		                  	<label class="col-sm-4 control-label no-padding-left" for="ord_budget_range"> </label>
		                  	<div class="col-sm-8">
		                    	<button type="Submit" id="head_update" style="height: 27px; padding-top: 0px; float: right; " class="btn btn-primary">Update</button>
		                  	</div>
		                </div>
              		</div>
            	</div>
        	</form>
      	</div>
    </div>
</div>

<script>
	$( document ).ready(function() {
		var config = {
			     '.chosen-select'           : {},
			     '.chosen-select-deselect'  : {allow_single_deselect:true},
			     '.chosen-select-no-single' : {disable_search_threshold:10},
			     '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			     '.chosen-select-width'     : {width:"95%"}
			}
			for (var selector in config) {
				$(selector).chosen(config[selector]);
			}


	    $('#head_update').on('click', function(){
			var trans_head_id = $('#trans_head_id').val();

			if(trans_head_id == ''|| trans_head_id <=0 ){

				$('#msg').css('display', 'block');
				return false;
			}else{
				return true; 
			}
		});

	    $('.date-picker').datepicker({
	        autoclose: true,
	        todayHighlight: true
	    });
	});
	
  </script>

