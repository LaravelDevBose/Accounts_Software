
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div>
            <ul class="ace-thumbnails clearfix">
                <?php if(isset($images)&& $images): foreach($images as $image):?>
                <li>
                    <?php
                    $image = base_url().$image->image_path;
                    if(!file_exists($image) && !getimagesize($image) ){
                        $image =base_url().'libs/upload_pic/no.png';
                    }
                    ?>
                    <a href="<?= $image ?>" data-rel="colorbox">
                        <img width="150" height="150" alt="150x150" src="<?= $image ?>" />
<!--                        <div class="text">-->
<!--                            <div class="inner">Sample Caption on Hover</div>-->
<!--                        </div>-->
                    </a>
                </li>
                <?php endforeach; endif; ?>
            </ul>
        </div><!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->