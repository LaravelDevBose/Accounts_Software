<script>
	
	$('#month_submit').click(function(){
		var year = $('#year').val();
		var month_id = $('#month_id').val();
		var note = $('#note').val();

		if(year >0 && month_id >0){

			$.ajax({
				url:'<?= base_url()?>month/store',
				type:'POST',
				dataType:'html',
				data:{year:year,month_id:month_id,note:note},
				success:function(data){
					if(data != 0){
						$('#tBody').empty();
						$('#tBody').html(data);
						swal({
			                text: "Store Successfully..!",
			                icon: "success",
			                buttons: false,
			                timer: 1500,
			            });
			            location.reload();
					}else{
						swal({
			                text: "Some Thing Found Worng..!",
			                icon: "error",
			                buttons: false,
			                timer: 1500,
			            });
					}

				},error:function(error){
					console.log(error);
					swal({
		                text: "Some Thing Found Worng..!",
		                icon: "error",
		                buttons: false,
		                timer: 1500,
		            });
				}
			});


		}else if(year == 0){
			swal({
                text: "Select A Year First..!",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
		}else if(month_id <1){
			swal({
                text: "Select A Month First..!",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
		}else{
			swal({
                text: "Select Year & Month First..!",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
		}
	});
</script>