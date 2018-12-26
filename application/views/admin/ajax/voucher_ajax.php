<script>
    $('#voucher_save').click(function(){

        var dr_ah_id = $('#dr_ah_id').val();
        var dr_amount = $('#dr_amount').val();
        var cr_ah_id = $('#cr_ah_id').val();
        var cr_amount = $('#cr_amount').val();

        if(dr_ah_id == '' || dr_ah_id == 0){
            alert('Select Dr. Particulars');
            return false;
        }
        if(dr_amount == '' || dr_amount == 0){
            alert('Insert Dr. Amount');
            return false;
        }
        if(cr_ah_id == '' || cr_ah_id == 0){
            alert('Select Cr. Particulars');
            return false;
        }
        if(cr_amount == '' || cr_amount == 0){
            alert('Insert Cr. Amount');
            return false;
        }

        $.ajax({
            url:'<?= base_url('titu/voucher_store')?>',
            type:'POST',
            dataType:'json',
            data:$('#voucher_entry').serialize(),
            success:function(data){
                if(data != 0){
                    swal({
                        text: "Store Successful..!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    });
                    location.reload();
                }else{
                    swal({
                        text: "Store Unsuccessful..!",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }

            }
        });
    });

    $('#voucher_save_print').click(function(){

        var dr_ah_id = $('#dr_ah_id').val();
        var dr_amount = $('#dr_amount').val();
        var cr_ah_id = $('#cr_ah_id').val();
        var cr_amount = $('#cr_amount').val();

        if(dr_ah_id == '' || dr_ah_id == 0){
            alert('Select Dr. Particulars');
            return false;
        }
        if(dr_amount == '' || dr_amount == 0){
            alert('Insert Dr. Amount');
            return false;
        }
        if(cr_ah_id == '' || cr_ah_id == 0){
            alert('Select Cr. Particulars');
            return false;
        }
        if(cr_amount == '' || cr_amount == 0){
            alert('Insert Cr. Amount');
            return false;
        }

        $.ajax({
            url:'<?= base_url()?>titu/voucher_store_print',
            type:'POST',
            dataType:'html',
            data:$('#voucher_entry').serialize(),
            success:function(data){
                if(data != 0){
                    $('body').html(data);

                    /*------- Print New Page -------*/
                    window.print();

                    /*------- After print bake the main page------*/
                    location.reload();
                }else{
                    swal({
                        text: "Store Unsuccessful..!",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }

            },error:function(error){
                alert('error');
                console.log(error);
            }
        });
    });
</script>