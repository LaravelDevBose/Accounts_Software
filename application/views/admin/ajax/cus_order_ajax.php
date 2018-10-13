<script>
	$( document ).ready(function() {
	    $('#cus_search').click(function(){
	    	var cus_id = $('#customer_id').val();
	    	$('#tBody').empty();

	    	if(cus_id !='' && cus_id >=1 ){
	    		$.ajax({
	    			url:'<?= base_url(); ?>find/customer_order/'+cus_id,
	    			type:'POST',
	    			dataType:'html',
	    			success:function(data){
	    				if(data != 0){
	    					$('#tBody').html(data);
	    				}else{
	    					swal({
			                    text: "No Data Found..!!",
			                    icon: "info",
			                    buttons: false,
			                    timer: 1500,
			                });
	    				}

	    			},error:function(error){
	    				console.log(error);
	    				swal({
		                    text: "Some Error Found..!",
		                    icon: "error",
		                    buttons: false,
		                    timer: 1500,
		                });
	    			}
	    		});
	    	}else{
	    		swal({
                    text: "Select A Customer First...!",
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
	    	}
	    });
	});
</script>