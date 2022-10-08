 <div align="center" style="color:#000000;">
    <h6>Daily Occupancy Report</h6>
  <h6>Date: - <?=($this->input->post('startDate')) ? date('d/m/Y',strtotime($this->input->post('startDate'))) : date('d/m/Y');?></h6>

  </div>
  <div>
<?php if($listings) :  ?>
                   <table class="table" style="font-size:9px!important;text-align:left;"cellspacing="2" cellpadding="2">
                      <tr>
                        <td width="30" >Sr. No.</td>
                        <td width="70">DOA</td>
                        <td width="70"> CR No.</td>
                        <td width="70"> IPD NO.</td>
                        <td width="120"> Patient Name</td>
                        <td width="30"> M/F</td>
                        <td width="40"> Age</td>
                        <td width="100"> Address</td>
                        <td width="150"> Bed No.</td>
                        <td width="120"> Diagnosis</td>
                        <td width="100"> Doctor</td> 
                      </tr>                       
                      <?php $count = 1; foreach($listings as $listing):?>
 <tr style="padding:0px;"><td colspan="15"><hr></td></tr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td width="30"><?=$count;?></td><td width="70"><?=date('d/m/Y',strtotime($listing->opddate));?></td><td width="70"><?=$listing->Series.$listing->CRNO;?></td><td width="70"><?=$listing->ipdno;?></td><td width="120"><?=$listing->PName;?></td><td width="30"><?=$listing->Sex;?></td><td width="40"><?=$listing->Age;?></td><td width="100"><?=$listing->Address;?></td><td width="150"><?=$listing->bedname;?></td><td  width="120"><?=$listing->Diagnosis;?></td><td width="100"><?=$listing->DoctorName;?></td>
                        </tr>

                          <?php if(($count % REPORT_MAX_ROWS) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php } ?>        
                      <?php $count++; endforeach; ?>
                      <tr><td colspan="15"><hr></td></tr>
                    </table>
                          <?php endif; ?>
</div>
