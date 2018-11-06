<script>
	$(document).ready(function() {
		var total_price = 0;

		$('#car_pus_id').change(function(e){

			var pus_id = e.target.value;
			$('#pus_info')['0'].reset();
			$('#pus_id').val('');
			if(pus_id != 0 && pus_id != ''){
				$.ajax({
					url:'<?= base_url();?>find/purchase_car/info/'+pus_id,
					type:'POST',
					dataType:'json',
					success:function(data){
						console.log(data);

						if(data != 0){
							$('#pus_id').val(data.id);

							$('#engine_no').val(data.puc_engine_no);
							$('#car_model').val(data.puc_car_model);
							$('#car_color').val(data.puc_color);
							$('#car_year').val(data.puc_year);
							$('#order_no').val(data.order_no);
							$('#cus_name').val(data.cus_name);
							$('#cus_phone').val(data.cus_contact_no);
							$('#sup_name').val(data.sup_name);
							$('#sup_phone').val(data.sup_phone);

						}else{
							swal({
			                    text: "No Data Find. Some Thing Wrong",
			                    icon: "error",
			                    buttons: false,
			                    timer: 1500,
			                });
						}
					},error:function(error){
						console.log(error);
						swal({
		                    text: "Some Error Found...!",
		                    icon: "error",
		                    buttons: false,
		                    timer: 1500,
		                });
					}
				});
			}else{
				swal({
                    text: "Select Chassis Number First..!",
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
			}
		});



	});


function amount_cal(){
	var amount = 0;
	var price = $('.price');
	var total_amount = 0; 
	for (var i = 0; i <price.length; i++) {
		
		amount = $(price[i]).val();
		if(amount > 0){
			total_amount =total_amount+parseInt(amount);
		}else if(amount <= 0 && amount.length >0){
			$(price[i]).val('0');
		}else{
			$(price[i]).val('');
		}
	}
	$('#total_price').val(total_amount);
	$('#total_amount').html(total_amount);
}
</script>