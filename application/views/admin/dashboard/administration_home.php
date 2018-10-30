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

  .des_h{
        font-size: 60px;
        font-style: oblique;
        text-align: center;
        font-weight: 900;
        color: #ff6e00;
      } 
</style>

<div class="row">
  <div class="col-md-12 col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <!-- Header Logo -->
        <div class="col-md-12 header">
          <img src="<?php echo base_url().'libs/logo_image/maven.jpg'; ?>" class="img img-responsive center-block">
        </div>
        <div class="col-md-12">
          <h4 class="des_h"><?php if(isset($title)): echo $title; endif; ?></h4>
        </div>
      </div>
  </div><!-- /.col -->
</div><!-- /.row -->