<div align="center" style="color:#000000;">
    <h6>Lab Report</h6>
    <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div><hr>
                    <?php if($listings) :?>
                    <table class="table" style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2">
                      <tr><td width="20">ID</td><td>CR No.</td>
                        <td>Date</td> 
                        <td width="140">Patient Name</td>
                        <td width="30">M/F</td>
                        <td>Age</td>
                        <td width="100"> Department</td>
                        <td> Referred By </td> 
                        <td> Sample By</td> 
                      </tr>
                      <hr>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>
                        <tr id="row_<?=$listing->ID;?>">
                          <td><?=$count;?></td>
                          <td><?=$listing->crno;?></td>                          
                          <td><?=date('d/m/Y', strtotime($listing->DDATE));?></td>
                          <td><?=$listing->PNAME;?></td>
                           <td>
                          <?=$listing->SEX;?>
                          </td>
                          <td>
                          <?=$listing->AGE;?>
                          </td>
                          <td>
                          <?=$listing->department;?>
                          </td>
                          <td>
                          <?=$listing->REFFEREDBY;?>
                          </td>
                          <td>
                          <?=$listing->SAMPLEBY;?>
                          </td>
                          
                        </tr>
                        <hr>
                        <?php if(($count % REPORT_MAX_ROWS) == 0){?> 
</table>||<table class="table" style="font-size:9px!important;text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>  
                      <?php $count++; endforeach; ?>
                    </table>
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                 