
<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Customer Information List</h4>
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
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                     
                      <th colspan="2">Customer Info</th>
                      <th>Contact No.</th>
                      <th>Email Address</th>
                      <th>Entry Date</th>
                      <th>Address</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>

                  <tbody id="tBody">
                      <?php  if($customers && isset($customers)): foreach($customers as $customer):?>
                    <tr>
                      <?php  $image = base_url().$customer->cus_image;  if(!file_exists($image) && !getimagesize($image) ){ $image =base_url().'libs/upload_pic/no.png';} ?>
                      <td><img src="<?= $image ?>" alt="" style="height: 40px; width: 40px; border: 1px solid #ddd;"></td>
                      <td><?= $customer->cus_code.'-'.$customer->cus_name ?></td>
                      <td><?= $customer->cus_contact_no.'<br>'.$customer->alt_contact_no ?></td>
                      <td><?= $customer->cus_email ?> </td>
                      <td>
                        <?php 
                          $date = new DateTime($customer->cus_entry_date);
                          echo date_format($date, 'd M Y'); 
                        ?>
                            
                      </td>
                      <td><?= $customer->cus_address; ?></td>
                      <td>
                          <div class="hidden-sm hidden-xs action-buttons">
                              <a class="green " href="<?= base_url();?>customer/edit/<?= $customer->id;?>" >
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>
                              <a class="red" href="<?= base_url(); ?>customer/delete/<?= $customer->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
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




