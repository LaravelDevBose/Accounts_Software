<!--Left Menu==================-->
<!--Left Menu==================-->
<ul class="nav nav-list">
  <li class="<?= ($this->uri->uri_string()== 'Admindashboard')?'active': ' ' ?>">
    <!-- module/dashboard -->
    <a href="<?php echo base_url(); ?>"> 
      <i class="menu-icon fa fa-tachometer"></i>
      <span class="menu-text"> Dashboard </span>
    </a>
    <b class="arrow"></b>
  </li>
  
  <li class="<?= (strpos($this->uri->uri_string(), 'customers') !== false)?'active open':(($this->uri->uri_string()== 'customer/insert')? 'active open': '') ?>">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-clipboard"></i>
      <span class="menu-text"> Customer</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="<?= ($this->uri->uri_string()== 'customer/insert')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>customer/insert">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer Entry
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'customers')?'active': ' ' ?>">
        <a href="<?php echo base_url();?>customers">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer List 
        </a>
        <b class="arrow"></b>
      </li>
      
    </ul>
  </li>
  
  <li class="<?= ($this->uri->uri_string()== 'order/list')?'active open':((strpos($this->uri->uri_string(), 'order') !== false)? 'active open': '') ?>">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-clipboard"></i>
      <span class="menu-text"> Order</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="<?= ($this->uri->uri_string()== 'order/insert')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>order/insert">
          <i class="menu-icon fa fa-caret-right"></i>
          Order Entry
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'order/list')?'active': ' ' ?>">
        <a href="<?php echo base_url();?>order/list">
          <i class="menu-icon fa fa-caret-right"></i>
           Order List 
        </a>
        <b class="arrow"></b>
      </li>
      
    </ul>
  </li>


  <li class="<?= ($this->uri->uri_string()== 'lc/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>lc/insert">
      <i class="menu-icon fa fa-usd"></i>
      <span class="menu-text"> L / C  Entry </span>
    </a>
    <b class="arrow"></b>
  </li>

  <li class="<?= ($this->uri->uri_string()== 'ie_head/insert')?'active': ' ' ?>">
    <a href="<?php echo base_url(); ?>ie_head/insert">
      <i class="menu-icon fa fa-usd"></i>
      <span class="menu-text"> Expense Head </span>
    </a>
    <b class="arrow"></b>
  </li>

  <li class="<?= (strpos($this->uri->uri_string(), 'collections') !== false)?'active open':((strpos($this->uri->uri_string(), 'account') !== false)? 'active open': '') ?>">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-clipboard"></i>
      <span class="menu-text"> Accounts</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="<?= ($this->uri->uri_string()== 'collections')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>collections">
          <i class="menu-icon fa fa-caret-right"></i>
          Collection Entry 
        </a>
        <b class="arrow"></b>
      </li>
      <li class="">
        <a href="<?php echo base_url(); ?>">
          <i class="menu-icon fa fa-caret-right"></i>
          Office Payment Entry 
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'account/payment')?'active': ' ' ?>" ">
        <a href="<?php echo base_url(); ?>account/payment">
          <i class="menu-icon fa fa-caret-right"></i>
          Payments Entry
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'account/other_income')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>account/other_income">
          <i class="menu-icon fa fa-caret-right"></i>
          Other Income Entry 
        </a>
        <b class="arrow"></b>
      </li>
    </ul>
  </li>

  <li class="">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-user"></i>
      <span class="menu-text"> Employee</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="">
        <a href="<?php echo base_url(); ?>employee/insert">
          <i class="menu-icon fa fa-caret-right"></i>
          Add Employee
        </a>
        <b class="arrow"></b>
      </li>
      <li class="">
        <a href="<?php echo base_url(); ?>employees">
          <i class="menu-icon fa fa-caret-right"></i>
          Employee List 
        </a>
        <b class="arrow"></b>
      </li>
      
    </ul>
  </li>


  <li class="<?= (strpos($this->uri->uri_string(), 'report') !== false)?'active open': ' ' ?>">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-print"></i>
      <span class="menu-text"> Reports</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="<?= ($this->uri->uri_string()== 'report/lc')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/lc">
          <i class="menu-icon fa fa-caret-right"></i>
          L / C List
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'report/customer')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/customer">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer List Report 
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'report/lc/order')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/lc/order">
          <i class="menu-icon fa fa-caret-right"></i>
          L / C Wise Order Report 
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'report/customer_order')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/customer_order">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer Order Report 
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'report/delivery_order')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/delivery_order">
          <i class="menu-icon fa fa-caret-right"></i>
          Delivered Order Report 
        </a>
        <b class="arrow"></b>
      </li>

      <li class="<?= ($this->uri->uri_string()== 'report/collection')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/collection">
          <i class="menu-icon fa fa-caret-right"></i>
          Collection Report 
        </a>
        <b class="arrow"></b>
      </li>

      <li class="<?= ($this->uri->uri_string()== 'report/customer_wise/collection')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/customer_wise/collection">
          <i class="menu-icon fa fa-caret-right"></i>
          Customer Collection Report 
        </a>
        <b class="arrow"></b>
      </li>
      <li class="<?= ($this->uri->uri_string()== 'report/car_wise/collection')?'active': ' ' ?>">
        <a href="<?php echo base_url(); ?>report/car_wise/collection">
          <i class="menu-icon fa fa-caret-right"></i>
          Car Collection Report 
        </a>
        <b class="arrow"></b>
      </li>

    </ul>
  </li>

  <li class="">
    <a href="<?php echo base_url(); ?>" class="dropdown-toggle">
      <i class="menu-icon fa fa-user-secret"></i>
      <span class="menu-text"> Admin</span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
      <li class="">
        <a href="<?php echo base_url(); ?>createAdmin">
          <i class="menu-icon fa fa-caret-right"></i>
          Add Admin
        </a>
        <b class="arrow"></b>
      </li>
      <li class="">
        <a href="<?php echo base_url(); ?>listAdmin">
          <i class="menu-icon fa fa-caret-right"></i>
          Admin List
        </a>
        <b class="arrow"></b>
      </li>
      
    </ul>
  </li>



  <li class="">
    <a href="<?php echo base_url(); ?>Adminlogin/logout">
      <i class="menu-icon fa fa-sign-out"></i>
      <span class="menu-text"> Logout </span>
    </a>
    <b class="arrow"></b>
  </li>
</ul>
<!--End Left Menu==================-->

