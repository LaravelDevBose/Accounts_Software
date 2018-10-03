 <!-- Page header -->
<div class="page-header">
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      
      <li>
        <a href="<?php echo base_url(); ?>admindashboard" class="btn btn-primary btn-xs" style="color: #ddd; background: #184C6F;">
          <i class="icon-home2 position-left"></i> Home
        </a>
      </li>

      <li class="active btn btn-primary btn-xs" style="background: #184C6F;"> 
      	<a href="<?php echo base_url(); ?>createAdmin" style="color: #ddd;">
       	 <i class="icon-plus3"></i> Create Admin Form &nbsp; &nbsp; &nbsp;
    	</a>
      </li>

      <li class="btn btn-primary btn-xs" style=" background: #1D2841;">
        <a href="<?php echo base_url(); ?>listAdmin" style="color: #ddd;">
          <i class="icon-eye"></i> List of Admin &nbsp; &nbsp; &nbsp;
        </a>
      </li>

    </ul>
  </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
  <!-- Main content -->
  <div class="row">
    <div class="col-lg-12">
    <!-- main page sources -->
    <div class="panel panel-flat">
    <!-- Form validation -->
        <?php $this->load->view('admin/error_success_msg'); ?>
		<table class="table table-bordered table-hover datatable-highlight"">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Image</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php 
			  		if ($FatchAdminData) :
			  		foreach ($FatchAdminData as $data) :
			  	 ?>
				<tr>
					<td><?php echo $data->admin_username; ?></td>
					<td><?php echo $data->admin_email; ?></td>
					<td><?php echo $data->admin_phone; ?></td>
					<td><?php echo $data->admin_address; ?></td>
					<td>
						<?php if($data->admin_image !=0 ) : ?>
							<img src="<?php echo base_url(); ?>libs/upload_pic/admin_pic/<?php echo $data->admin_image; ?>" style="height:40px; width:50px;">
						<?php elseif($data->admin_image  == 0) : ?>	
							<img src="<?php echo base_url(); ?>libs/upload_pic/no.png" style="height:40px; width:50px;">
						<?php endif; ?>
					</td>

					<td class="text-center">
						
						<ul class="icons-list">

						<?php if($this->session->userdata('id') != $data->admin_id && $data->admin_type == 'a') : ?>
							<li class="text-primary-600">
								<a href="<?php echo base_url(); ?>access_page/<?php echo $data->admin_id; ?>" class="linka fancybox fancybox.ajax" data-popup="tooltip" title data-original-title="Access_Define"><i class="icon-user-lock"></i></a>
							</li> &nbsp;
							<?php endif; ?>

							<?php if($this->session->userdata('id') == $data->admin_id || $data->admin_type == 'a') : ?>
							<li class="text-primary-600">
								<a href="<?php echo base_url(); ?>editAdmin/<?php echo $data->admin_id; ?>"  data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
							</li> &nbsp;
							<?php endif; ?>

							<?php if($this->session->userdata('id') == $data->admin_id || $data->admin_type == 'a') : ?>
				            	<li class="text-danger-600">
				                	<a onclick="return confirm('Are you sure want to delete this data ? ')" href="<?php echo base_url(); ?>deleteAdmin/<?php echo $data->admin_id; ?>" data-popup="tooltip" title data-original-title="Delete_Data"><i class="icon-trash"></i></a>
				            	</li>
				            <?php endif; ?>
				        </ul>

					</td>
				</tr>

				<?php  endforeach; endif;  ?>

			</tbody>
		</table>
      </div>
    </div>
    <!-- /main page sources -->
</div>
  <!-- /main content -->





						