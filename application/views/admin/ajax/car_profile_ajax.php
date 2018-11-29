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
    });


    function car_search(search_value, search_type) {

        // alert(search_value);
        if(search_value.length > 0 && search_value ){
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
    }

</script>