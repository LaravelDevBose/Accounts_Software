<script>
	$('#head_submit').click(function(){
		var head_name = $('#head_name').val();

		if(head_name != '' && head_name.length >0){
			$.ajax({
				url:'<?= base_url()?>trans/head/store',
				type:'POST',
				dataType: 'html',
				data:{head_name:head_name},
				success:function(data){
					if(data != 0){
						 $('#head_name').val('');
						$('#tBody').html(data);
					}
				},error:function(error){
					console.log(error);
				}
			});
		}
	});
</script>