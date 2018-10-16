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

	/*======== collection entry store ===========*/
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

  $('#report_search').on('click', function(){
    var order_id = $('#order_id').val();

    if(order_id >= 1){
      $.ajax({
        url:'<?= base_url(); ?>find/full_report/'+order_id,
        type:'POST',
        dataType:'html', 
        success:function(data){
          $('#data_table').empty();

          if(data != 0){
                $('#data_table').html(data);
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