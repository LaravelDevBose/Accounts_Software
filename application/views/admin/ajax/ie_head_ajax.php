<script>
  
  $('#head_submit').on('click', function(){
     var  head_title = $('#head_title').val();
     var  head_type = $('#head_type').val();

    if(head_title != ' '&& head_title.length >0 ){
        $.ajax({
            url:'<?= base_url();?>ie_head/store',
            type:'POST',
            dataType:'html',
            data: {head_title:head_title,head_type:head_type},
            success:function(data){

                if(data != 0){
                   $('#tBody').empty();
                   $('#tBody').html(data);
                   $('#head_title').val('');
                   $('#head_type').val('');
                  
                }else{
                    swal({
                        text: "No Data Found",
                        icon: "warning",
                        buttons: false,
                        timer: 1500,
                    });
                    $('#head_title').val('');              
                }
            },
            error:function(error){
                console.log(error);
                $('#head_title').val('');
                
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