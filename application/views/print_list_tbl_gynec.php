    <div align="center" style="color:#000000;">
    <h6>Gynec Local Procedure Report</h6>
  <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div>
<?php 
if($listings) :    ?>
                    <table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
                      <tr class=" text-primary">
                        <th width="20">ID</th>
                        <th>Date</th>
                        <th> CR No.</th>
                        <th> Patient Name</th>
                        <th> Age</th>
                        <th> Procedures</th>
                       
                      </tr>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;  ?>
<hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td><?=$count;?></td>
                        <td><?=date('d/m/Y', strtotime($listing->doa));?></td>
                        <td><?=$listing->Crno;?></td>
                        <td><?=$listing->pname;?></td>
                        <td><?=$listing->Age;?></td>
                        <td style="padding:10px;"><?=$listing->LocalProcedure;?></td>
                         </tr>
                         <?php if(($count % 16) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>  
                      <?php $count++; endforeach; ?>
                    </table><hr><hr>
                    <table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
                    <hr>
                        
                        </table>
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                  <br><hr>
                  <table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
              
                 <tr class="text-primary">
                 <?php foreach($procedures as $item): ?>
                    <th><?=$item;?></th>
                      <?php endforeach; ?>
                  </tr><hr>
                  <tr>       
                  <?php $total =0; foreach($procedures as $key => $item): ?><td> <?php
                  $pcount = 0;

                  foreach($procedures_count as $item1):
                                    
                      if($item1->procedure_id == $key):  $pcount = $item1->procedure_count; endif; 
                     
                  endforeach; $total += $pcount; echo $pcount; 
                    ?></td>
           
                      <?php endforeach; ?>
                      </tr><hr>
<tr><td colspan="12"><br><br><div ><b>Total Number of Procedures</b> : <?=$total;?></div></td></tr>
                </table>           


