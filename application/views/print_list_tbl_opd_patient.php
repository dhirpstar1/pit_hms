      <div class="col-md-12" style="text-align:center;">
    <h6>  <?php if($selected_department): ?> Departmental ( <?php echo $selected_department;?> )  OPD Register<?php else: ?>Central OPD Register <?php endif; ?></h6>
  <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div>
<?php //echo '<pre>';
    //print_r($departments); exit;
if($listings) :   
        $old = 0;
        $new = 0;
        $male = 0;
        $female = 0;
        $total = 0;
		 $rows = REPORT_MAX_ROWS;
    ?>
                    <table class="table" style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2">    <hr>
                      <tr class=" text-primary">
<th width="30">Sr. No.</th>
<th width="60">Date</th>
<th width="60"> CR No.</th>
<th width="60"> OLD No.</th>
<th width="200"> Patient Name</th>
<th width="30"> M/F</th>
<th width="30"> Age</th>
<th width="100"> Address</th>
<th width="150"> Diagnosis</th>
<th width="100"> Department</th>  

<th> Doctor</th> 
</tr>
                      
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;
                      if($listing->OldCRNO > 0){$old++;}
                      if($listing->OldCRNO ==''){$new++;}
                      if($listing->Sex == 'M'){$male++;}
                      if($listing->Sex == 'F'){$female++;}
                      $total++;
                      
                      ?>
                        <hr>
                        <tr id="row_<?=$listing->ID;?>">
<td width="30"><?=$count;?></td><td width="60"><?=date('d/m/Y',strtotime($listing->opddate));?></td><td width="60"><?=$listing->CRNO;?></td><td width="60"><?=$listing->OldCRNO;?></td><td width="200"><?=$listing->PName;?></td><td width="30"><?=$listing->Sex;?></td><td width="30"><?=$listing->Age;?></td><td width="100"><?=$listing->Address;?></td><td width="150"><?=$listing->Diagnosis;?></td><td width="100"><?=$listing->Department;?></td><td><?=$listing->DoctorName;?></td>

</tr>
                        <?php 
  if(($count % (int)$rows) === 0){ $rows = REPORT_MAX_ROWS; $count=0; ?> 
</table>||<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php  } ?>       
                      <?php $num++; $count++; endforeach; ?>
                    </table><hr>   <hr>
                    <table class="table" style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2"> 
                      <tr class=" text-primary">
                        <th>New</th>
                        <th><?=$new;?> </th>
                        <th> OLD </th>
                        <th><?=$old;?> </th>
                        <th> Male</th>
                        <th> <?=$male;?></th>
                        <th> Female</th>
                        <th> <?=$female;?></th>
                        <th> Total</th>
                        <th><?=$total;?> </th>
                        </tr>
                        </table>
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                  <hr>
                  <table class="table" style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2">
                <hr>
                 <tr class="text-primary">
                    <th>Departments</th>
                    <th>New Male</th>
                    <th>Old Male</th>
                    <th>New Female</th>
                    <th>Old Female</th>
                    <th>Total</th>
                  </tr>
                  <?php foreach($departments as $department): 
                  $newmalecount = 0;
                  $newfemalecount = 0;
                  $oldmalecount = 0;
                  $oldfemalecount = 0;
                  $total = 0;
                  foreach($listings_by_departments as $item):
                                    
                     if($item->Department == $department){
                         $newmalecount = $item->mcount - $item->oldmcount;
                         $newfemalecount = $item->fcount - $item->oldfcount;
                         $oldmalecount = $item->oldmcount;
                         $oldfemalecount = $item->oldfcount;
                         $total = $item->gcount;
                     }
                    endforeach;
                    ?>   <hr>
                  <tr>
                    <td><?=$department;?></td>
                    <td><?=$newmalecount;?></td>
                    <td><?=$oldmalecount;?></td>
                    <td><?=$newfemalecount;?></td>
                    <td><?=$oldfemalecount;?></td>
                    <td><?=$total;?></td>
                  </tr>
                      <?php endforeach; ?>
                      <hr>
                </table>           


</div>
                   