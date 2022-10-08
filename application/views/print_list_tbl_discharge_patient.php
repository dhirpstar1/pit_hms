<div class="col-md-12" style="text-align:center;">
  <h6>Centeral Registration Discharge Patient Sheet</h6>
  <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  <h2></h2>
<?php
if($listings) : ?>
                    <table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
                      <tr class=" text-primary">
                        <td width="20">ID</td>
                        <td width="50">CR No.</td>
                        <td width="40">IPD NO</td>
                        <th>Dis. Date </th>
                        <th width="40">No. Days </th>
                        <th width="100">Bed No.</th>          
                        <th width="140">Patient Name</th>
                        <th width="40">M/F</th>
                        <th width="40">Age</th>
                        <th width="100">Address</th>
                        <th>Diagnosis</th>
                        <th width="100">Department</th>
                        <th width="100">Doctor</th> 
                      </tr>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;  ?>
                        <hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td width="20"><?=$count;?></td><td width="50"><?=$listing->CRNO;?></td><td width="40"><?=$listing->ipdno;?></td><td><?=date('d/m/Y',strtotime($listing->dod));?></td><td width="40"><?=$listing->nod;?></td><td width="100"><?=$listing->bedname;?></td><td width="140"><?=$listing->PName;?></td><td width="40"><?=$listing->Sex;?></td><td width="40"><?=$listing->Age;?></td><td width="100"><?=$listing->Address;?></td><td><?=$listing->Diagnosis;?></td><td width="100"><?=$listing->Department;?></td><td width="100"><?=$listing->DoctorName;?></td>
                        </tr>
                        <?php if(($count % REPORT_MAX_ROWS ) == 0){?> 
</table>||<table class="table" style="font-size:8px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php } ?>        
                      <?php $count++; endforeach; ?>
                      <hr>
                    </table>                   
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                       


</div>