    <div align="center" style="color:#000000;">
    <h6>X-Ray Report</h6>
    <h6>Date: From - <?=($this->input->post('startDate')) ? date('d/m/Y',strtotime($this->input->post('startDate'))) : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? date('d/m/Y',strtotime($this->input->post('endDate'))) : date('d/m/Y');?></h6>
  </div>
<?php 
if($listings) :    ?>
                    <table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
                      <tr class=" text-primary">
                        <th width="20">ID</th>
                        <th>Date</th>
                        <th> CR No.</th>
                        <th> IPD No.</th>
                        <th> Date</th>
                        <th> Type</th>
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>         
                        <th> Care of</th>  
                        <th> Refby</th>  
                        <th> Family</th>  
                        <th> Charges</th>  
                        <th> Validupto</th>  
                        <th> For</th>                
                      </tr>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;  ?>
<hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td><?=$count;?></td>
                        <td><?=date('d/m/Y', strtotime($listing->ddate));?></td>
                        <td><?=$listing->CRNO;?></td>
                        <td><?=$listing->ipdno;?></td>
                        <td>
                          <?=$listing->type;?>
                          </td>

                           <td>
                          <?=$listing->PName;?>
                          </td>
                           <td>
                          <?=$listing->Sex;?>
                          </td>
                          <td>
                          <?=$listing->Age;?>
                          </td>
                          <td>
                          <?=$listing->address;?>
                          </td>
                          <td>
                          <?=$listing->careof;?>
                          </td>
                          <td>
                          <?=$listing->refby;?>
                          </td>
                          <td>
                          <?=$listing->family;?>
                          </td>
                          <td>
                          <?=$listing->cardno;?>
                          </td>
                          <td>
                          <?=$listing->charges;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->validupto));?>
                          </td><td>
                          <?=$listing->For;?>
                          </td>
                         </tr>
                         <?php if(($count % REPORT_MAX_ROWS) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>  
                      <?php $count++; endforeach; ?>
                    </table><hr>
                    
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                    


