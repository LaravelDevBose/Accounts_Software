
<div class="row">
  <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">Employee Information List</h4>
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
                     
                      <th>Employee Name</th>
                      <th>Contact No.</th>
                      <th>Email Address</th>
                      <th>joining Date</th>
                      <th>Salary</th>
                      <th>Address</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>

                  <tbody id="tBody">
                      <?php  if($employees && isset($employees)): foreach($employees as $employee):?>
                    <tr>
                      <td><?= $employee->emp_name ?></td>
                      <td><?= $employee->emp_phone ?></td>
                      <td><?= $employee->emp_email ?></td>
                      <td>
                        <?php 
                          $date = new DateTime($employee->emp_join_date);
                          echo date_format($date, 'd M Y'); 
                        ?>
                            
                      </td>
                      <td><?= $employee->emp_sallary; ?></td>
                      <td><?= $employee->pre_address; ?></td>
                      <td>
                          <div class="hidden-sm hidden-xs action-buttons">
                              <a class="info linka fancybox fancybox.ajax" href="<?= base_url();?>employee/view/<?= $employee->id;?>" >
                                <i class="ace-icon fa fa-eye bigger-130"></i>
                              </a>
                              <a class="green " href="<?= base_url();?>employee/edit/<?= $employee->id;?>" >
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>
                              <a class="red" href="<?= base_url(); ?>employee/delete/<?= $employee->id ?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
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




