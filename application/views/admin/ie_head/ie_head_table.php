<?php $i=1; if($ie_heads && isset($ie_heads)): foreach($ie_heads as $ie_head):?>
              <tr>
                <td class="center" style="display:none;">
                  
                </td>

                <td><?= $i++; ?></td>
                <td><?= $ie_head->head_title; ?></td>
                <td>
                    <?php if($ie_head->head_type == 'C'):?>
                      <label class="label label-success">Car Payment</label>
                      <?php else: ?>
                      <label class="label label-danger">Ofice Payment</label>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green linka fancybox fancybox.ajax" href="<?= base_url();?>ie_head/edit/<?= $ie_head->id; ?>" >
                          <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="<?= base_url(); ?>ie_head/delete/<?= $ie_head->id?>" onclick="return confirm('Are You Sure Went to Delete This! ')">
                          <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>
                </td>
                <td style="display:none;"></td>
                <td style="display:none;"></td>
                <td style="display:none;"></td>

                
              </tr>
              <?php endforeach; endif; ?>