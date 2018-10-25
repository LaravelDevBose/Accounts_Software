<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Maven Autos || <?php if(isset($title)): echo $title; endif; ?></title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap-duallistbox.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap-multiselect.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/select2.min.css" />
    
    <!-------------------  profile css start   --------------------->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/jquery.gritter.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap-editable.min.css" />
    <!-------------------  profile css end   --------------------->
    
    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/chosen.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/daterangepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/bootstrap-colorpicker.min.css" />
    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>libs/BackEnd/assets/fancyBox/css/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url()?>libs/BackEnd/assets/css/prints.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace-skins.min.css" />
    
     <style type="text/css">
    @media  print {
      html, body {
          height: auto;
          font-size: 10px; /*changing to 10pt has no impact*/
      }
      th{
        font-size: 10px;
        font-weight: 300;
      }
  }
  </style>

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url(); ?>libs/BackEnd/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url(); ?>libs/BackEnd/assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url(); ?>libs/BackEnd/assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url(); ?>libs/BackEnd/assets/js/respond.min.js"></script>
    <![endif]-->
    
    <script src="<?php echo base_url(); ?>libs/BackEnd/assets/js/jquery-2.1.4.min.js"></script>
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url();?>libs/BackEnd/sweetAlert_script/sweetalert.min.js"></script>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        
      });
    </script>

  </head>