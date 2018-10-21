<script>
	/*======== collection entry store ===========*/
	$('#payment_entry').submit(function(e) {
	    $.ajax({
	        url: '<?= base_url();?>office_payment/store',
	        type: 'POST',
	        dataType: 'html',
	        data: $('#payment_entry').serialize(),
	        success: function(data) {
	        	// alert(data);
	        	$('#tBody').empty();

	        	if(data != 0){
	        		$('#tBody').html(data);
	        		swal({
                        text: "Store Successfull..!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    });
	        		
	        	}else{
	        		swal({
                        text: "Store Unsuccessfull..!",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
	        	}
	        	
         	},error:function(error){
         		console.log(error);
         		swal({
                    text: "Store Unsuccessfull..! Some Error Found",
                    icon: "error",
                    buttons: true,
                    timer: 2500,
                });
         	}
	    });
	});

</script>