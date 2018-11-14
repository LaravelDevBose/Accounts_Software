<div style="width: 100%; height: 145px; padding: 15px 7%; border-bottom: 1px solid #000;">
	<div style="width: 22%!important; float: left;  height: auto; text-align: center;">
		<?php 
			$cmp_name = $this->Setting_model->get_company_info('cmp_name');
			$cmp_adds = $this->Setting_model->get_company_info('cmp_adds');
			$cmp_phn = $this->Setting_model->get_company_info('cmp_phn');
			$cmp_eml = $this->Setting_model->get_company_info('cmp_eml');

            $logo = $this->Setting_model->get_company_info('logo'); 
            $image = base_url().$logo;  
              if(!file_exists($image) && !getimagesize($image) ){ 
                  $image =base_url().'libs/upload_pic/no.png';
                }
          ?>
        <img src="<?= $image ?>" alt="" style="height: auto; width: 80px; display: block;" >
        <small >www.maven-autos.com</small>
	</div>
	<div style="padding: 0 30px; width: 60%; height: auto; display: block; text-align: center; float: left;">
		<h3 style="margin-top: 0px; margin-bottom: 0px; font-size: 30px; font-weight: 900;"><?php if(isset($cmp_name) && $cmp_name){echo $cmp_name; }?></h3>
		<p style="margin-bottom: 0px; font-size: 12px;"><?php if(isset($cmp_adds) && $cmp_adds){echo $cmp_adds; }?></p>
		<p style="margin-bottom: 0px; font-size: 12px;"><?php if(isset($cmp_phn) && $cmp_phn){echo $cmp_phn; }?></p>
		<p style="margin-bottom: 0px; font-size: 12px;"><?php  if(isset($cmp_eml) && $cmp_eml){echo $cmp_eml; }?></p>
		<p style="text-decoration: underline;"><span ><?php if(isset($title)): echo $title; endif; ?></span></p>
	</div>
	<div style="padding: 10px 0px; width: 18%; height: auto; float: right;">
		
		<p style="font-size: 13px;">Date: <?= date('d/m/Y')?></p>
	</div>
</div>