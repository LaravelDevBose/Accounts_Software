<script>
	

	/*=========== Find Customer info====== */
	$('#sup_info').on('change', function(e){
		var sup_id = e.target.value;

		if(sup_id >= 1){
			$.ajax({
				url:'<?= base_url();?>find/supplier/'+sup_id,
				Type:'POST',
				dataType:'json',
				success:function(data){
					if(data != 0){
						$('#sup_info_chosen .chosen-single').css('border', '1px solid green');
						$('input[name="supplier_id"]').val(data.id);
						$('input[name="sup_code"]').val(data.sup_code);
						$('input[name="sup_name"]').val(data.sup_name);
						$('input[name="sup_phone"]').val(data.sup_phone);
						$('textarea[name="sup_address"]').val(data.sup_address);

					}else{
						swal({
		                  text: "No Data Fund",
		                  icon: "warning",
		                  buttons: false,
		                  timer: 1500,
		                });
					}
				},
				error:function(error){
					console.log(error);
				}
			});
		}else{
			$('#sup_info_chosen .chosen-single').css('border', '1px solid red');
			$('input[name="supplier_id"]').val('');
			$('input[name="sup_code"]').val('');
			$('input[name="sup_name"]').val('');
			$('input[name="sup_phone"]').val('');
			$('textarea[name="sup_address"]').val('');

            swal({
                  text: "Pleass Select a supplier First",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
		}
	});

	/*=========== Find Customer info====== */
	$('#cus_info').on('change', function(e){
		var cus_id = e.target.value;

		if(cus_id >= 1){
			$.ajax({
				url:'<?= base_url();?>find/customer/'+cus_id,
				Type:'POST',
				dataType:'json',
				success:function(data){
					if(data != 0){
						$('#cus_info_chosen .chosen-single').css('border', '1px solid green');
						$('input[name="customer_id"]').val(data.id);
						$('input[name="cus_code"]').val(data.cus_code);
						$('input[name="cus_name"]').val(data.cus_name);
						$('input[name="cus_contact_no"]').val(data.cus_contact_no);
						$('input[name="cus_email"]').val(data.cus_email);
						$('textarea[name="cus_address"]').val(data.cus_address);

					}else{
						swal({
		                  text: "No Data Fund",
		                  icon: "warning",
		                  buttons: false,
		                  timer: 1500,
		                });
					}
				},
				error:function(error){
					console.log(error);
				}
			});
		}else{
			$('#cus_info_chosen .chosen-single').css('border', '1px solid red');
			$('input[name="customer_id"]').val('');
			$('input[name="cus_code"]').val('');
			$('input[name="cus_name"]').val('');
			$('input[name="cus_contact_no"]').val('');
			$('input[name="cus_email"]').val('');
			$('textarea[name="cus_address"]').val('');

            swal({
                  text: "Pleass Select a Customer First",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
		}
	});

	/*======== Check Select Custome or not ===========*/
	$('#pus_submit').on('click', function(){


		var sup_info  = $('#sup_info').val();
		if(sup_info == '' || sup_info < 1){
			$('#sup_info_chosen .chosen-single').css('border', '1px solid red');
			$('#sup_info').focus();
			swal({
                  text: "Pleass Select a Supplier",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
			return false;
		}
        return true;
	});
</script>