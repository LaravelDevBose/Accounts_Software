<script>
	$('#order_id').on('change', function(e){
    var order_id = e.target.value;

    if(order_id >= 1){
      $.ajax({
        url:'<?= base_url(); ?>find/payment/lc/'+order_id,
        type:'POST',
        dataType:'Json',
        success:function(data){
          console.log(data);

          $('#lc_no').val('');
          $('#lc_id').val('');

          if(data != 0){
            
            $('#lc_id').val(data.lc_id);
            $('#lc_no').val(data.lc_no);
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

	/*======== Payment entry store ===========*/
	$('#payment_entry').submit(function(e) {
	    $.ajax({
	        url: '<?= base_url();?>payment/store',
	        type: 'POST',
	        dataType: 'html',
	        data: $('#payment_entry').serialize(),
	        success: function(data) {
	        	// alert(data);
	        	$('#tBody').empty();

	        	if(data != 0){
	        		$('#tBody').html(data);
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
                    text: "Store Unsuccessfull..! Some Error Found",
                    icon: "error",
                    buttons: true,
                    timer: 2500,
                });
         	}
	    });
	});



  /***********************************/
  /***********************************/
  /***********************************/
  /***********************************/
  /***********************************/
  /****************Report View*******************/

  $('#payment_search').on('click', function(){
    var date_from = $('#date_from').val();
    var date_to = $('#date_to').val();

    if(date_from != '' && date_to !=''){
      $.ajax({
        url:'<?= base_url(); ?>find/date_wise_payment/report',
        type:'POST',
        dataType:'html',
        data:{date_from:date_from,date_to:date_to}, 
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
                    text: "Searching Unsuccessfull..! Some Error Found",
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



  $('#supplier_search').on('click', function(){
    var supplier_id = $('#supplier_id').val();

    if(supplier_id >= 1){
      $.ajax({
        url:'<?= base_url(); ?>find/supplier_payment/report/'+supplier_id,
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
                      text: "Searching Unsuccessfull..! Some Error Found",
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

  $('#office_payment_search').on('click', function(){
    var date_from = $('#date_from').val();
    var date_to = $('#date_to').val();

    if(date_from != '' && date_to !=''){
      $.ajax({
        url:'<?= base_url(); ?>find/office_payment/report',
        type:'POST',
        dataType:'html',
        data:{date_from:date_from,date_to:date_to}, 
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
                    text: "Searching Unsuccessfull..! Some Error Found",
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