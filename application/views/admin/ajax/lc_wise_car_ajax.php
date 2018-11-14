<script>
	$('#lc_search').on('click', function(e){

		var lc_id = $('#lc_id').val();
		$('#tBody').empty();
		if(lc_id != 0){

			$.ajax({
				url:'<?= base_url();?>find/car/'+lc_id,
				type:'POST',
				dataType:'html',
				success:function(data){
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
			swal({
                  text: "Pleass Select a L/C First",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
		}

		console.log(lc_id);
	});
</script>