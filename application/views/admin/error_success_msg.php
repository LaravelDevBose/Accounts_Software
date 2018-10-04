<!-- Validation Message -->


<div class="form-group">
    <?php
        if(validation_errors()){
      ?>
        <div class="alert alert-danger alert-bordered" data-layout="topRight" data-type="error">
          <button type="button"  class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
          <?php echo validation_errors(); ?>
        </div>
    <?php
    }
    ?>



    <!-- Success Message -->
    <?php
      if($this->session->flashdata('success')) :
    ?>
        <script type="text/javascript">
          swal({
                text: "<?php echo $this->session->flashdata('success'); ?>",
                icon: "success",
                buttons: false,
                timer: 1500,
              }); 
        </script>

    <?php endif; ?>



    <!-- Success Message -->
    <?php
      if($this->session->flashdata('sendMessage')) :
    ?>
        <script type="text/javascript">
          swal({
                text: "<?php echo $this->session->flashdata('sendMessage'); ?>",
                icon: "success",
                buttons: true,
                timer: 2500,
              }); 

          // setTimeout( function() {
          //         //window.location.href = "signIn";
          //      },1220);
        </script>

    <?php endif; ?>

<!-- Error Message -->
    <?php
      if($this->session->flashdata('errorMsg')) :
    ?>
      <script type="text/javascript">
            swal({
                  text: "<?php echo $this->session->flashdata('errorMsg'); ?>",
                  icon: "error",
                  buttons: false,
                  timer: 1500,
                });
        </script>
    <?php endif; ?>


    <!-- Error Message -->
    <?php
      if($this->session->flashdata('error')) :
    ?>
      <script type="text/javascript">
            swal({
                  text: "<?php echo $this->session->flashdata('error'); ?>",
                  icon: "error",
                  buttons: false,
                  timer: 1500,
                });
        </script>
    <?php endif; ?>



    <?php
      if($this->session->flashdata('warning')) :
    ?>
      <script type="text/javascript">
            swal({
                  text: "<?php echo $this->session->flashdata('warning'); ?>",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
        </script>
    <?php endif; ?>




 <!-- Success Message -->
    <?php
      if($this->session->flashdata('successTextMsg')) :
    ?>
        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
          <button type="button" style="color: green;" class="close" data-dismiss="alert">
          <span>&times;</span><span class="sr-only">Close</span></button><?php echo $this->session->flashdata('successTextMsg'); ?>
      </div>

    <?php endif; ?>


  <!-- Error Message -->
  <?php
    if($this->session->flashdata('errorTextMsg')) :
  ?>
    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
        <button type="button" style="color: red;" class="close" data-dismiss="alert">
        <span>&times;</span><span class="sr-only">Close</span></button><?php echo $this->session->flashdata('errorTextMsg'); ?>
    </div>
  <?php endif; ?>


</div>
