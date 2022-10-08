    <div align="center" style="color:#000000;">
    <h6>Surgery Report</h6>
    <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div>
<?php 
if($listings) :    ?>
                    <table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
                      <tr class=" text-primary">
                        <th width="20">ID</th>
                        <th>Date</th>
                        <th> CR No.</th>
                        <th> IPD No.</th>
                        <th> Patient Name</th>
                        <th> Age</th>
                        <th> Surgen</th>
                        <th> Anesthesiologist</th>
                        <th> Nurse</th>
                      
                        <th> Type Anesthesia</th>
                        <th> Time</th>                     
                      </tr>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit; ?>
<hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td><?=$count;?></td>
                        <td><?=date('d/m/Y', strtotime($listing->sdate));?></td>
                        <td><?=$listing->CRNO;?></td>
                        <td><?=$listing->ipdno;?></td>
                        <td><?=$listing->PName;?></td>
                        <td><?=$listing->Age;?></td>
                        <td><?=$listing->name_of_surgeon;?></td>
                        <td><?=$listing->anesthesiologist;?></td>
                        <td><?=$listing->name_of_nurse;?></td>
                        <td><?=$listing->type_of_anaesthesia;?></td>
                        <td><?=$listing->begins_time;?> To <?=$listing->end_time;?></td>
                        
                         </tr>
                         <?php if(($count % REPORT_MAX_ROWS) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>  
                      <?php $count++; endforeach; ?>
                    </table><hr><hr>
                   
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                    


