<div class="widget-box" style="width:500px;">
  <div class="widget-header">
    <h4 class="widget-title">Update Expense Head Information</h4>
  </div>

  <div class="widget-body">
    <div class="widget-main">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <div class="row" style="padding: 15px;">
            <div class="col-xs-12 label label-lg label-info arrowed-in arrowed-right">
              <b>Car Info</b>
            </div>
          </div>
          <div class="profile-user-info profile-user-info-striped">
            
            <div class="profile-info-row">
              <div class="profile-info-name"> Chassis No </div>

              <div class="profile-info-value">
                <span class="editable" id="age"><?= $order->ord_chassis_no ?></span>
              </div>
            </div>

            <div class="profile-info-row">
              <div class="profile-info-name"> Engine No: </div>

              <div class="profile-info-value">
                <span class="editable" id="signup"><?= $order->ord_engine_no ?></span>
              </div>
            </div>

            <div class="profile-info-row">
              <div class="profile-info-name"> Car Model: </div>

              <div class="profile-info-value">
                <span class="editable" id="login"><?= $order->ord_car_model ?></span>
              </div>
            </div>
            <div class="profile-info-row">
              <div class="profile-info-name"> Car Year: </div>

              <div class="profile-info-value">
                <span class="editable" id="login"><?= $order->ord_car_model ?></span>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-5">

          <div class="row" style="padding: 15px;">
            <div class="col-xs-12 label label-lg label-success arrowed-in arrowed-right">
              <b>Other Info</b>
            </div>
          </div>
          <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
              <div class="profile-info-name">Customer Name:</div>

              <div class="profile-info-value">
                <span class="editable" id="username"><?= $customer->cus_name; ?></span>
              </div>
            </div>
            <div class="profile-info-row">
              <div class="profile-info-name">Customer Phone No: </div>

              <div class="profile-info-value">
                <span class="editable" id="age"><?= $customer->cus_contact_no; ?></span>
              </div>
            </div>

            <div class="profile-info-row">
              <div class="profile-info-name">Supplier Name: </div>

              <div class="profile-info-value">
                <span class="editable" id="signup"><?= $customer->alt_contact_no; ?></span>
              </div>
            </div>

            <div class="profile-info-row">
              <div class="profile-info-name">Supplier Phone No: </div>

              <div class="profile-info-value">
                <span class="editable" id="login"><?= $customer->cus_email; ?></span>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>





