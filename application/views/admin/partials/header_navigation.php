<body class="skin-2">
  <style>
    .sidebar.h-sidebar .nav-list>li>a{
        line-height: 40px;
        height: auto;
        padding: 5px 14px;
    }
    .ace-nav>li {
      line-height: 52px;
      height: 55px;
    }
  </style>
    <div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top" style="background:#438EB9 !important;">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
          <a href="<?php echo base_url(); ?>" class="navbar-brand" >
            <small>
              <?php 
                $logo = $this->Setting_model->get_company_info('logo'); 
                $image = base_url().$logo;  
                  if(!file_exists($image) && !getimagesize($image) ){ 
                      $image =base_url().'libs/upload_pic/no.png';
                    }
              ?>
              <img src="<?= $image ?>" alt="" style="height: 35px; width: 35px; border-radius: 50%" >
               Maven Auto 
            </small>
          </a>
          
        </div>
        
        <div class="navbar-buttons navbar-header pull-left" role="navigation">
          <div class="col-xs-12">
            <div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse ace-save-state" style="margin-top: 0; padding: 0 0;">
              <ul class="nav nav-list">
                <li class="hover">
                  <a href="<?php echo base_url(); ?>order/details/list" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Car Details">
                    <i class="menu-icon fa fa-car" style="font-size: 30px;"></i>
<!--                    <span class="menu-text"> Car Details </span>-->
                  </a>

                  <b class="arrow"></b>
                </li>
                <?php if($this->uri->uri_string()!= 'Admindashboard'): ?>
                <li class="hover">
                  <a href="<?php echo base_url(); ?>" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Dashboard">
                    <i class="menu-icon fa fa-tachometer" style="font-size: 30px;"></i>
<!--                    <span class="menu-text"> Dashboard </span>-->
                  </a>

                  <b class="arrow"></b>
                </li>
                <?php if($access->sale_module == 1){ ?>
                <li class="hover">
                  <a href="<?= base_url();?>order/dashboard" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Sale">
                    <i class="menu-icon fa fa-shopping-bag" style="font-size: 30px;"></i>
<!--                    <span class="menu-text">Sale</span>-->
                  </a>
                  <b class="arrow"></b>
                </li>
                <?php } if($access->purchase_module ==1){ ?>
                <li class="hover">
                  <a href="<?= base_url();?>purchase/dashboard" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Purchase">
                    <i class="menu-icon fa fa-cart-arrow-down" style="font-size: 30px;"></i>
<!--                    <span class="menu-text">Purchase</span>-->
                  </a>
                  <b class="arrow"></b>
                </li>
                <?php } if($access->account_module ==1){ ?>
                <li class="hover">
                  <a href="<?= base_url();?>account/dashboard" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Account">
                    <i class="menu-icon fa fa-clipboard" style="font-size: 30px;"></i>
<!--                    <span class="menu-text">Account</span>-->
                  </a>
                  <b class="arrow"></b>
                </li>
                <?php } if($access->hr_module ==1){ ?>
                <li class="hover">
                  <a href="<?= base_url();?>hr_payroll/dashboard" data-rel="tooltip" data-placement="bottom" title="" data-original-title="HR&Payroll">
                    <i class="menu-icon fa fa-users" style="font-size: 30px;"></i>
<!--                    <span class="menu-text">HR&Payroll</span>-->
                  </a>
                  <b class="arrow"></b>
                </li>
                <?php } if($access->report_module ==1){ ?>
                <li class="hover">
                  <a href="<?= base_url();?>report/dashboard" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Report">
                    <i class="menu-icon fa fa-print" style="font-size: 30px;"></i>
<!--                    <span class="menu-text">Report</span>-->
                  </a>
                  <b class="arrow"></b>
                </li>
                <?php } if($access->administration ==1){ ?>
                <li class="hover">
                  <a href="<?= base_url();?>administration/dashboard" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Administration">
                    <i class="menu-icon fa fa-cogs" style="font-size: 30px;"></i>
<!--                    <span class="menu-text">Administration</span>-->
                  </a>
                  <b class="arrow"></b>
                </li>
                <?php } ?>
                <?php endif; ?>
              </ul><!-- /.nav-list -->
            </div>
          </div>
        </div>
        
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav">

            <li>
              <a class="clock" style="background:#438EB9 !important;">
                <span style="font-size:20px;"><i class="ace-icon fa fa-clock-o"></i></span> <span style="font-size:15px;"><?php  date_default_timezone_set('Asia/Dhaka'); echo date("l, d F Y"); ?>,&nbsp;<span id="timer" style="font-size:15px;"></span></span>
              </a>
            </li>

            <li class="light-blue dropdown-modal">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <?php 

                  $admin_image = base_url().'libs/logo_image/user.png'; 
                    if($this->session->userdata('image') && !is_null($this->session->userdata('image'))){
                      $admin_image = base_url().'libs/upload_pic/admin_pic/'.$this->session->userdata('image');
                        if(!@getimagesize($admin_image)){
                          $admin_image = base_url().'libs/logo_image/user.png';
                        }
                    }
                ?>
                <img class="nav-user-photo" src="<?php echo $admin_image; ?>" alt="Jason's Photo" />
                <span class="user-info">
                  <small>Welcome,</small>
                  <?php echo $this->session->userdata('name'); ?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                <li>
                  <a href="<?php echo base_url(); ?>Adminlogin/logout">
                    <i class="ace-icon fa fa-power-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
            
          </ul>
        </div>
      </div><!-- /.navbar-container -->
    </div>