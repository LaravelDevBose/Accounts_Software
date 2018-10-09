<script>
	$('#collection_entry').submit( function(e) {
	    $.ajax({
	        url: '<?= base_url();?>account/collection/store',
	        type: 'POST',
	        dataType: 'html',
	        data: $('#collection_entry').serialize(),
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