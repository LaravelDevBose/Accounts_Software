<?php $this->load->view('admin/partials/header_css_js') ?>
<?php $this->load->view('admin/partials/header_navigation') ?>




  <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>

      <div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed sidebar-scroll">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <!-- /.sidebar-shortcuts -->


        <?php $this->load->view('admin/partials/left_sidebar_navigation'); ?>


        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>


      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?= base_url();?>">Home</a>
              </li>

              <li>
                <a href="#"><?php if(isset($title)): echo $title; endif; ?></a>
              </li>
            </ul>
          </div>

          <div class="page-content">

            
            <div id="loader" hidden style="position: fixed; z-index: 1000; margin: auto; height: 100%; width: 100%; background:rgba(255, 255, 255, 0.72);;">
            <img src="<?php echo base_url(); ?>libs/Backend/assets/loader.gif" style="top: 30%; left: 50%; opacity: 1; position: fixed;">
            </div>
            <?php $this->load->view('admin/error_success_msg');?>
              <?php 
                  if (isset($content)) :
                      $this->load->view('admin/'.$content, TRUE);
                  endif;
              ?>
   
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
      <div style="display: none;"> <table id="dynamic-table" ></table> </div> <!-- ignor the error -->
      

      <!-- Footer -->
      <?php $this->load->view('admin/partials/footer'); ?>
      <?php $this->load->view('admin/ajax/print_data'); ?>
      