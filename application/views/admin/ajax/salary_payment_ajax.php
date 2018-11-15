<script>
	
	$('#emp_id').change(function(e){
		var emp_id = e.target.value;
		$('#msg1').css('display', 'none');
		$('#msg2').css('display', 'none');
		$('#msg3').css('display', 'none');

		$('#salary_range').val('');
		if(emp_id >=1){
			$.ajax({
				url:'<?= base_url();?>get/salary_range/'+emp_id,
				type:'POST',
				dataType:'json',
				success:function(data){
					if(data != 0){
						$('#salary_range').val(data);
					}else{
						swal({
	                        text: "Some thing Went Wrong",
	                        icon: "error",
	                        buttons: false,
	                        timer: 1500,
	                    });
					}
					
				},error:function(error){
					console.log(error);
					swal({
		                text: "Some Error Found..!",
		                icon: "warning",
		                buttons: false,
		                timer: 1500,
		            });
				}
			});
		}else{
			$('#msg1').css('display', 'block');
			swal({
                text: "Select Employee First..!",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
		}
	});


	$('#payment_amount').blur(function(e){
		var emp_id = $('#emp_id').val();
		var month_id = $('#month_id').val();
		var payment_amount = $('#payment_amount').val();
		var salary_range = $('#salary_range').val();

		$('#msg1').css('display', 'none');
		$('#msg2').css('display', 'none');
		$('#msg3').css('display', 'none');

		if(emp_id >=1 && month_id >=1 && payment_amount >= 1){
			$.ajax({
				url:'<?= base_url();?>store/paid_salary/check',
				type:'POST',
				dataType:'json',
				data:{emp_id:emp_id,month_id:month_id},
				success:function(data){

					if(data != 1){
						var total = parseInt(data)+parseInt(payment_amount);

						var due = parseInt(salary_range) - parseInt(total);
						if(due < 0){
							$('#payment_amount').val('0');
							swal({
		                        text: "Sorry payable amount large than salary range",
		                        icon: "warning",
		                        buttons: false,
		                        timer: 1500,
		                    });
						}
					}else{
						swal({
	                        text: "Some thing Went Wrong",
	                        icon: "error",
	                        buttons: false,
	                        timer: 1500,
	                    });
					}
				},error:function(error){
					console.log(error);
					alert(error);
					swal({
                        text: "Some Error Found",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
				}
			});
		}else if(emp_id <=0){
			$('#msg1').css('display', 'block');
			return false;
		}else if(month_id <=0){
			$('#msg2').css('display', 'block');
			return false;
		}else if(payment_amount <=0){
			$('#msg3').css('display', 'block');
			return false;
		}
	});


	$('#salary_submit').click(function(){
		var emp_id = $('#emp_id').val();
		var month_id = $('#month_id').val();
		var payment_amount = $('#payment_amount').val();
		$('#msg1').css('display', 'none');
		$('#msg2').css('display', 'none');
		$('#msg3').css('display', 'none');

		if(emp_id >=1 && month_id >=1 && payment_amount >= 1){
			
			console.log($('#salary_payment').serialize());
			$.ajax({
				url:'<?= base_url();?>salary/store',
				type:'POST',
				dataType:'html',
				data:$('#salary_payment').serialize(),
				success:function(data){
					if(data != 0){
						$('#tBody').empty();
						$('#tBody').html(data);
						location.reload();

						swal({
	                        text: "Store Successfull..!",
	                        icon: "success",
	                        buttons: false,
	                        timer: 1500,
	                    });
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
                        text: "Some Error Found",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
				}
			});
			return false;
		}else if(emp_id <=0){
			$('#msg1').css('display', 'block');
			return false;
		}else if(month_id <=0){
			$('#msg2').css('display', 'block');
			return false;
		}else if(payment_amount <=0){
			$('#msg3').css('display', 'block');
			return false;
		}
	});

	/*************************************************/
	/*************************************************/
	/*************************************************/
	/*************************************************/
	/*************************************************/
	/**********************Edit***********************/

	$('#e_emp_id').change(function(e){
		var emp_id = e.target.value;
		$('#msg4').css('display', 'none');
		$('#msg5').css('display', 'none');
		$('#msg6').css('display', 'none');

		$('#e_salary_range').val('');
		if(emp_id >=1){
			$.ajax({
				url:'<?= base_url();?>get/salary_range/'+emp_id,
				type:'POST',
				dataType:'json',
				success:function(data){
					if(data != 0){
						$('#e_salary_range').val(data);
					}else{
						swal({
	                        text: "Some thing Went Wrong",
	                        icon: "error",
	                        buttons: false,
	                        timer: 1500,
	                    });
					}
					
				},error:function(error){
					console.log(error);
					swal({
		                text: "Some Error Found..!",
		                icon: "warning",
		                buttons: false,
		                timer: 1500,
		            });
				}
			});
		}else{
			$('#msg4').css('display', 'block');
			swal({
                text: "Select Employee First..!",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
		}
	});

	$('#e_payment_amount').blur(function(e){
		var emp_id = $('#e_emp_id').val();
		var month_id = $('#e_month_id').val();
		var prv_pam = $('#prv_pam').val();
		var payment_amount = $('#e_payment_amount').val();
		var salary_range = $('#e_salary_range').val();

		$('#msg4').css('display', 'none');
		$('#msg5').css('display', 'none');
		$('#msg6').css('display', 'none');

		if(emp_id >=1 && month_id >=1 && payment_amount >= 1){
			$.ajax({
				url:'<?= base_url();?>store/paid_salary/check',
				type:'POST',
				dataType:'json',
				data:{emp_id:emp_id,month_id:month_id},
				success:function(data){

					if(data != 0){
						blc = parseInt(data) - parseInt(prv_pam);

						var total = parseInt(blc)+parseInt(payment_amount);
						

						var due = parseInt(salary_range) - parseInt(total);

						if(due < 0){
							$('#e_payment_amount').val(prv_pam);
							swal({
		                        text: "Sorry payable amount large than salary range",
		                        icon: "warning",
		                        buttons: false,
		                        timer: 1500,
		                    });
						}
					}else{
						swal({
	                        text: "Some thing Went Wrong",
	                        icon: "error",
	                        buttons: false,
	                        timer: 1500,
	                    });
					}
				},error:function(error){
					console.log(error);
					alert(error);
					swal({
                        text: "Some Error Found",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
				}
			});
		}else if(emp_id <=0){
			$('#msg4').css('display', 'block');
			return false;
		}else if(month_id <=0){
			$('#msg5').css('display', 'block');
			return false;
		}else if(payment_amount <=0){
			$('#msg6').css('display', 'block');
			return false;
		}
	});

	$('#e_salary_submit').click(function(){
		var emp_id = $('#e_emp_id').val();
		var month_id = $('#e_month_id').val();
		var payment_amount = $('#e_payment_amount').val();
		$('#msg4').css('display', 'none');
		$('#msg5').css('display', 'none');
		$('#msg6').css('display', 'none');

		if(emp_id >=1 && month_id >=1 && payment_amount >= 1){
			return true;
		}else if(emp_id <=0){
			$('#msg4').css('display', 'block');
			return false;
		}else if(month_id <=0){
			$('#msg5').css('display', 'block');
			return false;
		}else if(payment_amount <=0){
			$('#msg6').css('display', 'block');
			return false;
		}
	});



	/*********************************/
	/*********************************/
	/*********************************/
	/*********************************/
	/***************Report******************/
	$('#date_to_date_search').click(function(){
		var date_from = $('#date_from').val();
		var date_to = $('#date_to').val();
		$('#tBody').empty();

		$.ajax({
			url:'<?= base_url();?>find/salary/date_to_date',
			type:'POST',
			dataType:'html',
			data:{date_from:date_from,date_to:date_to},
			success:function(data){
				if(data != 0){
					$('#tBody').html(data);
				}else{
					swal({
	                    text: "Some Thing Went Wrong",
	                    icon: "error",
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

		})
	});

	$('#emp_salary_search').click(function(){
		var emp_id = $('#employee_id').val();
		$('#tBody').empty();

		$.ajax({
			url:'<?= base_url();?>find/salary/employee/'+emp_id,
			type:'POST',
			dataType:'html',
			success:function(data){
				if(data != 0){
					$('#tBody').html(data);
				}else{
					swal({
	                    text: "Some Thing Went Wrong",
	                    icon: "error",
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

		})
	});

    $('#month_id_search').click(function(){
        var month_id = $('#month_id').val();
        $('#tBody').empty();

        $.ajax({
            url:'<?= base_url();?>month_wise/salary/'+month_id,
            type:'POST',
            dataType:'html',
            success:function(data){
                if(data != 0){
                    $('#tBody').html(data);
                }else{
                    swal({
                        text: "No Data Found",
                        icon: "error",
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

        })
    });






</script>