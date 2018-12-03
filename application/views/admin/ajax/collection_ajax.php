<script>


	/*======= find the Chassis Number =======*/
	$('#cus_id').on('change', function(e){
		var cus_id = e.target.value;
		if(cus_id >= 1){
			$.ajax({
				url:'<?= base_url();?>find/customer/chassis_no/'+cus_id,
				type:'POST',
				dataType:'Json',
				success:function(data){
					$('#order_no').empty();
					$('#lc_no').val('');
					$('#due_amount').html('00.0');
					
					if(data != 0){
						$('#order_no').append('<option value="0">Select a Chassis No</option>');
						$.each(data, function(key, val){
							console.log(val.id);
							$('#order_no').append('<option value="'+val.id+'">'+val.order_no+'-'+val.ord_chassis_no+'</option>');
						});
						// $('#order_no').trigger('chosen:update');
                        $('#order_no').trigger('chosen:updated');
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
        $('#lc_no').val('');
        $('#lc_id').val('');
        $('#pus_id').val('');

		if(order_no >= 1){
			$.ajax({
				url:'<?= base_url(); ?>find/order/due_amount/'+order_no,
				type:'POST',
				dataType:'Json',
				success:function(data){
					console.log(data);


					$('#due_amount').html('00.0');

					if(data != 0){

						$('#pus_id').val(data.pus_id);
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

	/*========== Collection Type Selection ==========*/
    $('#collection_type').change(function (e) {

        var coll_type = e.target.value;
        $('#collection_type_chosen .chosen-single').css('border', '1px solid #aaaaaa');

        if(coll_type != 0 || coll_type != ''){
            if(coll_type == 4){
                $('#check_view').css('display','block');
            }else{
                $('#check_view').css('display','none');
                $('#cheque_no').val('');
                $('#bank_name').val('');
            }
            
        }else{
            $('#collection_type_chosen .chosen-single').css('border', '1px solid red');

            swal({
                text: "Pleases Select a Collection Type",
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
					$('#e_lc_id').val('');
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
					$('#e_lc_id').val('');
					$('#e_due_amount').html('00.0');

					if(data != 0){
						$('#e_lc_no').val(data.lc_no);
						$('#e_lc_id').val(data.lc_id);
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
	$('#collection_save').click(function(e){

        $('#cus_id_chosen .chosen-single').css('border', '1px solid #aaaaaa');
        $('#order_no_chosen .chosen-single').css('border', '1px solid #aaaaaa');
        $('#collection_type_chosen .chosen-single').css('border', '1px solid #aaaaaa');
        $('#cheque_no').css('border', '1px solid #d5d5d5');
        $('#bank_name').css('border', '1px solid #d5d5d5');
        $('#amount').css('border', '1px solid #d5d5d5');

	    var cus_id = $('#cus_id').val();
	    if(cus_id == 0 || cus_id == ''){
            $('#cus_id_chosen .chosen-single').css('border', '1px solid red');
            swal({
                text: "Pleases Select a Customer First",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }
        var order_no = $('#order_no').val();
        if(order_no == 0 || order_no == ''){
            $('#order_no_chosen .chosen-single').css('border', '1px solid red');
            swal({
                text: "Pleases Select a Order First",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }
        var coll_type = $('#collection_type').val();
        if(coll_type == 0 || coll_type == ''){
            $('#collection_type_chosen .chosen-single').css('border', '1px solid red');
            swal({
                text: "Pleases Select a Collection Type",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }else{
            if(coll_type == 4){
                var cheque_no = $('#cheque_no').val();
                var bank_name = $('#bank_name').val();

                if(cheque_no == 0 || cheque_no == ''){
                    $('#cheque_no').css('border', '1px solid red');
                    swal({
                        text: "Insert Valid Cheque No ",
                        icon: "warning",
                        buttons: false,
                        timer: 1500,
                    });
                    return false;
                }

                if(bank_name == ''){
                    $('#bank_name').css('border', '1px solid red');
                    swal({
                        text: "Insert a Bank Name ",
                        icon: "warning",
                        buttons: false,
                        timer: 1500,
                    });
                    return false;
                }
            }
        }
        var amount = $('#amount').val();
        if(amount == 0 || amount == ''){
            $('#amount').css('border', '1px solid red');
            swal({
                text: "Insert Valid Amount ",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }

	    $.ajax({
	        url: '<?= base_url();?>collection/store',
	        type: 'POST',
	        dataType: 'html',
	        data: $('#collection_entry').serialize(),
	        success: function(data) {


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
                        text: "Store Unsuccessfully..!",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
	        	}
	        	
         	},error:function(error){
         		console.log(error);
         		swal({
                    text: "Store Unsuccessfully..! Some Error Found",
                    icon: "error",
                    buttons: true,
                    timer: 2500,
                });
         	}
	    });
	});

    /*======== collection entry store & Print ===========*/
    $('#collection_save_print').click(function(e){
        $('#cus_id_chosen .chosen-single').css('border', '1px solid #aaaaaa');
        $('#order_no_chosen .chosen-single').css('border', '1px solid #aaaaaa');
        $('#collection_type_chosen .chosen-single').css('border', '1px solid #aaaaaa');
        $('#cheque_no').css('border', '1px solid #d5d5d5');
        $('#bank_name').css('border', '1px solid #d5d5d5');
        $('#amount').css('border', '1px solid #d5d5d5');

        var cus_id = $('#cus_id').val();
        if(cus_id == 0 || cus_id == ''){
            $('#cus_id_chosen .chosen-single').css('border', '1px solid red');
            swal({
                text: "Pleases Select a Customer First",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }
        var order_no = $('#order_no').val();
        if(order_no == 0 || order_no == ''){
            $('#order_no_chosen .chosen-single').css('border', '1px solid red');
            swal({
                text: "Pleases Select a Order First",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }

        var coll_type = $('#collection_type').val();
        if(coll_type == 0 || coll_type == ''){
            $('#collection_type_chosen .chosen-single').css('border', '1px solid red');
            swal({
                text: "Pleases Select a Collection Type",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }else{
            if(coll_type == 4){
                var cheque_no = $('#cheque_no').val();
                var bank_name = $('#bank_name').val();

                if(cheque_no == 0 || cheque_no == ''){
                    $('#cheque_no').css('border', '1px solid red');
                    swal({
                        text: "Insert Valid Cheque No ",
                        icon: "warning",
                        buttons: false,
                        timer: 1500,
                    });
                    return false;
                }

                if(bank_name == ''){
                    $('#bank_name').css('border', '1px solid red');
                    swal({
                        text: "Insert a Bank Name ",
                        icon: "warning",
                        buttons: false,
                        timer: 1500,
                    });
                    return false;
                }
            }
        }


        var amount = $('#amount').val();
        if(amount == 0 || amount == ''){
            $('#amount').css('border', '1px solid red');
            swal({
                text: "Insert Valid Amount ",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
            return false;
        }

       
        $.ajax({
            url: '<?= base_url();?>collection/store/print',
            type: 'POST',
            dataType: 'html',
            data: $('#collection_entry').serialize(),
            success: function(data) {

                console.log(data);
                alert('okk');

                if(data != 0 && data != 1){
                    $('body').html(data);

                    /*------- Print New Page -------*/
                    window.print();

                    /*------- After print bake the main page------*/
                    location.reload();

                }else{
                    if(data == 0){
                        swal({
                            text: "Store Unsuccessfully..!",
                            icon: "error",
                            buttons: false,
                            timer: 2000,
                        });
                    }else{
                        swal({
                            text: "Full fill All Field in Form",
                            icon: "error",
                            buttons: false,
                            timer: 2000,
                        });
                    }

                }

            },error:function(error){
                console.log(error);
                swal({
                    text: "Store Unsuccessfully..! Some Error Found",
                    icon: "error",
                    buttons: true,
                    timer: 2500,
                });
            }
        });
    });

    $('.print_coll').click(function(){
        var coll_id = $(this).attr('id');

        $.ajax({
            url: '<?= base_url();?>collection/print/'+coll_id,
            type: 'POST',
            dataType: 'html',
            success: function(data) {



                if(data != 0){
                    $('body').html(data);

                    /*------- Print New Page -------*/
                    window.print();

                    /*------- After print bake the main page------*/
                    location.reload();

                }else{
                    
                    swal({
                        text: "No Data Found",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });
                    

                }

            },error:function(error){
                console.log(error);
                swal({
                    text: "Some Error Found",
                    icon: "error",
                    buttons: true,
                    timer: 2500,
                });
            }
        });
    });

	/********************************************/
	/********************************************/
	/********************************************/
	/******************** Collection Report ************************/

	$('#collection_search').on('click', function(){
		var date_from = $('#date_from').val();
		var date_to = $('#date_to').val();

		if(date_from != '' && date_to !=''){
			$.ajax({
				url:'<?= base_url(); ?>find/collection/by_date',
				type:'POST',
				dataType:'html',
				data:{date_from:date_from, date_to:date_to},
				success:function(data){
					$('#tBody').empty();

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
	                    text: "Searching Unsuccessfully..! Some Error Found",
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

	$('#cus_search').on('click', function(){
		var cus_id = $('#customer_id').val();

		if(cus_id >= 1){
			$.ajax({
				url:'<?= base_url(); ?>find/collection/customer/'+cus_id,
				type:'POST',
				dataType:'html', 
				success:function(data){
					$('#tBody').empty();

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
	                    text: "Searching Unsuccessfully..! Some Error Found",
	                    icon: "error",
	                    buttons: true,
	                    timer: 2500,
	                });
				}
			});
		}else{
			swal({
              text: "Pleass Select Customer",
              icon: "warning",
              buttons: false,
              timer: 1500,
            });
		}
	});

	/*====== Chassis Number Wise collection =========*/
	$('#order_search').on('click', function(){
		var order_id = $('#order_id').val();

		if(order_id >= 1){
			$.ajax({
				url:'<?= base_url(); ?>find/collection/order_wise/'+order_id,
				type:'POST',
				dataType:'html', 
				success:function(data){
					$('#tBody').empty();

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
	                    text: "Searching Unsuccessfully..! Some Error Found",
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