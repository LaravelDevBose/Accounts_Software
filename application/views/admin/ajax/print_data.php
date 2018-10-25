<script>
  

  function print_data(){

    /*------ Get Full Body html Code------*/
    var orginal_content = $('body').html()

    /*== hide last action colume======*/
    // $('.action').css('display', 'none');

    $('#dynamic-table_length').css('display', 'none');
    $('#dynamic-table_filter').css('display', 'none');
    $('#dynamic-table_info').css('display', 'none');
    $('#dynamic-table_paginate').css('display', 'none');
    $('#table-header').css('display', 'none');
    
    $('#header').css('display', 'block');
    /*----  Get all html in data_table div ---*/
    var print_contents = $('#data_table').html();

    /*----- make new page by add after body of print_content -----*/
    $('body').html(print_contents);

    /*------- Print New Page -------*/
     window.print();

    /*------- After print bake the main page------*/
    location.reload();
    $('body').html(orginal_content);
  }
</script>