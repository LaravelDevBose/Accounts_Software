<script>
  
  $('#lc_submit').on('click', function(){
     var lc_no = $('#lc_no').val();
     var lc_note = $('#lc_note').val();
     var bank_name = $('#bank_name').val();
     var lc_date = $('#lc_date').val();
     
     console.log(lc_no);
    if(lc_no != ' '&& lc_no.length >0 ){
        console.log(lc_no);
        $.ajax({
            url:'<?= base_url();?>lc/store',
            type:'POST',
            dataType:'html',
            data: {lc_no:lc_no,lc_note:lc_note,bank_name:bank_name,lc_date:lc_date},
            success:function(data){

                if(data != 0){
                   $('#tBody').empty();
                   $('#tBody').html(data);
                   $('#lc_no').val('');
                   $('#lc_note').val('');
                   $('#bank_name').val('');
                   $('#lc_date').val('');
                }else{
                    swal({
                        text: "No Data Found",
                        icon: "warning",
                        buttons: false,
                        timer: 1500,
                    });
                    $('#lc_no').val('');
                     $('#lc_note').val('');
                     $('#bank_name').val('');
                     $('#lc_date').val('');
                }
            },
            error:function(error){
                console.log(error);
                $('#lc_no').val('');
                 $('#lc_note').val('');
                 $('#bank_name').val('');
                 $('#lc_date').val('');
            }
        });
    }else{
        swal({
            text: "Pleass Insert Some Data First",
            icon: "warning",
            buttons: false,
            timer: 1500,
        });
     }
  });


</script>