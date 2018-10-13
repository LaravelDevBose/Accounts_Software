<script>
	$('#dilevery_search').on('click', function(){
		var date_from = $('#date_from').val();
		var date_to = $('#date_to').val();
		
		$('#tBody').empty();
		if(date_from != '' && date_to !=''){
			$.ajax({
				url:'<?= base_url(); ?>find/delivery_order',
				type:'POST',
				dataType:'html',
				data:{date_from:date_from, date_to:date_to},
				success:function(data){
					

					if(data != 0){
	        			$('#tBody').html(data);
					}else{
						
						swal({
			              text: "No Data Found..!",
			              icon: "info",
			              buttons: false,
			              timer: 1500,
			            });
					}
				},error:function(error){
					console.log(error);
	         		swal({
	                    text: "Searching Unsuccessfull..! Some Error Found",
	                    icon: "error",
	                    buttons: true,
	                    timer: 2500,
	                });
				}
			});
		}else{
			swal({
              text: "Pleass Select Date",
              icon: "warning",
              buttons: false,
              timer: 1500,
            });
		}
	});
</script>