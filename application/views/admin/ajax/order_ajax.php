<script>
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
						$('#cus_info').css('border', '1px solid green');
						$('input[name="cus_id"]').val(data.id);
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
			$('input[name="cus_id"]').val('');
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
	$('#order_submit').on('click', function(){
		var cus_id  = $('input[name="cus_id"]').val();
		var ord_lc_no = $('#ord_lc_no').val();
		if(cus_id == ' ' || cus_id.length < 1){
			$('#cus_info').css('border', '1px solid red');
			swal({
                  text: "Pleass Select a Customer First",
                  icon: "warning",
                  buttons: false,
                  timer: 1500,
                });
			return false;
		} 
		else if(ord_lc_no ==0 || ord_lc_no.langth == 0){
	      swal({
	          text: "Pleass Select a L/C Number",
	          icon: "warning",
	          buttons: false,
	          timer: 1500,
	        });
	      return false;
	    }else{
	      return true;
	    }


	});



</script>