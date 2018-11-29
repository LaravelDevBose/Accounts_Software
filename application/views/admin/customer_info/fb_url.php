<div class="widget-box" style="width:500px; height: 150px;">
    <div class="widget-header">
        <h4 class="widget-title">Customer Fb Url</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main" style="padding-top: 30px;">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-left" for="head_title">FB Url:<span class="text-bold text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" id="fb_url"  required  placeholder="Customer Facebook Url" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group" >
                        <div class="col-sm-12">
                            <button type="Submit" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary fb_url_button">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.fb_url_button').click(function() {
        var fb_url = $('#fb_url').val();
        $('#cus_fb').val(fb_url);
        $.fancybox.close();
    });
</script>



