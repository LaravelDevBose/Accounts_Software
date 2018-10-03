
<div class="col-sm-12" style="width: 500px;">


<style type="text/css">
  .form-group{
    margin-top: -13px;
  }
</style>

 <!-- Page header -->
<div class="page-header">
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li class="active btn btn-primary btn-xs" style="background: #1D2841;"> 
        <a href="#" style="color: #ddd;">
          <i class="icon-plus3"></i> Change Password &nbsp; &nbsp; &nbsp;
        </a>
      </li>
    </ul>
  </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content" >
  <!-- Main content -->
  <div class="row">
    <div class="col-lg-12">
    <!-- main page sources -->
    <div class="panel panel-flat">
    <!-- Form validation -->
       	
	        <div class="panel-body">
	           <form class="form-horizontal form-validate-jquery" enctype="multipart/form-data" method="post" name="changePassForm" id="changePassForm">

	            <fieldset class="content-group">
	                 <!-- Write Your Code Here -->

	                 <!-- Input group -->
	                  <div class="form-group">
	                    <label class="control-label col-lg-4">Password <span class="text-danger">*</span></label>
	                    <div class="col-lg-8">
	                      <div class="input-group">
	                        <div class="input-group-addon"><i class="icon-spinner3 spinner"></i></div>
	                        <input type="password" name="password" id="Pass" class="form-control" onkeyup="checkPasswordCharecter()" required placeholder="Password">
	                        <div id="msgReq"></div>
	                      </div>
	                    </div>
	                  </div>
	                  <!-- /input group -->
                  
	                  <!-- Input group -->
	                  <div class="form-group">
	                    <label class="control-label col-lg-4">Confirm Password <span class="text-danger">*</span></label>
	                    <div class="col-lg-8">
	                      <div class="input-group">
	                        <div class="input-group-addon"><i class="icon-spinner3 spinner"></i></div>
	                        <input type="password" name="repeat_password" id="repeat_password"  onkeyup="checkPasswordMatch()" class="form-control" required  placeholder="Confirm Password">
	                        <div id="msgReqC"></div>
	                      </div>
	                    </div>
	                  </div>
	                  <!-- /input group -->

	             </fieldset>

	             <div class="text-right">
	                  <button type="button" onclick="changePass('<?php echo $id; ?>')" class="btn btn-success">Change Password <i class="icon-arrow-right14 position-right"></i></button>
	            </div>

	          </form>
	        </div>

      </div>
    </div>

    <!-- /main page sources -->
</div>
  <!-- /main content -->
  </div>
</div>


<script type="text/javascript">
	
	function checkPasswordCharecter() {
	    var pass = $("#Pass").val();
	    if(pass == ""){
        	$("#msgReq").html("Required Filed").css("color","red");
        	return false;
        }else{
            $("#msgReq").html("");
        }
        if(pass.length <= 5){
	    	 $("#msgReq").html("6 charecter long!").css("color","red");
	    	 return false;
	    }else{
            $("#msgReq").html("");
        }
	}

	function checkPasswordMatch() {
	    var password = $("#Pass").val();
	    var confirmPassword = $("#repeat_password").val();
	    if (password != confirmPassword){
	        $("#msgReqC").html("Passwords do not match!").css("color","red");
	    	return false;
	    }
	    else{
	        $("#msgReqC").html("Passwords match!").css("color","green");
	    }
	}


    function changePass(id)
    {
    	var pass = $('#Pass').val();
    	var conPass = $('#repeat_password').val();
        
        //validation check
        if(pass == ""){
        	$("#msgReq").html("Required Filed").css("color","red");
        	return false;
        }else{
            $("#msgReq").html("");
        }
        if(pass.length <= 5){
	    	 $("#msgReq").html("6 charecter long!").css("color","red");
	    	 return false;
	    }else{
            $("#msgReq").html("");
        }



        if(conPass == ""){
        	$("#msgReqC").html("Required Filed").css("color","red");
        	return false;
        }else{
            $("#msgReqC").html("");
        }
        if (pass != conPass){
	        $("#msgReqC").html("Passwords do not match!").css("color","red");
	    	return false;
	    }else{
            $("#msgReqC").html("");
        }

       // ajax adding data to database
          $.ajax({
            url : "<?php echo base_url(); ?>Admincreate/change_password/"+id,
            type: "POST",
            data: $('#changePassForm').serialize(),
            //dataType: "JSON",
            success: function(data)
            {
                if(data){
                	$('#changePassForm')[0].reset(); 
	                // Show Pop up message
	                swal({
	                  text: "Password change successfully!",
	                  icon: "success",
	                  buttons: false,
	                  timer: 1300,
	                });
	                setTimeout( function() {
                        location.reload();
                     }, 1320);
                }
                else{
                	swal({
	                  text: "Somethong went wrong!",
	                  icon: "error",
	                  buttons: false,
	                  timer: 2000,
	                }); 	
                }
             }
        });
    }

</script>

