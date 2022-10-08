    <div align="center" style="color:#000000;">
    <h6>ANC Report</h6>
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
                        <th> Name</th>
                        <th> Age</th>
                        <th> Doctor</th>
                        <th width="60"> LMP</th>
                        <th width="60"> EDD</th>
                        <th> G</th>
                        <th> P</th>
                        <th> G1</th>
                        <th> P1</th>
                        <th> G2</th>
                        <th> Indication</th>
                        <th> Radiologist</th>
                        <th> Complications</th>                       
                        <th> USGReport</th>                       
                      </tr>
                      <?php $count = 1; foreach($listings as $listing):  ?>
<hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td><?=$count;?></td>
                        <td><?php echo $listing->sdate; ?><?=($listing->sdate) ? date('d/m/Y', strtotime($listing->sdate)) : 'NA';?></td>
                        <td><?=$listing->CRNO;?></td>
                        <td><?=$listing->ipdno;?></td>
                        <td><?=$listing->PName;?></td>
						<td><?=$listing->Age;?></td>
						<td><?=$listing->doctor;?></td>
                        <td width="60"><?=($listing->lmp !== '1970-01-01 05:30:00') ? date('d/m/Y', strtotime($listing->lmp)) : 'NA';?></td>
                        <td width="60"><?=($listing->edd !== '1970-01-01 05:30:00') ? date('d/m/Y', strtotime($listing->edd)) : 'NA';?></td>
                        <td><?=$listing->G;?></td>
                        <td><?=$listing->P;?></td>
                        <td><?=$listing->G1;?></td>
                        <td><?=$listing->P1;?></td>
                        <td><?=$listing->G2;?></td>
                        <td><?=$listing->Indication;?></td>
                        <td><?=$listing->Radiologist;?></td>	
                        <td><?=$listing->Complications;?></td>
                        <td><?=$listing->USGReport;?></td>
                        <td><?=$listing->contact_no;?></td>
                         </tr>
                         <?php if(($count % REPORT_MAX_ROWS) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>  
                      <?php $count++; endforeach; ?>
                    </table><hr>
                   
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                    


