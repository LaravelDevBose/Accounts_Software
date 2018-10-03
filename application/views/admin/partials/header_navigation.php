<body class="skin-2">
    <div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top" style="background:#438EB9 !important;">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
          <a href="<?php echo base_url(); ?>" class="navbar-brand">
            <small>
              <i class="fa fa-leaf"></i>
              <!--Enterprise Resource Planning--> Accounts Software <span style="color:#000;font-weight:700;letter-spacing:1px;font-size:16px;"> <?php //echo $this->session->userdata('Brunch_name'); ?> </span>
            </small>
          </a>
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
                <img class="nav-user-photo" src="<?php echo base_url(); ?>libs/logo_image/user.png" alt="Jason's Photo" />
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