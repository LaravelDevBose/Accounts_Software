<script>
	$('#ord_lc_no').on('change', function(e){

		var lc_no = e.target.value;

		if(lc_no != 0){

			$.ajax({
				url:'<?= base_url();?>find/order/'+lc_no,
				type:'POST',
				dataType:'html',
				success:function(data){

					$('#tBody').empty();
					if(data != 0){

						$('#tBody').html(data);

					}else{
						swal({
		                  text: "No Data Found",
		                  icon: "warning",
		                  buttons: false,
		                  timer: 1500,
		                });
					}
					
				},error:function(error){
					swal({
	                  text: "Some Error Found",
	                  icon: "error",
	                  buttons: false,
	                  timer: 1500,
	                });
					console.log(error);
				}
			});
		}else{
			$('#tBody').empty();
			swal({
                  text: "Pleass Select a L/C First",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
		}

		console.log(lc_no);
	});
</script>