
<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Admin Information List</h4>
        <div class="widget-toolbar">
          <a href="#" data-action="collapse">
            <i class="ace-icon fa fa-chevron-up"></i>
          </a>

          <a href="#" data-action="close">
            <i class="ace-icon fa fa-times"></i>
          </a>
        </div>
      </div>

      <div class="widget-body">
        <div class="widget-main">


          <div class="row">
            <div class="col-xs-12">

              <div class="table-header">
                Admin Information List
              </div>

              <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                 <tr>
                  <th>Sl No</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Image</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>

              <tbody id="tBody">
                <?php $i=1; if($admins && isset($admins)): foreach($admins as $data):?>
                <tr>
                 <td><?= $i++ ?></td>
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
                  <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                      <a class="green" href="<?php echo base_url(); ?>access_page/<?php echo $data->admin_id; ?>" >
                        <i class="ace-icon fa fa-cogs bigger-130"></i>
                      </a>
                      <a class="info " href="<?php echo base_url(); ?>editAdmin/<?php echo $data->admin_id; ?>" >
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                      </a>
                      <?php if($data->admin_id !=$this->session->userdata('id') ):?>
                        <a class="red" href="<?php echo base_url(); ?>deleteAdmin/<?php echo $data->admin_id; ?>"  onclick="return confirm('Are You Sure Went to Delete This! ')">
                          <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                      <?php endif; ?>
                    </div>
                  </td>


                </tr>
              <?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>
</div>












