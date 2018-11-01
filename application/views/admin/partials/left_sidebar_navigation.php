<!--Left Menu==================-->
<!--Left Menu==================-->


<ul class="nav nav-list">
  <li class="<?= ($this->router->class == 'Admindashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>"> 
      <i class="menu-icon fa fa-tachometer"></i>
      <span class="menu-text"> Dashboard </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php if($this->uri->uri_string()== 'Admindashboard'){ ?>
  <?php if($access->sale_module == 1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'order/dashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url();?>order/dashboard"> 
      <i class="menu-icon fa fa-shopping-bag"></i>
      <span class="menu-text"> Sales Module </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->purchase_module ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'purchase/dashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>purchase/dashboard"> 
      <i class="menu-icon fa fa-cart-arrow-down"></i>
      <span class="menu-text"> Purchase Module </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->account_module ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'account/dashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>account/dashboard"> 
      <i class="menu-icon fa fa-clipboard"></i>
      <span class="menu-text"> Account Module </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->hr_module ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'hr_payroll/dashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url();?>hr_payroll/dashboard"> 
      <i class="menu-icon fa fa-users"></i>
      <span class="menu-text"> HR & Payroll Module </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->report_module ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'report/dashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>report/dashboard"> 
      <i class="menu-icon fa fa-print"></i>
      <span class="menu-text"> Reports Module </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->administration ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'administration/dashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>administration/dashboard"> 
      <i class="menu-icon fa fa-cogs"></i>
      <span class="menu-text"> Administration </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } ?>
  <?php } elseif($this->router->class == 'Order' || ucfirst($this->router->class) == 'Customer' || $this->router->method == 'sale_dashboard'){ ?>
    <?php  if($access->customer_order ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'customer/order/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>customer/order/insert"> 
      <i class="menu-icon fa fa-shopping-cart"></i>
      <span class="menu-text">Customer & Order </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php } if($access->order_entry ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'order/insert')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>order/insert"> 
      <i class="menu-icon fa fa-cart-plus"></i>
      <span class="menu-text"> Order Entry </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->all_order_list ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'order/list')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>order/list"> 
      <i class="menu-icon fa fa-list-ul"></i>
      <span class="menu-text"> All Order List </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->pending_order_list ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'order/pending/list')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>order/pending/list"> 
      <i class="menu-icon fa fa-list-ol"></i>
      <span class="menu-text"> Order Pending List </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->process_order_list ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'order/onprocess/list')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>order/onprocess/list"> 
      <i class="menu-icon fa fa-th-list"></i>
      <span class="menu-text">On-Process List </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->customer_entry ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'customer/insert')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>customer/insert"> 
      <i class="menu-icon fa fa-user-plus"></i>
      <span class="menu-text"> Customer Entry </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->customer_list ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'customer')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>customer"> 
      <i class="menu-icon fa fa-users"></i>
      <span class="menu-text"> Customer List  </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } ?>
  <?php } elseif($this->router->class == 'Supplier' || $this->router->class == 'Purchase' || $this->router->class == 'Transport' || $this->router->method == 'purchase_dashboard'){ ?>
<?php  if($access->purchase_entry ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'purchase/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>purchase/insert">
      <i class="menu-icon fa fa-cart-plus"></i>
      <span class="menu-text">Purchase Entry </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php } if($access->purchase_list ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'purchase/list')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>purchase/list">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text">Purchase List </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php } if($access->transport_status ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'transport/status')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>transport/status">
      <i class="menu-icon fa fa-ship"></i>
      <span class="menu-text">Transport Status </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php } if($access->supplier ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'supplier/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>supplier/insert">
      <i class="menu-icon fa fa-users"></i>
      <span class="menu-text">Suppliers </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php } if($access->transport_head ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'transport/head')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>transport/head">
      <i class="menu-icon fa fa-car"></i>
      <span class="menu-text">Transport Head  </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php } ?>
  <?php } elseif($this->uri->uri_string()== 'collections' || $this->uri->uri_string()== 'payment' ||$this->uri->uri_string()== 'office_payment' || strpos($this->uri->uri_string(), 'account') !== false || strpos($this->uri->uri_string(), 'check') !== false || $this->router->method == 'accounts_dashboard'){ ?>
<?php if($access->collection ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'collections')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>collections">
      <i class="menu-icon fa fa-usd"></i>
      <span class="menu-text">Collection Entry  </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->payment ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'payment')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>payment">
      <i class="menu-icon fa fa-money"></i>
      <span class="menu-text">Payments Entry  </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->ofice_payment ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'office_payment')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>office_payment">
      <i class="menu-icon fa fa-suitcase"></i>
      <span class="menu-text">Office Payment Entry   </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->other_income ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'account/other_income')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>account/other_income">
      <i class="menu-icon fa fa-car"></i>
      <span class="menu-text">Other Income Entry  </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->check_option ==1){ ?>
  <li class="<?= (strpos($this->uri->uri_string(), 'check') !== false)? 'active open': '' ?>">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-credit-card"></i>
      <span class="menu-text"> Check</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <?php  if($access->check_entry ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'check/entry')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>check/entry">
          <i class="menu-icon fa fa-caret-right"></i>
          Check Entry
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->pending_check_list ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'check/pending/list')?'active': ' ' ?>">
        <a href="<?php echo base_url();?>check/pending/list">
          <i class="menu-icon fa fa-caret-right"></i>
           Pending Check List 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->reminder_check_list ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'check/reminder/list')?'active': ' ' ?>">
        <a href="<?php echo base_url();?>check/reminder/list">
          <i class="menu-icon fa fa-caret-right"></i>
           Check Reminder List 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->paid_check_list ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'check/paid/list')?'active': ' ' ?>">
        <a href="<?php echo base_url();?>check/paid/list">
          <i class="menu-icon fa fa-caret-right"></i>
           Paid Check List
        </a>
        <b class="arrow"></b>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>
  <?php } elseif(strpos($this->uri->uri_string(), 'employees') !== false || strpos($this->uri->uri_string(), 'employee') !== false || $this->uri->uri_string()== 'hr_payroll/dashboard' || $this->router->method == 'hr_payroll_dashboard' ){?>
<?php  if($access->sallay_payment ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'employee/salary')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>employee/salary">
      <i class="menu-icon fa fa-money"></i>
      <span class="menu-text">Salary Payment </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->employee_list ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'employees')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>employees">
      <i class="menu-icon fa fa-users"></i>
      <span class="menu-text">Employee List </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->employee_entry ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'employee/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>employee/insert">
      <i class="menu-icon fa fa-user-plus"></i>
      <span class="menu-text">Add Employee </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->monthe_entry ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'employee/month')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>employee/month">
      <i class="menu-icon fa fa-calendar-plus-o"></i>
      <span class="menu-text">Add Month </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } ?>
  <?php } elseif(strpos($this->uri->uri_string(), 'report') !== false || $this->router->method == 'reports_dashboard' ){?>
  <?php  if($access->report_module ==1){ ?>
  <li class="<?= (strpos($this->uri->uri_string(), 'report') !== false)?'active open': ' ' ?>">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-print"></i>
      <span class="menu-text"> Reports</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <?php  if($access->stock_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/car/stock')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/car/stock">
          <i class="menu-icon fa fa-caret-right"></i>
          Car Stock Report
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->car_full_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/full_report')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/full_report">
          <i class="menu-icon fa fa-caret-right"></i>
          Car Full Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->car_coll_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/car_wise/collection')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/car_wise/collection">
          <i class="menu-icon fa fa-caret-right"></i>
          Car Collection Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->cus_due_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/due')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/due">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer Due Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->cus_order_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/customer_order')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/customer_order">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer Order Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->deliv_order_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/delivery_order')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/delivery_order">
          <i class="menu-icon fa fa-caret-right"></i>
          Delivered Order Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->lc_order_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/lc/order')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/lc/order">
          <i class="menu-icon fa fa-caret-right"></i>
          L/C Wise Order Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->collection_report ==1){ ?>

      <li class="<?= ($this->uri->uri_string()== 'report/collection')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/collection">
          <i class="menu-icon fa fa-caret-right"></i>
          Collection Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->cus_coll_report ==1){ ?>

      <li class="<?= ($this->uri->uri_string()== 'report/customer_wise/collection')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/customer_wise/collection">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer Collection Report 
        </a>
        <b class="arrow"></b>
      </li>
      
      <?php } if($access->date_payment_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/date_wise_payment')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/date_wise_payment">
          <i class="menu-icon fa fa-caret-right"></i>
          Date Wise Payment Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->supplier_payment_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/supplier_payment')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/supplier_payment">
          <i class="menu-icon fa fa-caret-right"></i>
          Supplier Payment Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->office_payment_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/office_payment')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/office_payment">
          <i class="menu-icon fa fa-caret-right"></i>
          Office Payment Report 
        </a>
        <b class="arrow"></b>
      </li>

      <?php } if($access->sallary_report ==1){ ?>

      <li class="<?= ($this->uri->uri_string()== 'report/salary/date_to_date')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/salary/date_to_date">
          <i class="menu-icon fa fa-caret-right"></i>
          Date To Date Salary Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->emp_sallary_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/salary/empl')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/salary/empl">
          <i class="menu-icon fa fa-caret-right"></i>
          Employee Salary Report 
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->lc_list_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/lc')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/lc">
          <i class="menu-icon fa fa-caret-right"></i>
          L/C List
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->cus_list_report ==1){ ?>
      <li class="<?= ($this->uri->uri_string()== 'report/customer')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/customer">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer List Report 
        </a>
        <b class="arrow"></b>
      </li>
    <?php } ?>
    
    </ul>
  </li>
  <?php } }else{ ?>
<?php if($access->lc_entry ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'lc/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>lc/insert">
      <i class="menu-icon fa fa-cc"></i>
      <span class="menu-text">L/C Entry </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->expense_head_entry ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'ie_head/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>ie_head/insert">
      <i class="menu-icon fa fa-money"></i>
      <span class="menu-text">Expense Head </span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->company_info ==1){ ?>
  <li class="<?= ($this->uri->uri_string()== 'setting/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>setting/insert">
      <i class="menu-icon fa fa-university"></i>
      <span class="menu-text">Company Info</span>
    </a>
    <b class="arrow"></b>
  </li>
  <?php } if($access->admin ==1){ ?>
  <li class="">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-user-secret"></i>
      <span class="menu-text"> Admin</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <?php  if($access->admin_entry ==1){ ?>
      <li class="">
        <a href="<?php echo base_url(); ?>createAdmin">
          <i class="menu-icon fa fa-caret-right"></i>
          Add Admin
        </a>
        <b class="arrow"></b>
      </li>
      <?php } if($access->admin_list ==1){ ?>
      <li class="">
        <a href="<?php echo base_url(); ?>listAdmin">
          <i class="menu-icon fa fa-caret-right"></i>
          Admin List
        </a>
        <b class="arrow"></b>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>
  <?php } ?>
  <li class="">
    <a href="<?php echo base_url(); ?>Adminlogin/logout">
      <i class="menu-icon fa fa-sign-out"></i>
      <span class="menu-text"> Logout </span>
    </a>
    <b class="arrow"></b>
  </li>
</ul>
<!--End Left Menu==================-->

