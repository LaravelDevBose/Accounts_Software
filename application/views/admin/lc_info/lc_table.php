<?php 
  if(isset($lc_details) || !is_null($this->cart->contents())):

  $i=1; $total = 0; $total_car = 0; $total_fright =0;
  if(isset($lc_details) && $lc_details): 
    foreach($lc_details as $data):
?>
<tr id="detail_<?= $data->id;?>">
  <td><?= $i++ ?></td>
  <?php $cus_name = $this->db->where('id', $data->cus_id)->get('customers')->row();?>
  <td><?= ucfirst($cus_name->cus_name); ?></td>
  <td><?= $data->puc_chassis_no ?></td>
  <td><?= $data->puc_engine_no; ?></td>
  <td><?= $data->puc_car_model; ?></td>
  <td><?= $data->puc_color; ?></td>
  <td><?= $data->puc_year; ?></td>
  <td><span class="pull-right"><?= number_format($data->car_value, 2); ?></span></td>
  <td><span class="pull-right"><?= number_format($data->fright_value, 2); ?></span></td>
  <td><span class="pull-right"><?= number_format($data->total,2); ?></span></td>
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="red"  onclick="delete_lc_details('<?= $data->id; ?>');" >
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>
</tr>
<?php 
  $total_car +=$data->car_value; $total_fright +=$data->fright_value;   $total += $data->total;  endforeach;  endif;
?>

<?php 

  if(!is_null($this->cart->contents()) && $this->cart->contents()): 
    $cart_data =$this->cart->contents();
    foreach($cart_data as $data):
?>
<tr>
  <td><?= $i++ ?></td>
  <?php $cus_name = $this->db->where('id', $data['cus_id'])->get('customers')->row();?>
  <td><?= ucfirst($cus_name->cus_name); ?></td>
  <td><?= $data['chassis_no'] ?></td>
  <td><?= $data['engine_no']; ?></td>
  <td><?= $data['name']; ?></td>
  <td><?= $data['car_color']; ?></td>
  <td><?= $data['car_year']; ?></td>
  <td><span class="pull-right"><?= number_format($data['car_value'], 2); ?></span></td>
  <td><span class="pull-right"><?= number_format($data['fright_value'], 2); ?></span></td>
  <td><span class="pull-right"><?= number_format($data['price'],2); ?></span></td>
  <td>
      <div class="hidden-sm hidden-xs action-buttons">
          <a class="red"  onclick="cartRemove('<?= $data["rowid"] ?>');">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>
</tr>
<?php $total_car +=$data['car_value']; $total_fright +=$data['fright_value'];   $total += $data['price'];  endforeach; endif; ?>

<tr style="font-weight: 800;">
  <td colspan="7" > <span class="pull-right" >Sub Total</span></td>
  <td><span class="pull-right"><?= number_format($total_car,2)?></span></td>
  <td><span class="pull-right"><?= number_format($total_fright,2)?></span></td>
  <td><span class="pull-right"><?= number_format($total,2)?></span></td>
  <td>
    <div class="hidden-sm hidden-xs action-buttons">
          <a class="red" title="Total Remove"  onclick="cartRemove('Full');">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
          </a>
      </div>
  </td>
</tr>

<script>
    cart_qty = '<?= $i-1; ?>';
    cart_total = '<?= $total; ?>'
</script>
<?php  endif; ?>