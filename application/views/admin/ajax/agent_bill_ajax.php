<script>
    $(document).ready(function(e) {
        $('#agent_id').change(function(e){
           var agent_id = e.target.value;

            if(agent_id != 0 && agent_id != ''){
                $.ajax({
                   url:'<?= base_url()?>agent_due_amount/'+agent_id,
                   type:'post',
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
            }
        });
        $('#bill_save').on('click',function(){

            var bp_date = $('#bp_date').val();
            if(bp_date === '' && bp_date.length ==0){
                alert('Select A Date');
                return false;
            }

            var agent_id = $('#agent_id').val();
            if(agent_id === '' && agent_id.length ==0){
                alert('Select A C&F Agent');
                return false;
            }
            var bill_no = $('#bill_no').val();
            if(bill_no === '' && bill_no.length ==0){
                alert('Insert A Bill No');
                return false;
            }
            var particulars = $('#particulars').val();
            if(particulars === '' && particulars.length ==0){
                alert('Insert Particulars');
                return false;
            }
            var bill_amount = $('#bill_amount').val();
            if(bill_amount === '' && bill_amount.length ==0){
                alert('Enter Bill Amount');
                return false;
            }

            $.ajax({
                url:'<?= base_url("titu/agent_bill_payment_store")?>',
                type:'POST',
                dataType: 'html',
                data:$('#agent_bill_store').serialize(),
                success:function(data){
                    if(data !== 0){
                        $('#agent_bill_store')[0].reset();
                        $('#agent_id').val('');
                        $('.chosen-select').trigger('chosen:updated');
                        $('#due_amount').html('00.0');

                        $('#tBody').empty();
                        $('#tBody').html(data);
                        swal({
                            text: "Store Successful..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }else{
                        swal({
                            text: "Store Unsuccessful..!",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                },error:function(error){
                    console.log(error);
                    swal({
                        text: "Store Unsuccessful..! Some Error Found",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            });
        });
        $('#pay_save').on('click',function(){

            var bp_date = $('#bp_date').val();
            if(bp_date === '' && bp_date.length ==0){
                alert('Select A Date');
                return false;
            }

            var agent_id = $('#agent_id').val();
            if(agent_id === '' && agent_id.length ==0){
                alert('Select A C&F Agent');
                return false;
            }
            var particulars = $('#particulars').val();
            if(particulars === '' && particulars.length ==0){
                alert('Insert Particulars');
                return false;
            }
            var paid_amount = $('#paid_amount').val();
            if(paid_amount === '' && paid_amount.length ==0){
                alert('Enter Paid Amount');
                return false;
            }

            $.ajax({
                url:'<?= base_url("titu/agent_bill_payment_store")?>',
                type:'POST',
                dataType: 'html',
                data:$('#agent_bill_store').serialize(),
                success:function(data){
                    if(data !== 0){
                        $('#agent_bill_store')[0].reset();
                        $('#agent_id').val('');
                        $('.chosen-select').trigger('chosen:updated');
                        $('#due_amount').html('00.0');

                        $('#tBody').empty();
                        $('#tBody').html(data);
                        swal({
                            text: "Store Successful..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }else{
                        swal({
                            text: "Store Unsuccessful..!",
                            icon: "error",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                },error:function(error){
                    console.log(error);
                    swal({
                        text: "Store Unsuccessful..! Some Error Found",
                        icon: "error",
                        buttons: false,
                        timer: 1500,
                    });
                }
            });
        });
    })
</script>