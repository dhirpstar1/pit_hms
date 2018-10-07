  <div class="col-md-12" style="text-align:center;">
  <h6>Centeral Registration Discharge Patient Report</h6>
  <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div><br>
<?php
if($listings) : ?>
                    <table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
                      <tr class=" text-primary">
                        <th width="20">ID</th>
                        <th> CR No.</th>
                        <th width="80"> Date </th>
                        <th> No. Days </th>
                        <th> Bed No.</th>          
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> Diagnosis</th>
                        <th> Department</th>
                        <th> Doctor</th> 
                      </tr>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;  ?>
                        <hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td><?=$count;?></td>
                        <td><?=$listing->CRNO;?></td>
                        <td width="80"><?=date('d/m/Y', strtotime($listing->dod));?></td>
                        <td><?=$listing->nod;?></td>
                        <td><?=$listing->bedname;?></td>
                        <td><?=$listing->PName;?></td>
                        <td><?=$listing->Sex;?></td>
                        <td><?=$listing->Age;?></td>
                        <td><?=$listing->Address;?></td>
                        <td><?=$listing->Diagnosis;?></td>
                        <td><?=$listing->Department;?></td>
                        <td><?=$listing->DoctorName;?></td>
                         
                        </tr>
                        <?php if(($count % 14) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>
                      <?php $count++; endforeach; ?>
                      <hr>
                    </table>                   
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                       