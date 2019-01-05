<script>
    $(document).ready(function(){

        $('#in_comp_id').change(function(e){
            var comp_id = e.target.value;

            if(comp_id != '' && comp_id != 0){

                $.ajax({
                    url:'<?= base_url()?>company_due/'+comp_id,
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                        if(data !== 'F'){
                            if(data > 0){
                                $('#due_amount').html(data);
                            }
                        }
                    },error:function(data){
                        console.log(data);
                    }
                });
            }else{
                alert('Select a Company');
                return false;
            }
        });

        $('#cus_id').on('change', function(e){
            var cus_id = e.target.value;
            if(cus_id >= 1){
                $.ajax({
                    url:'<?= base_url();?>find/customer/chassis_no/'+cus_id,
                    type:'POST',
                    dataType:'Json',
                    success:function(data){
                        $('#order_id').empty();
                        $('#lc_no').val('');


                        if(data != 0){
                            $('#order_id').append('<option value="0">Select a Chassis No</option>');
                            $.each(data, function(key, val){
                                console.log(val.id);
                                $('#order_id').append('<option value="'+val.id+'">'+val.order_no+'-'+val.ord_chassis_no+'</option>');
                            });
                            // $('#order_id').trigger('chosen:update');
                            $('#order_id').trigger('chosen:updated');
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

        $('#order_id').on('change', function(e){
            var order_no = e.target.value;
            $('#lc_no').val('');
            $('#lc_id').val('');
            if(order_no >= 1){
                $.ajax({
                    url:'<?= base_url(); ?>find/order/due_amount/'+order_no,
                    type:'POST',
                    dataType:'Json',
                    success:function(data){
                        console.log(data);
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
                    text: "Pleases Select a Chassis Number",
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
            }
        });

        $('#bill_save').click(function(){
            var in_comp_id = $('#in_comp_id').val();
            var mc_crt_no = $('#mc_crt_no').val();
            var cus_id = $('#cus_id').val();
            var net_premium = $('#net_premium').val();
            // debugger;
            if(in_comp_id == '' || in_comp_id == 0){
                alert('Select a Insurance Company');
                return false;
            }
            if(mc_crt_no == '' || mc_crt_no.length ==0){
                alert('Insert MC/CRT No');
                return false;
            }

            if(cus_id == '' || cus_id == 0){
                alert('Select a Customer');
                return false;
            }

            if(net_premium == '' || net_premium == 0){
                alert('Enter Net Premium amount');
                return false;
            }

            $.ajax({
                url:'<?= base_url('insurance_bill_payment_store')?>',
                type:'POST',
                dataType:'html',
                data:$('#insurance_bill_store').serialize(),
                success:function(data){
                    if(data != 0){
                        $('#tBody').empty();
                        $('#tBody').html(data);
                        $('#insurance_bill_store')[0].reset();
                        $('#in_comp_id').val('');
                        $('#cus_id').val('');
                        $('#order_id').empty();
                        $('.chosen-select').trigger('chosen:updated');
                        $('#due_amount').html('00.0');
                        swal({
                            text: "Store Successful..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }else{
                        swal({
                            text: "Store UnSuccessful..!",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                },error:function(error){
                    console.log(error);
                    swal({
                        text: "Store UnSuccessful..!",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            });
        });

        $('#pay_save').click(function(){
            var in_comp_id = $('#in_comp_id').val();
            var payment_amount = $('#payment_amount').val();
            // debugger;
            if(in_comp_id == '' || in_comp_id == 0){
                alert('Select a Insurance Company');
                return false;
            }
            if(payment_amount == '' || payment_amount ==0){
                alert('Enter Payment Amount');
                return false;
            }

            $.ajax({
                url:'<?= base_url('insurance_bill_payment_store')?>',
                type:'POST',
                dataType:'html',
                data:$('#payment_store').serialize(),
                success:function(data){
                    if(data != 0){
                        $('#tBody').empty();
                        $('#tBody').html(data);
                        $('#payment_store')[0].reset();
                        $('#in_comp_id').val('');
                        $('.chosen-select').trigger('chosen:updated');
                        $('#due_amount').html('00.0');
                        swal({
                            text: "Store Successful..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }else{
                        swal({
                            text: "Store UnSuccessful..!",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                },error:function(error){
                    console.log(error);
                    swal({
                        text: "Store UnSuccessful..!",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            });
        })


        $('#in_search').click(function(){
            var search_type = $('#search_type').val();
            var comp_id = $('#comp_id').val();
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();

            if(search_type =='' || search_type == 0){
                alert('Select a Search Type');
                return false;
            }
            if(search_type == 'comp'&& comp_id == ''){
                alert('Select A Insurance Company');
                return false;
            }

            $.ajax({
                url:'<?= base_url()?>insurance_search_report',
                type:'POST',
                dataType:'html',
                data:{search_type:search_type,comp_id:comp_id,date_from:date_from,date_to:date_to},
                success:function(data){
                    $('#tBody').empty();

                    if(data != 0){
                        $('#tBody').html(data);
                    }else{
                        console.log(data);
                        swal({
                            text: "Store Successful..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                }
            });
        })
    });
    
    function premium_calaulation(input) {

        var net_premi = $('#net_premium').val();
        var stamp = $('#stamp').val();

        if(stamp == ''){
            stamp = 0;
        }
        var gross_premi = 0;
        var vat =0;
        var pay_30 =0;
        var pay_70 = 0;
        var bill_amount = 0;
        if(net_premi == '' || net_premi == 0){
            $('#in_bill_vat').val('');
            $('#in_bill_30').val('');
            $('#in_bill_70').val('');
            $('#bill_amount').val('');
            alert('Enter Gross Premium Or Net Premium');
            return false;
        }else{

            if(input == 'N'){
                vat = Math.round((parseInt(net_premi)*15) / 100);
                pay_30 = Math.round((parseInt(net_premi)*30) / 100);
                pay_70 = Math.round((parseInt(net_premi)*70) / 100);
                gross_premi = parseInt(net_premi) + vat;
                bill_amount = vat+pay_30+parseInt(stamp);
            }
            $('#in_bill_vat').val(vat);
            $('#in_bill_30').val(pay_30);
            $('#in_bill_70').val(pay_70);
            $('#gross_premium').val(gross_premi);
            $('#bill_amount').val(bill_amount);
        }
    }
    function e_premium_calaulation(input) {

        var net_premi = $('#e_net_premium').val();
        var stamp = $('#e_stamp').val();

        if(stamp == ''){
            stamp = 0;
        }
        var gross_premi = 0;
        var vat =0;
        var pay_30 =0;
        var pay_70 = 0;
        var bill_amount = 0;
        if(net_premi == '' || net_premi == 0){
            $('#ein_bill_vat').val('');
            $('#ein_bill_30').val('');
            $('#ein_bill_70').val('');
            $('#ebill_amount').val('');
            alert('Enter Gross Premium Or Net Premium');
            return false;
        }else{

            if(input == 'N'){
                vat = Math.round((parseInt(net_premi)*15) / 100);
                pay_30 = Math.round((parseInt(net_premi)*30) / 100);
                pay_70 = Math.round((parseInt(net_premi)*70) / 100);
                gross_premi = parseInt(net_premi) + vat;
                bill_amount = vat+pay_30+parseInt(stamp);
            }
            $('#ein_bill_vat').val(vat);
            $('#ein_bill_30').val(pay_30);
            $('#ein_bill_70').val(pay_70);
            $('#egross_premium').val(gross_premi);
            $('#ebill_amount').val(bill_amount);
        }
    }
</script>


