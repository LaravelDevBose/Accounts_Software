<style type="text/css">
  .header{
    /*border: 1px solid;*/
    width: 100%;
    height: 150px;
    margin-top: 0px;
  }
  .img{
    height: 120px;
    width: 220px;
    margin-top: 0px;
    /*border: 1px solid;*/
  }
  .section3{
    /*border: 1px solid;*/
    height: 150px;
  }
  .section12{
    height: 130px;
    width: 100%;
    margin-top: 5px;
    border-radius: 5px;
    background-color: #A7ECFB;
    border: 1px solid #0A829B;
  }
  .logo{
    /*border: 1px solid;*/
    height: 75px;
    width: 100%;
    font-size: 60px;
    text-align: center;
    margin-top: 5px;
  }
  .textModule{
    height: auto;
    width: 100%;
    margin-top: 15px;
    font-weight: bold;
    font-size: 17px;
    color: #000;
    text-align: center;
  }
</style>

<style type="text/css">
  .header{
    /*border: 1px solid;*/
    width: 100%;
    height: 150px;
  }
  .img{
    height: 100px;
    width: 280px;
    margin-top: 10px;
    /*border: 1px solid;*/
  }
  .txtBody{
    height: auto;
    width: 100%;
    margin-top: 5px;
    font-weight: bold;
    font-size: 70px;
    color: #1A7EB0;
    text-align: center;
  }
  a{
    color:#333;
  }
  
</style>

<div class="row">
  <div class="col-md-12 col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <!-- Header Logo -->
        <div class="col-md-12 header">
          <?php 

              $logo = $this->Setting_model->get_company_info('logo'); 
              $image = base_url().$logo;  
                if(!file_exists($image) && !getimagesize($image) ){ 
                    $image =base_url().'libs/logo_image/acc.png';
                  }
            ?>
          
          <img src="<?php echo base_url().'libs/logo_image/maven.jpg'; ?>" class="img img-responsive center-block">
        </div>
        
        <?php if($access->sale_module == 1){ ?>
        <div class="col-md-3 section3">
          <div class="col-md-12 section12">
          <a href="<?php echo base_url(); ?>order/dashboard">
            <div class="logo">
              <i class="fa fa-shopping-bag"></i>
            </div>
            <div class="textModule">
              Sales Module
            </div>
            </a>
          </div>
        </div>
        <?php } if($access->purchase_module ==1){ ?>
        <div class="col-md-3 section3">
          <div class="col-md-12 section12">
          <a href="<?php echo base_url(); ?>purchase/dashboard">
            <div class="logo">
              <i class="fa fa-cart-arrow-down"></i>
            </div>
            <div class="textModule">
              Purchase Module
            </div>
            </a>
          </div>
        </div>
        <?php } if($access->account_module ==1){ ?>
        <div class="col-md-3 section3">
          <div class="col-md-12 section12">
          <a href="<?php echo base_url(); ?>account/dashboard">
            <div class="logo">
              <i class="fa fa-clipboard"></i>
            </div>
            <div class="textModule">
              Accounts Module
            </div>
            </a>
          </div>
        </div>
        <?php } if($access->hr_module ==1){ ?>
        <div class="col-md-3 section3">
          <div class="col-md-12 section12">
          <a href="<?php echo base_url(); ?>hr_payroll/dashboard">
            <div class="logo">
              <i class="fa fa-users"></i>
            </div>
            <div class="textModule">
              HR & Payroll Module
            </div>
            </a>
          </div>
        </div>
        <?php } if($access->report_module ==1){ ?>
        <div class="col-md-3 section3">
          <div class="col-md-12 section12">
          <a href="<?php echo base_url(); ?>report/dashboard">
            <div class="logo">
              <i class="fa fa-print"></i>
            </div>
            <div class="textModule">
              Reports Module
            </div>
            </a>
          </div>
        </div>
        <?php } if($access->administration ==1){ ?>
        <div class="col-md-3 section3">
          <div class="col-md-12 section12">
          <a href="<?php echo base_url(); ?>administration/dashboard">
            <div class="logo">
              <i class="fa fa-cogs"></i>
            </div>
            <div class="textModule">
              Administration
            </div>
            </a>
          </div>
        </div>
        <?php } ?>
        <div class="col-md-3 section3">
          <div class="col-md-12 section12">
          <a href="<?php echo base_url(); ?>Adminlogin/logout">
            <div class="logo">
              <i class="fa fa-sign-out"></i>
            </div>
            <div class="textModule">
              LogOut
            </div>
            </a>
          </div>
        </div>
      </div>
      

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->