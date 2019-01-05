<script>

    $('#head_submit').on('click', function(){
        var  ah_name = $('#ah_name').val();

        if(ah_name != ' '&& ah_name.length >0 ){
            $.ajax({
                url:'<?= base_url();?>titu/ac_head_store',
                type:'POST',
                dataType:'html',
                data: {ah_name:ah_name},
                success:function(data){

                    if(data != 0){
                        $('#tBody').empty();
                        $('#tBody').html(data);
                        $('#ah_name').val('');
                        // location.reload();
                    }else{
                        swal({
                            text: "No Data Found",
                            icon: "warning",
                            buttons: false,
                            timer: 1500,
                        });
                        $('#ah_name').val('');
                    }
                },
                error:function(error){
                    console.log(error);
                    $('#ah_name').val('');

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