<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Maven Auto || Login Page</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <link rel="icon" href="<?= base_url();?>libs/favicon.ico" type="image/ico" sizes="16x16">
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace-rtl.min.css" />
  </head>

  <body class="login-layout blur-login">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <h1>
                  <i class="ace-icon fa fa-car green"></i>
                  <span class="red">Maven Autos</span>
                  <!--<span class="white" id="id-text2">Application</span>-->
                </h1>
                <!--<h4 class="blue" id="id-company-text">&copy; Link Up Technology</h4>-->
              </div>

              <div class="space-6"></div>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h5 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        <b>Enter Your User Name & Password</b>
                      </h5>
                      <div class="space-6"></div>
                      <?php
                        if(isset($login_error) && $login_error) :
                      ?>
                        <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
                            <button type="button" style="color: red;" class="close" data-dismiss="alert">
                            <span>&times;</span><span class="sr-only">Close</span></button><?php echo $login_error; ?>
                        </div>
                      <?php endif; ?>

                      <form method="post" action="<?php echo base_url();?>admin_login">
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" name="username" placeholder="Username" />
                              <i class="ace-icon fa fa-user"></i>
                              <span style="color: red; font-size: 12px;"><?php echo form_error('username'); ?></span>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" class="form-control" name="password" placeholder="Password" />
                              <i class="ace-icon fa fa-lock"></i>
                              <span style="color: red; font-size: 12px;"><?php echo form_error('password'); ?></span>
                            </span>
                          </label>

                          <div class="space"></div>

                          <div class="clearfix">
                            <label class="inline">
                              <input type="checkbox" class="ace" />
                              <span class="lbl"> Remember Me</span>
                            </label>

                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Login</span>
                            </button>
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>

                      <!-- <div class="social-or-login center">
                        <span class="bigger-110">Or Login Using</span>
                      </div>

                      <div class="space-6"></div>

                      <div class="social-login center">
                        <a class="btn btn-primary">
                          <i class="ace-icon fa fa-facebook"></i>
                        </a>

                        <a class="btn btn-info">
                          <i class="ace-icon fa fa-twitter"></i>
                        </a>

                        <a class="btn btn-danger">
                          <i class="ace-icon fa fa-google-plus"></i>
                        </a>
                      </div> -->
                    </div><!-- /.widget-main -->

                    <div class="toolbar clearfix">
                      <div>
                        <a href="#"  class="forgot-password-link">
                          
                        </a>
                      </div>
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.login-box -->
              </div><!-- /.position-relative -->

              <div class="navbar-fixed-top align-right">
                <br />
                &nbsp;
                <a id="btn-login-dark" href="#">Dark</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-blur" href="#">Blur</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-light" href="#">Light</a>
                &nbsp; &nbsp; &nbsp;
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?php echo base_url(); ?>libs/BackEnd/assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="<?php echo base_url(); ?>libs/BackEnd/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>libs/BackEnd/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
       $(document).on('click', '.toolbar a[data-target]', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');//hide others
        $(target).addClass('visible');//show target
       });
      });
      
      
      
      //you don't need this, just used for changing background
      jQuery(function($) {
       $('#btn-login-dark').on('click', function(e) {
        $('body').attr('class', 'login-layout');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-light').on('click', function(e) {
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-blur').on('click', function(e) {
        $('body').attr('class', 'login-layout blur-login');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'light-blue');
        
        e.preventDefault();
       });
       
      });
    </script>
  </body>
</html>
