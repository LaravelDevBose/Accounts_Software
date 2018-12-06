<script>
    $(document).ready(function() {

        $('#upload_form').click(function() {
            $('#car_image_form').toggle();
        });

        $('#doc_upload_form').click(function() {
            $('#car_doc_form').toggle();
        });

        $('#lc_doc').click(function() {
            $('#lc_doc_form').toggle();
        });

        $('#reg_from').submit(function(){
            var reg_no = $('#reg_no').val();

            if(reg_no == ''){
                alert('Insert Registration no');
                return false;
            }

            var reg_date = $('#reg_date').val();

            if(reg_date == ''){
                alert('select Registration Date');
                return false;
            }

            var reg_area = $('#reg_area').val();

            if(reg_area == ''){
                alert('Insert Registration Area');
                return false;
            }

            var owner_name = $('#owner_name').val();

            if(owner_name == ''){
                alert('Insert Owner Name');
                return false;
            }

            return true;
        });

        $('.image_delete').click(function(){
            var con = confirm('Are You Sure Went to Delete This! ');

            if(con){
                var id = $(this).attr('id');
                $.ajax({
                    url:'<?= base_url();?>car/image/delete/'+id,
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                        if(data == 1){
                            $('#image_'+id).fadeOut();
                            swal({
                                text: "Image Delete Successfully",
                                icon: "success",
                                buttons: false,
                                timer: 1500,
                            });
                        }else{
                            swal({
                                text: "Image Not Delete Successfully",
                                icon: "success",
                                buttons: false,
                                timer: 1500,
                            });
                        }
                    },error:function(error){
                        console.log(error);
                        swal({
                            text: "Some Thing Find Wrong..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }

                });
            }
        });

        $('.lc_doc_delete').click(function(){
            var con = confirm('Are You Sure Went to Delete This! ');

            if(con){
                var id = $(this).attr('id');
                $.ajax({
                    url:'<?= base_url();?>car/doc/delete/'+id,
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                        if(data == 1){
                            $('#lc_doc_'+id).fadeOut();
                            swal({
                                text: "L/C Document Delete Successfully",
                                icon: "success",
                                buttons: false,
                                timer: 1500,
                            });
                        }else{
                            swal({
                                text: "L/C Document Not Delete Successfully",
                                icon: "success",
                                buttons: false,
                                timer: 1500,
                            });
                        }
                    },error:function(error){
                        console.log(error);
                        swal({
                            text: "Some Thing Find Wrong..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }

                });
            }
        });

        $('.reg_doc_delete').click(function(){
            var con = confirm('Are You Sure Went to Delete This! ');

            if(con){
                var id = $(this).attr('id');
                $.ajax({
                    url:'<?= base_url();?>reg/doc/delete/'+id,
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                        if(data == 1){
                            $('#reg_doc_'+id).fadeOut();
                            swal({
                                text: "Registration Document Delete Successfully",
                                icon: "success",
                                buttons: false,
                                timer: 1500,
                            });
                        }else{
                            swal({
                                text: "Registration Document Not Delete Successfully",
                                icon: "success",
                                buttons: false,
                                timer: 1500,
                            });
                        }
                    },error:function(error){
                        console.log(error);
                        swal({
                            text: "Some Thing Find Wrong..!",
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }

                });
            }
        });
    });


    function car_search(search_value, search_type) {
        $.ajax({
            url:'<?= base_url();?>car/search',
            type:'POST',
            dataType:'html',
            data:{search_value:search_value, search_type:search_type},
            success:function(data){
                $('#search_tbody').empty();
                if(data != 0){
                    $('#search_tbody').html(data);
                }else{
                    var html = '<tr>\n' +
                        '            <td colspan="11">\n' +
                        '                <p class="alert alert-info text text-center">\n' +
                        '                    <i class="ace-icon fa fa-info-circle bigger-130"></i>  No Data Found----!\n' +
                        '                </p>\n' +
                        '            </td>\n' +
                        '        </tr>';
                    $('#search_tbody').html(html);
                    // swal({
                    //     text: "No data Match...!",
                    //     icon: "info",
                    //     buttons: false,
                    //     timer: 1500,
                    // });
                }
            },error:function(error){
                console.log(error);
                swal({
                    text: "Some Thing Find Wrong..!",
                    icon: "error",
                    buttons: false,
                    timer: 1500,
                });
            }

        });
    }



</script>