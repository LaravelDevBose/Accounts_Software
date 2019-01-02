<script>

	

	/*======== Payment entry store ===========*/
	$('#payment_entry').submit( function(e) {
	    $.ajax({
	        url: '<?= base_url();?>account/payment/store',
	        type: 'POST',
	        dataType: 'html',
	        data: $('#payment_entry').serialize(),
	        success: function(data) {
	        	
	        	$('#tBody').empty();
	        	if(data != 0){
	        		$('#tBody').html(data)
	        	}else{
	        		swal({
                        text: "Store Unsuccessful..!",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
	        	}
	        	
         	},error:function(error){
         		console.log(error);
         		swal({
                    text: "Store Unsuccessful..! Some Error Found",
                    icon: "error",
                    buttons: false,
                    timer: 1500,
                });
         	}
	    });
	});

	/*======== Other Income entry store ===========*/
	$('#other_income').submit( function(e) {
	    $.ajax({
	        url: '<?= base_url();?>other_income/store',
	        type: 'POST',
	        dataType: 'html',
	        data: $('#other_income').serialize(),
	        success: function(data) {
	        	if(data != 0){
	        		$('#tBody').empty();
	        		$('#tBody').html(data)
	        		
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
                    buttons: false,
                    timer: 1500,
                });
         	}
	    });
	});
</script>