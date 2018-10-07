 <div align="center" style="color:#000000;">
    <h6>Daily Occupancy Report</h6>
  <h6>Date: - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?></h6>
  </div>
  <div>
<?php if($listings) :    ?>
                   <table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
                      <tr class=" text-primary">
                        <th>Date</th>
                        <th> CR No.</th>
                        <th> OLD No.</th>
                        <th width="100"> Patient Name</th>
                        <th width="30"> M/F</th>
                        <th width="30"> Age</th>
                        <th> Address</th>
                        <th> Bed No.</th>
                        <th> Complaint</th>
                        <th> Doctor</th> 
                      </tr> 
                      
                      <?php $count = 1; foreach($listings as $listing):?>
<hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td><?=date('d/m/Y',strtotime($listing->opddate));?></td><td><?=$listing->CRNO;?></td><td><?=$listing->OldCRNO;?></td><td width="100"><?=$listing->PName;?></td><td><?=$listing->Sex;?></td><td><?=$listing->Age;?></td><td><?=$listing->Address;?></td><td><?=$listing->bedname;?></td><td><?=$listing->Income;?></td><td><?=$listing->DoctorName;?></td>
                        </tr>

                          <?php if(($count % 20) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>        
                      <?php $count++; endforeach; ?>
                      <hr>
                    </table>
                          <?php endif; ?>
</div>
