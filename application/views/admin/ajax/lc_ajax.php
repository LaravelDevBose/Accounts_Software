<script>
  function avaible_amount(){
        var lc_amount =parseInt($('#lc_amount').val());
        var avi_lc_amt = lc_amount - parseInt(cart_total);

        $('#avi_lc_amt').html(avi_lc_amt);

    }


    $(document).ready(function(){

        avaible_amount();

        $('#pus_id').change(function(e){
            pus_id = e.target.value;
            $('#chassis_no').val('');
            $('#engine_no').val('');
            $('#car_model').val('');
            $('#car_color').val('');
            $('#car_year').val('');
            $('#order_id').val(''); 
            $('#customer_id').val('');
            $('#cus_info').val('');

            if(pus_id != 0 && pus_id != ''){
                $.ajax({
                    url:'<?= base_url(); ?>find/purchase_info/'+pus_id,
                    type:'POST',
                    dataType:'json',
                    success:function(data){

                        if(data != 0){
                            $('#chassis_no').val(data.puc_chassis_no);
                            $('#engine_no').val(data.puc_engine_no);
                            $('#car_model').val(data.puc_car_model);
                            $('#car_color').val(data.puc_color);
                            $('#car_year').val(data.puc_year);
                            $('#order_id').val(data.order_id);
                            if(!isNaN(data.id) ){
                                $('#customer_id').val(data.id);
                                $('#cus_info').val(data.cus_code+'-'+data.cus_name);
                            }


                        }else{
                            swal({
                                text: "No Data Found...",
                                icon: "info",
                                buttons: false,
                                timer: 1500,
                            });
                        }

                    },error:function(error){
                        console.log(error);
                        swal({
                            text: "Some Thing Error...!",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                });
            }else{
                swal({
                    text: "First Select Chassis No",
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
            }
        });


        $('#lc_car_submit').click(function(){

            var lc_amount = $('#lc_amount').val();
            var car_qty = $('#car_qty').val();

            if(lc_amount =='' || lc_amount <= 0){
                $('#lc_amount').css('border', '1px solid red');
                $('#lc_amount').focus();
                swal({
                    text: "Insert Valid L/C Amount", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }else if(car_qty == '' || car_qty <= 0){
                $('#car_qty').css('border', '1px solid red');
                $('#car_qty').focus();
                swal({
                    text: "Insert Valid Car Quentity", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }

            var pus_id = $('#pus_id').val();
            var car_value = $('#car_value').val();
            var fright_value = $('#fright_value').val();

            $('#pus_id').css('border', '1px solid #d5d5d5');
            $('#car_value').css('border', '1px solid #d5d5d5');
            $('#fright_value').css('border', '1px solid #d5d5d5');


                
            if(pus_id != 0 && pus_id != ''){

                if(car_value > 0 && car_value != ''){

                    if(fright_value > 0 && fright_value != ''){

                        var grand_total = parseInt(cart_total)+parseInt(car_value)+parseInt(fright_value);
                        if(parseInt(grand_total) > parseInt(lc_amount)){
                            $('#fright_value').css('border', '1px solid red');
                            $('#fright_value').focus();
                            $('#car_value').css('border', '1px solid red');
                            swal({
                                text: "Total Add Amount is Grater than L/C Amount",
                                icon: "warning",
                                buttons: false,
                                timer: 1500,
                            });
                            return false;
                        }

                        var grand_qty = parseInt(cart_qty) +1;
                        if(grand_qty > parseInt(car_qty)){
                            $('#car_qty').css('border', '1px solid red');
                            $('#car_qty').focus();
                            swal({
                                text: "Total Add Car is Grater than L/C Quentity",
                                icon: "warning",
                                buttons: false,
                                timer: 1500,
                            });
                            return false;
                        }

                        $.ajax({
                            url:'<?= base_url();?>store/lc/car_info',
                            type:'POST',
                            dataType:'html',
                            data:$('#lc_car_info').serialize(),
                            success:function(data){
                                // alert(data);

                                if(data != 0){
                                    $('#tBody').empty();
                                    $('#tBody').html(data);
                                    $('#avi_lc_amt').html(parseInt(lc_amount)- parseInt(cart_total));
                                    swal({
                                        text: "L/C Car Info Store In Temporary",
                                        icon: "success",
                                        buttons: false,
                                        timer: 1500,
                                    });


                                    $('#chassis_no').val('');
                                    $('#engine_no').val('');
                                    $('#car_model').val('');
                                    $('#car_color').val('');
                                    $('#car_year').val('');
                                    $('#car_value').val('');
                                    $('#fright_value').val('');
                                    $('#customer_id').val('');
                                    $('#cus_info').val('');
                                }else{
                                    console.log(data);
                                    swal({
                                        text: "Some Thing Wrong Found.. Data Not store.",
                                        icon: "error",
                                        buttons: false,
                                        timer: 1500,
                                    });
                                }

                            },error:function(error){
                                console.log(error);
                                swal({
                                    text: "Some Error Found.. Data Not store.",
                                    icon: "error",
                                    buttons: false,
                                    timer: 1500,
                                });
                            }
                        });


                    }else{
                        $('#fright_value').css('border', '1px solid red');
                        $('#fright_value').focus();
                        swal({
                            text: "Given Valid Fright Value",
                            icon: "warning",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                }else{
                    $('#car_value').css('border', '1px solid red');
                    $('#car_value').focus();
                    swal({
                        text: "Given Valid Car Value",
                        icon: "warning",
                        buttons: false,
                        timer: 1500,
                    });
                }
            }else{
                $('#pus_id').css('border', '1px solid red');
                swal({
                    text: "First Select Chassis No",
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
            }


        });
    

    // L/c Informaion submit Form
        $('#lc_submit').click(function(){
            var lc_no = $('#lc_no').val();
            var lc_date = $('#lc_date').val();
            var lc_amount = $('#lc_amount').val();
            var car_qty = $('#car_qty').val();
            var bank_name = $('#bank_name').val();

            var comp_id = $('#comp_id').val();
            var supplier_id = $('#supplier_id').val();

            $('#lc_no').css('border', '1px solid #d5d5d5');
            $('#lc_date').css('border', '1px solid #d5d5d5');
            $('#lc_amount').css('border', '1px solid #d5d5d5');
            $('#car_qty').css('border', '1px solid #d5d5d5');
            $('#bank_name').css('border', '1px solid #d5d5d5');


            $('#comp_id_chosen .chosen-single').css('border', '1px solid #aaaaaa');
            $('#supplier_id_chosen .chosen-single').css('border', '1px solid #aaaaaa');

            if(lc_no == ''){
                $('#lc_no').css('border', '1px solid red');
                $('#lc_no').focus();
                swal({
                    text: "Insert L/C Number Pleass", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(lc_date == ''){
                $('#lc_date').css('border', '1px solid red');
                $('#lc_date').focus();
                swal({
                    text: "Insert L/C Date Pleass", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(lc_amount == '' || lc_amount <= 0){
                $('#lc_amount').css('border', '1px solid red');
                $('#lc_amount').focus();
                swal({
                    text: "Insert Valid L/C Amount", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(car_qty == '' || car_qty <= 0){
                $('#car_qty').css('border', '1px solid red');
                $('#car_qty').focus();
                swal({
                    text: "Insert Valid Car Quentity", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(bank_name == ''){
                $('#bank_name').css('border', '1px solid red');
                $('#bank_name').focus();
                swal({
                    text: "Insert Bank Name Pleass", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }

            if(comp_id == '' || comp_id <= 0){
                $('#comp_id_chosen .chosen-single').css('border', '1px solid red');
                $('#comp_id_chosen .chosen-single').focus();
                swal({
                    text: "Select Company Name", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }

            if(supplier_id == '' || supplier_id <= 0){
                $('#supplier_id_chosen .chosen-single').css('border', '1px solid red');
                $('#supplier_id_chosen .chosen-single').focus();
                swal({
                    text: "Pleass Select Supplier Name", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }

            $.ajax({
                url:'<?= base_url(); ?>lc/store',
                type:'POST',
                dataType:'json',
                data:$('#lc_form').serialize(),
                success:function(data){
                    console.log(data);

                    if(data != 0){
                        swal({
                            text: "L/C Information Store SuccessFully..",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                        setTimeout(function(){ window.location.reload(true); }, 1500);

                    }else{
                        swal({
                            text: "Opps...! Some Thing Found Worng",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }

                },error:function(error){
                    console.log(error);
                    swal({
                        text: "Opps...! Some Thing Found Worng",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            });

            
        });

        $('#lc_update').click(function(){

            var lc_no = $('#lc_no').val();
            var lc_date = $('#lc_date').val();
            var lc_amount = $('#lc_amount').val();
            var car_qty = $('#car_qty').val();
            var bank_name = $('#bank_name').val();

            var comp_id = $('#comp_id').val();
            var supplier_id = $('#supplier_id').val();

            $('#lc_no').css('border', '1px solid #d5d5d5');
            $('#lc_date').css('border', '1px solid #d5d5d5');
            $('#lc_amount').css('border', '1px solid #d5d5d5');
            $('#car_qty').css('border', '1px solid #d5d5d5');
            $('#bank_name').css('border', '1px solid #d5d5d5');


            $('#comp_id_chosen .chosen-single').css('border', '1px solid #aaaaaa');
            $('#supplier_id_chosen .chosen-single').css('border', '1px solid #aaaaaa');

            if(lc_no == ''){
                $('#lc_no').css('border', '1px solid red');
                $('#lc_no').focus();
                swal({
                    text: "Insert L/C Number Pleass", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(lc_date == ''){
                $('#lc_date').css('border', '1px solid red');
                $('#lc_date').focus();
                swal({
                    text: "Insert L/C Date Pleass", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(lc_amount == '' || lc_amount <= 0){
                $('#lc_amount').css('border', '1px solid red');
                $('#lc_amount').focus();
                swal({
                    text: "Insert Valid L/C Amount", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(car_qty == '' || car_qty <= 0){
                $('#car_qty').css('border', '1px solid red');
                $('#car_qty').focus();
                swal({
                    text: "Insert Valid Car Quentity", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
            if(bank_name == ''){
                $('#bank_name').css('border', '1px solid red');
                $('#bank_name').focus();
                swal({
                    text: "Insert Bank Name Pleass", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }

            if(comp_id == '' || comp_id <= 0){
                $('#comp_id_chosen .chosen-single').css('border', '1px solid red');
                $('#comp_id_chosen .chosen-single').focus();
                swal({
                    text: "Select Company Name", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }

            if(supplier_id == '' || supplier_id <= 0){
                $('#supplier_id_chosen .chosen-single').css('border', '1px solid red');
                $('#supplier_id_chosen .chosen-single').focus();
                swal({
                    text: "Pleass Select Supplier Name", 
                    icon: "warning",
                    buttons: false,
                    timer: 1500,
                });
                return false;
            }
debugger;
            $.ajax({
                url:'<?= base_url(); ?>lc/update/<?= (isset($lc) && $lc)? $lc->id:'' ?>',
                type:'POST',
                dataType:'json',
                data:$('#lc_form').serialize(),
                success:function(data){
                    debugger;
                    console.log(data);
                    
                    if(data != 0){
                        swal({
                            text: "L/C Information Updated SuccessFully..",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                        setTimeout(function(){ window.location.href='<?= base_url();?>lc/list'; }, 1500);

                    }else{
                        swal({
                            text: "Opps...! Some Thing Found Worng",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }

                },error:function(error){
                    console.log(error);
                    swal({
                        text: "Opps...! Some Thing Found Worng",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            });
        });

        $('#lc_amount').on('input',function(){
            avaible_amount();
        });
    });

function delete_lc_details(id){
    if(id != '' && id != 0){
        $.ajax({
            url:'<?= base_url();?>lc/details/delete/'+id,
            type:'POST',
            dataType:'html',
            success:function(data){

                if(data != 0){
                    $('#tBody').empty();
                    $('#tBody').html(data);
                    swal({
                        text: "Cart Information Destroy SuccessFully..!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    });   
                }else{
                    console.log(data);
                    swal({
                        text: "Some Thing Wrong Found..", 
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            },error:function(error){
                console.log(error);
                swal({
                    text: "Some Thing Wrong Found..", 
                    icon: "error",
                    buttons: false,
                    timer: 1500,
                });
            }
        });
    }
}

function cartRemove(rowid){
    var conf = confirm('Are You Sure You Went to Destroy it..!');
    if(conf){
        $.ajax({
            url:'<?= base_url();?>cart/destroy',
            type:'POST',
            dataType:'html',
            data:{rowid:rowid},
            success:function(data){

                if(data != 0){
                    $('#tBody').empty();
                    if(rowid !== 'All'){
                        $('#tBody').html(data);
                    }

                    
                    var lc_amount =parseInt($('#lc_amount').val());
                    var avi_lc_amt = lc_amount - parseInt(cart_total);

                    $('#avi_lc_amt').html(avi_lc_amt);

                    swal({
                        text: "Cart Information Destroy SuccessFully..!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    });
                }else{
                    console.log(data);
                    swal({
                        text: "Some Thing Wrong Found..", 
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            },error:function(error){
                console.log(error);
                swal({
                    text: "Some Thing Wrong Found..", 
                    icon: "error",
                    buttons: false,
                    timer: 1500,
                });
            }
        });
    }

    return false;
}

</script>