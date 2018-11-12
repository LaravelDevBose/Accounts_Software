<style type="text/css">
  li{
    list-style:none;
    font-size:15px;
  }
  .myace{
    width: 15px;
    height: 15px;
    cursor: pointer;
    background-color:#4C8FBD;
    margin: 4px 10px 0;
  }
  strong {
    font-size:15px;
    color:#000;
  }

  input[type=checkbox], input[type=radio] {
    margin: 4px 7px 0;
    line-height: normal;
  }
</style>

<form action="<?php echo base_url() ?>define_access" method="post">
  <div class="access">
    <input type="hidden" value="<?php echo $id; ?>" name="admin_id" id="admin_id">

    <div class="col-xs-12">
      <div class="access">
        <div class="col-xs-12" style="background:#ddd;text-align:center;height:25px;line-height:25px;font-size:16px;margin:5px 0px 10px 0px;">
         <div class="form-group">
           <div class="col-sm-2">
            <div class="">
             <input type="checkbox" name="checkAll" id="checkAll" class="ace" />
             <span class="lbl"> <strong> Check All </strong> </span>
           </div>
         </div>
       </div> 
       <strong style="font-size:16px;">Menu Access Priority </strong>
     </div>

     <div class="col-sm-3 col-sm-offset-1">
      <!-- <ul id="brunch_menu"> -->
        <li>
         <INPUT TYPE="CHECKBOX"  class="myace "  class="" <?php if($access->sale_module ==1): echo "checked"; endif;?> value="1" id="sale_module" NAME="sale_module"><strong>Sales Module</strong>
         <ul id="brunch_menu">
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->customer_order ==1): echo "checked"; endif;?> value="1" id="customer_order" NAME="customer_order">Customer & Order Entry</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->order_entry ==1): echo "checked"; endif;?> value="1" id="order_entry" NAME="order_entry">Order Entry</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->all_order_list ==1): echo "checked"; endif;?> value="1" id="all_order_list" NAME="all_order_list">All Order List</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->pending_order_list ==1): echo "checked"; endif;?> value="1" id="pending_order_list" NAME="pending_order_list">Pending Order List</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->process_order_list ==1): echo "checked"; endif;?> value="1" id="process_order_list" NAME="process_order_list">On Procces list</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->ready_car_sale ==1): echo "checked"; endif;?> value="1" id="ready_car_sale" NAME="ready_car_sale">Ready Car Sale</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->customer_entry ==1): echo "checked"; endif;?> value="1" id="customer_entry" NAME="customer_entry">Customer Entry</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->customer_list ==1): echo "checked"; endif;?> value="1" id="customer_list" NAME="customer_list">Cuatomer List</li>
        </ul>
      </li>
      <li>
        <INPUT TYPE="CHECKBOX"  class="myace " class="" <?php if($access->purchase_module ==1): echo "checked"; endif;?> value="1" id="purchase_module" NAME="purchase_module"><strong>Purchase Module</strong>
        <ul id="brunch_menu">
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->purchase_entry ==1): echo "checked"; endif;?> value="1" id="purchase_entry" NAME="purchase_entry">Purchase Entry</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->purchase_list ==1): echo "checked"; endif;?> value="1" id="purchase_list" NAME="purchase_list">Purchase list</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->pricing_entry ==1): echo "checked"; endif;?> value="1" id="pricing_entry" NAME="pricing_entry">Pricing Entry</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->pricing_list ==1): echo "checked"; endif;?> value="1" id="pricing_list" NAME="pricing_list">Pricing list</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->transport_status ==1): echo "checked"; endif; ?> value="1" id="transport_status" NAME="transport_status">Transport Status</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->supplier ==1): echo "checked"; endif;?> value="1" id="supplier" NAME="supplier">Supplier</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->transport_head ==1): echo "checked"; endif;?> value="1" id="transport_head" NAME="transport_head">Transport Head</li>
        </ul>
      </li>

      <li>
       <INPUT TYPE="CHECKBOX"  class="myace " class="" <?php if($access->administration ==1): echo "checked"; endif;?> value="1" id="administration" NAME="administration"><strong>Administration Module</strong>
       <ul id="brunch_menu">
           <li>
               <INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->lc_info ==1): echo "checked"; endif;?> value="1" id="lc_info" NAME="lc_info"><strong>L/C Info</strong>
               <ul id="brunch_menu">
                   <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->lc_entry ==1): echo "checked"; endif;?> value="1" id="lc_entry" NAME="lc_entry">L/C Entry</li>
                   <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->lc_list ==1): echo "checked"; endif;?> value="1" id="lc_list" NAME="lc_list">L/C List</li>
               </ul>
           </li>
        <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->expense_head_entry ==1): echo "checked"; endif;?> value="1" id="expense_head_entry" NAME="expense_head_entry">Expense Head Entry</li>
        <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->company_info ==1): echo "checked"; endif;?> value="1" id="company_info" NAME="company_info">Company Profile</li>
        <li>
         <INPUT TYPE="CHECKBOX"  class="myace " class="" <?php if($access->admin ==1): echo "checked"; endif;?> value="1" id="admin" NAME="admin"><strong>Admin</strong>
         <ul id="brunch_menu">
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->admin_entry ==1): echo "checked"; endif;?> value="1" id="admin_entry" NAME="admin_entry">Admin Entry</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->admin_list ==1): echo "checked"; endif;?> value="1" id="admin_list" NAME="admin_list">Admin List</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->admin_access ==1): echo "checked"; endif;?> value="1" id="admin_access" NAME="admin_access">Admin Access</li>
        </ul>
      </li>
  </ul>
</li>
<!-- </ul> -->
</div>

<div class="col-sm-3">
  <li>
    <INPUT TYPE="CHECKBOX"  class="myace " class="" <?php if($access->account_module ==1): echo "checked"; endif;?> value="1" id="account_module" NAME="account_module"><strong>Account Module</strong>
    <ul id="brunch_menu">
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->collection ==1): echo "checked"; endif;?> value="1" id="collection" NAME="collection">Collection</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->payment ==1): echo "checked"; endif;?> value="1" id="payment" NAME="payment">Payment</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->ofice_payment ==1): echo "checked"; endif;?> value="1" id="ofice_payment" NAME="ofice_payment">Office Payment</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->other_income ==1): echo "checked"; endif;?> value="1" id="other_income" NAME="other_income">Other Income</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->bank_trans ==1): echo "checked"; endif;?> value="1" id="bank_trans" NAME="bank_trans">Bank Transaction</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->balance_sheet ==1): echo "checked"; endif;?> value="1" id="balance_sheet" NAME="balance_sheet">Balance Sheet</li>
      <li>
       <INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->check_option ==1): echo "checked"; endif;?> value="1" id="check_option" NAME="check_option"><strong>Check</strong>
         <ul id="brunch_menu">
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->check_entry ==1): echo "checked"; endif;?> value="1" id="check_entry" NAME="check_entry">Check Entry</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->pending_check_list ==1): echo "checked"; endif;?> value="1" id="pending_check_list" NAME="pending_check_list">Pending Check List</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->reminder_check_list ==1): echo "checked"; endif;?> value="1" id="reminder_check_list" NAME="reminder_check_list">Reminder Check List</li>
          <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->paid_check_list ==1): echo "checked"; endif;?> value="1" id="paid_check_list" NAME="paid_check_list">Paid Check List</li>
        </ul>
      </li>

    </ul>
    <li>
      <INPUT TYPE="CHECKBOX"  class="myace " class="" <?php if($access->hr_module ==1): echo "checked"; endif;?> value="1" id="hr_module" NAME="hr_module"><strong>HR & Payroll</strong>
      <ul id="brunch_menu">
        <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->sallay_payment ==1): echo "checked"; endif;?> value="1" id="sallay_payment" NAME="sallay_payment">Sallary Payment</li>
        <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->employee_list ==1): echo "checked"; endif;?> value="1" id="employee_list" NAME="employee_list">Employee List</li>
        <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->employee_entry ==1): echo "checked"; endif;?> value="1" id="employee_entry" NAME="employee_entry">Employee Entry</li>
        <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->monthe_entry ==1): echo "checked"; endif;?> value="1" id="monthe_entry" NAME="monthe_entry">Month Entry</li>
      </ul>
    </li>
  </li>
  <li><INPUT TYPE="CHECKBOX"  class="myace" <?php if(isset($access->edit_access)==1): echo "checked"; endif;?> value="1" id="edit_access" NAME="edit_access">Edit Data</li>
        <li><INPUT TYPE="CHECKBOX"  class="myace" <?php if(isset($access->delete_access)==1): echo "checked"; endif;?> value="1" id="delete_access" NAME="delete_access">Delete Data</li>

</div>



<div class="col-sm-3">
  <li>
    <INPUT TYPE="CHECKBOX"  class="myace " class="" <?php if($access->report_module ==1): echo "checked"; endif;?> value="1" id="report_module" NAME="report_module"><strong>Report Module</strong>
    <ul id="brunch_menu">
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->stock_report ==1): echo "checked"; endif;?> value="1" id="stock_report" NAME="stock_report">Stock Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->car_full_report ==1): echo "checked"; endif;?> value="1" id="car_full_report" NAME="car_full_report">Car Full Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->car_coll_report ==1): echo "checked"; endif;?> value="1" id="car_coll_report" NAME="car_coll_report">Car wise Collection Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->cus_due_report ==1): echo "checked"; endif;?> value="1" id="cus_due_report" NAME="cus_due_report">Customer Due List</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->cus_order_report ==1): echo "checked"; endif;?> value="1" id="cus_order_report" NAME="cus_order_report">Customer Order Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->deliv_order_report ==1): echo "checked"; endif;?> value="1" id="deliv_order_report" NAME="deliv_order_report">Delivery Order Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->lc_order_report ==1): echo "checked"; endif;?> value="1" id="lc_order_report" NAME="lc_order_report">L/C Wise Order Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->collection_report ==1): echo "checked"; endif;?> value="1" id="collection_report" NAME="collection_report">Collection Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->cus_coll_report ==1): echo "checked"; endif;?> value="1" id="cus_coll_report" NAME="cus_coll_report">Customer Wise Collection </li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->date_payment_report ==1): echo "checked"; endif;?> value="1" id="date_payment_report" NAME="date_payment_report">Date Wise Payment Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->supplier_payment_report ==1): echo "checked"; endif;?> value="1" id="supplier_payment_report" NAME="supplier_payment_report">Supplier Payment Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->office_payment_report ==1): echo "checked"; endif;?> value="1" id="office_payment_report" NAME="office_payment_report">Office Payment Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->sallary_report ==1): echo "checked"; endif;?> value="1" id="sallary_report" NAME="sallary_report">Date To Date Sallary Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->emp_sallary_report ==1): echo "checked"; endif;?> value="1" id="emp_sallary_report" NAME="emp_sallary_report">Employee Wise Sallary </li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->lc_list_report ==1): echo "checked"; endif;?> value="1" id="lc_list_report" NAME="lc_list_report">L/C List Report</li>
      <li><INPUT TYPE="CHECKBOX"  class="myace " <?php if($access->cus_list_report ==1): echo "checked"; endif;?> value="1" id="cus_list_report" NAME="cus_list_report">Customer list Report</li>
    </ul>
  </li>

  <div class="col-xs-12" style="text-align:center;margin:5px 0px 10px 0px; margin-top: 100px;">
    <input type="submit" value="Access" class="btn btn-info" style="width:200px;">
  </div>
</div>
</div>
</div>
</form>
</div>


<script language="javascript">
 $('#checkAll').on('click',function(){
   if($(this).is(':checked')){
     $('.myace').prop('checked',true);
   }else{
     $('.myace').prop('checked',false); 
   }
 });
</script>