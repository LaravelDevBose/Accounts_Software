<script>

	/*======= find the Chassis Number =======*/
	$('#cus_id').on('change', function(e){
		var cus_id = e.target.value;
		if(cus_id >= 1){
			$.ajax({
				url:'<?= base_url();?>find/chassis_no/'+cus_id,
				type:'POST',
				dataType:'Json',
				success:function(data){
					$('#order_no').empty();
					$('#lc_no').val('');
					$('#due_amount').html('00.0');

					if(data != 0){
						$('#order_no').append('<option value="0">Select a Chassis No</option>');
						$.each(data, function(key, val){
							$('#order_no').append('<option value="'+val.id+'">'+val.ord_chassis_no+'</option>');
						});
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
		              text: "Some Error Found",
		              icon: "error",
		              buttons: false,
		              timer: 1500,
		            });
				}
			});
		}else{
			swal({
              text: "Pleass Select a Customer First",
              icon: "warning",
              buttons: false,
              timer: 1500,
            });
		}
	});


	/*======== Find The Lc Number and Due Amount =======*/

	$('#order_no').on('change', function(e){
		var order_no = e.target.value;

		if(order_no >= 1){
			$.ajax({
				url:'<?= base_url(); ?>find/lc/due_amount/'+order_no,
				type:'POST',
				dataType:'Json',
				success:function(data){
					console.log(data);

					$('#lc_no').val('');
					$('#due_amount').html('00.0');

					if(data != 0){
						
						$('#lc_no').val(data.lc_no);
						$('#due_amount').html(data.due_amount);
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
		              text: "Some Error Found",
		              icon: "error",
		              buttons: false,
		              timer: 1500,
		            });
				}
			});
		}else{
			swal({
              text: "Pleass Select a Chassis Number",
              icon: "warning",
              buttons: false,
              timer: 1500,
            });
		}
	});

	/*======= find the Chassis Number =======*/
	$('#e_cus_id').on('change', function(e){
		var cus_id = e.target.value;
		if(cus_id >= 1){
			$.ajax({
				url:'<?= base_url();?>find/chassis_no/'+cus_id,
				type:'POST',
				dataType:'Json',
				success:function(data){
					$('#e_order_no').empty();
					$('#e_lc_no').val('');
					$('#e_due_amount').html('00.0');

					if(data != 0){
						$('#e_order_no').append('<option value="0">Select a Chassis No</option>');
						$.each(data, function(key, val){
							$('#e_order_no').append('<option value="'+val.id+'">'+val.ord_chassis_no+'</option>');
						});
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
		              text: "Some Error Found",
		              icon: "error",
		              buttons: false,
		              timer: 1500,
		            });
				}
			});
		}else{
			swal({
              text: "Pleass Select a Customer First",
              icon: "warning",
              buttons: false,
              timer: 1500,
            });
		}
	});


	/*======== Find The Lc Number and Due Amount =======*/

	$('#e_order_no').on('change', function(e){
		var order_no = e.target.value;

		if(order_no >= 1){
			$.ajax({
				url:'<?= base_url(); ?>find/lc/due_amount/'+order_no,
				type:'POST',
				dataType:'Json',
				success:function(data){
					console.log(data);

					$('#e_lc_no').val('');
					$('#e_due_amount').html('00.0');

					if(data != 0){
						$('#e_lc_no').val(data.lc_no);
						$('#e_due_amount').html(data.due_amount);
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
		              text: "Some Error Found",
		              icon: "error",
		              buttons: false,
		              timer: 1500,
		            });
				}
			});
		}else{
			swal({
              text: "Pleass Select a Chassis Number",
              icon: "warning",
              buttons: false,
              timer: 1500,
            });
		}
	});



	/*======== collection entry store ===========*/
	$('#collection_entry').submit(function(e) {
	    $.ajax({
	        url: '<?= base_url();?>collection/store',
	        type: 'POST',
	        dataType: 'html',
	        data: $('#collection_entry').serialize(),
	        success: function(data) {
	        	if(data != 0){
	        		$('#tBody').empty();
	        		$('#tBody').html(data);
	        		
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