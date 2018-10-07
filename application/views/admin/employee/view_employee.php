<div class="widget-box" style="width: 500px;">
  <div class="widget-header">
    <h4 class="widget-title">View Employee Information</h4>
  </div>

  <div class="widget-body">
    <div class="widget-main">


      <div class="row">
        <div class="col-xs-12">
          <table  class="table table-striped table-bordered table-hover">
            <tbody id="tBody">
                <tr>
                  <th>Employee Name: </th>
                  <td><?= $employee->emp_name ?></td>
                </tr>
                <tr>
                  <th>Date of Birth: </th>
                  <td>
                    <?php 
                      $date = new DateTime($employee->emp_dob);
                      echo date_format($date, 'd M Y'); 
                    ?>
                  </td>
                </tr>
                <tr>
                  <th>NID Number: </th>
                  <td><?= $employee->emp_nid ?></td>
                </tr>
                <tr>
                  <th>Phone Number: </th>
                  <td><?= $employee->emp_phone ?></td>
                </tr>
                <tr>
                  <th>Email Address: </th>
                  <td><?= $employee->emp_email  ?></td>
                </tr>
                <tr>
                  <th>Joining Date: </th>
                  <td>
                    <?php 
                      $date = new DateTime($employee->emp_join_date);
                      echo date_format($date, 'd M Y'); 
                    ?>
                  </td>
                </tr>
                <tr>
                  <th>Sallary: </th>
                  <td><?= $employee->emp_sallary ?></td>
                </tr>
                <tr>
                  <th>Present Address: </th>
                  <td><?= $employee->pre_address ?></td>
                </tr>
                <tr>
                  <th>Parmanent Address: </th>
                  <td><?= $employee->par_address?></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>