<div class="widget-box" style="width:500px;">
        <div class="widget-header">
          <h4 class="widget-title">Update IE Head Information</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
			<form action="<?= base_url()?>ie_head/update/<?= $ie_head->id; ?>" method="POST">
	            <div class="row">

	              <div class="col-sm-8">
	                
	                <div class="form-group">
	                  <label class="col-sm-4 control-label no-padding-left" for="head_title">Head Title:<span class="text-bold text-danger">*</span></label>
	                  <div class="col-sm-8">
	                    <input type="text" id="head_title" name="head_title" required value="<?= $ie_head->head_title ?>" placeholder="Head Title" class="form-control" />
	                    <span class="text text-danger text-bold" id="msg" style="display: none;">Head Title is required</span>
	                  </div>
	                </div>
	                
	              </div>

	              <div class="col-sm-4">
	                <div class="form-group" >
	                  
	                  <div class="col-sm-12">
	                    <button type="Submit" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ie_update">Update</button>
	                  </div>
	                </div>


	              </div>

	            </div>
            </form>
          </div>
        </div>
      </div>



