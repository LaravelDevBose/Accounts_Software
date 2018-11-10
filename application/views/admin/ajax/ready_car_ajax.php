<script>
    $(document).ready(function () {

        $('#cus_id').change(function (e) {

            var cus_id = e.target.value;

            if(cus_id != 0 && cus_id != ''){
                $.ajax({
                   url:'<?= base_url(); ?>find/unpurchase_order/'+cus_id,
                   type:'POST',
                   dataType:'json',
                   success:function (data) {
                       if(data != 0){
                           $('#order_id').append('<option value="0">Select A Order No</option>');
                           $.each(data, function(key, val){
                               console.log(data);
                               $('#order_id').append('<option value="'+val.id+'">'+val.order_no+'</option>');

                           });
                           $('#order_id').trigger('chosen:update');
                       }else{
                           console.log(data);
                           
                           swal({
                               text: "No Order Found...",
                               icon: "info",
                               buttons: false,
                               timer: 1500,
                           });
                       }
                   }
                });
            }
        });

        $('#order_id').change(function (e) {

            var order_id = e.target.value;

            $('#ord_model').val('');
            $('#ord_color').val('');
            $('#ord_year').val('');
            $('#ord_mileage').val('');

            if(order_id != 0 && order_id != ''){
                $.ajax({
                    url:'<?= base_url(); ?>find/order_details/'+order_id,
                    type:'POST',
                    dataType:'json',
                    success:function (data) {
                        if(data != 0){
                            $('#ord_model').val(data.ord_car_model);
                            $('#ord_color').val(data.ord_color);
                            $('#ord_year').val(data.ord_year);
                            $('#ord_mileage').val(data.ord_mileage);
                        }else{
                            console.log(data);

                            swal({
                                text: "No Order Found...",
                                icon: "info",
                                buttons: false,
                                timer: 1500,
                            });
                        }
                    }
                });
            }
        });

        $('#pus_id').change(function (e) {

            var pus_id = e.target.value;

            $('#lc_id').val('');
            $('#chassis_no').val('');
            $('#engine_no').val('');
            $('#pus_model').val('');
            $('#pus_color').val('');
            $('#pus_year').val('');
            $('#pus_mileage').val('');

            if(pus_id != 0 && pus_id != ''){
                $.ajax({
                    url:'<?= base_url(); ?>find/purchase_details/'+pus_id,
                    type:'POST',
                    dataType:'json',
                    success:function (data) {
                        if(data != 0){
                            $('#lc_id').val(data.puc_lc_id);
                            $('#chassis_no').val(data.puc_chassis_no);
                            $('#engine_no').val(data.puc_engine_no);
                            $('#pus_model').val(data.puc_car_model);
                            $('#pus_color').val(data.puc_color);
                            $('#pus_year').val(data.puc_year);
                            $('#pus_mileage').val(data.puc_mileage);
                        }else{
                            console.log(data);

                            swal({
                                text: "No Order Found...",
                                icon: "info",
                                buttons: false,
                                timer: 1500,
                            });
                        }
                    }
                });
            }
        });

    });



</script>