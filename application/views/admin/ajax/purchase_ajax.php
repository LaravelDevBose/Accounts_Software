<script>
	

	function apr_priceing(val){
		var head_id = $('#head_id'+val).val();
		if(head_id >=1){
			$('#amount'+val).removeAttr('disabled');
			$('#amount'+val).focus();
		}else{
			$('#amount'+val).attr('disabled','disabled').val('');
		}
	}

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


		$('#puc_lc_id .chosen-single').css('border', '1px solid #aaa');
		$('#sup_info .chosen-single').css('border', '1px solid #aaa');
		$('#puc_engine_no').css('border', '1px solid #D5D5D5');
		$('#puc_chassis_no').css('border', '1px solid #D5D5D5');
		$('#puc_car_model').css('border', '1px solid #D5D5D5');
		$('#puc_color').css('border', '1px solid #D5D5D5');

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

		var puc_lc_id  = $('#puc_lc_id').val();
		if(puc_lc_id == '' || puc_lc_id < 1){
			$('#puc_lc_id_chosen .chosen-single').css('border', '1px solid red');
			swal({
                  text: "Pleass Select a L/C Number",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
			return false;
		}

		var puc_car_model  = $('#puc_car_model').val();
		if(puc_car_model == '' || puc_car_model.length < 1){
			$('#puc_car_model').css('border', '1px solid red');
			$('#puc_car_model').focus();
			swal({
                  text: "Pleass Insert Car Model",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
			return false;
		}

		var puc_color  = $('#puc_color').val();
		if(puc_color == '' || puc_color.length < 1){
			$('#puc_color').css('border', '1px solid red');
			$('#puc_color').focus();
			swal({
                  text: "Pleass Insert Car Color",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
			return false;
		}


		var puc_engine_no  = $('#puc_engine_no').val();
		if(puc_engine_no == '' || puc_engine_no.length < 1){
			$('#puc_engine_no').css('border', '1px solid red');
			$('#puc_engine_no').focus();
			swal({
                  text: "Pleass Insert Engine Number",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
			return false;
		}

		var puc_chassis_no  = $('#puc_chassis_no').val();
		if(puc_chassis_no == '' || puc_chassis_no.length < 1){
			$('#puc_chassis_no').css('border', '1px solid red');
			$('#puc_chassis_no').focus();
			swal({
                  text: "Pleass Insert Chassis Number",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
			return false;
		}


	});
</script>