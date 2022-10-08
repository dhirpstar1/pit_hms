  <div class="col-md-12" style="text-align:center;">
  <h5>Central Registration Discharge Patient Report</h5>
  <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div><br>
<?php
if($listings) :
      $old = 0;
      $new = 0;
      $male = 0;
      $female = 0;
      $total = 0;
      $codunt = 1;
      $rows = REPORT_MAX_ROWS; ?>
                    <table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
                    <hr><b>
                      <tr class=" text-primary"> 
                        <td width="30">ID</td>
                        <td width="50"> CR No.</td>
                        <td width="50"> IPD No.</td>
                        <td width="80"> DOA </td>
						            <td width="80"> DOD </td>
                        <td width="30">Days </td>
                        <td width="100"> Bed No.</td>          
                        <td width="100"> Patient Name</td>
                        <td width="30"> M/F</td>
                        <td width="30"> Age</td>
                        <td width="100"> Address</td>
                        <td> Diagnosis</td>
                        <td width="100"> Department</td>
                        <td> Doctor</td>  

                      </tr></b>
                      <?php $countnum = 1; $count = 1; foreach($listings as $listing): //print_r($listing); exit; 
                        if($listing->OldCRNO > 0){$old++;}
                        if($listing->OldCRNO ==''){$new++;}
                        if($listing->Sex == 'M'){$male++;}
                        if($listing->Sex == 'F'){$female++;}
                        $total++;
                        
                        ?>
                        <hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td width="30"><?=$count;?></td>
                        <td width="50"><?=$listing->CRNO;?></td>
                        <td width="50"><?=$listing->ipdno;?></td>
                        <td width="80"><?=date('d/m/Y', strtotime($listing->doa));?></td>
                        <td width="80"><?=date('d/m/Y', strtotime($listing->dod));?></td>
                        <td width="30"><?=$listing->nod;?></td>
                        <td width="100"><?=$listing->bedname;?></td>
                        <td width="100"><?=$listing->PName;?></td>
                        <td width="30"><?=$listing->Sex;?></td>
                        <td width="30"><?=$listing->Age;?></td>
                        <td width="100"><?=$listing->Address;?></td>
                        <td><?=$listing->Diagnosis;?></td>
                        <td width="100"><?=$listing->Department;?></td>
                        <td><?=$listing->DoctorName;?></td>
                         
                        </tr>
                        <?php if(($count % $rows) == 0){ $rows = REPORT_MAX_ROWS; $count=0;?> 
</table>||<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php } ?>
                      <?php $count++; endforeach; ?>
                      <hr>
                    </table>                   
                   
                  
                  <hr><table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<tr class=" text-primary">
<th><b>New</b></th>
<th><b><?=$new;?> </b></th>
<th><b> OLD</b> </th>
<th><b><?=$old;?></b> </th>
<th> <b>Male</b></th>
<th><b> <?=$male;?></b></th>
<th><b> Female</b></th>
<th> <b><?=$female;?></b></th>
<th> <b>Total</b></th>
<th><b><?=$total;?></b> </th>
</tr>
</table>
<?php else: ?>
<div class="col-md-12">No data found.</div>
<?php endif; ?>
<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<hr>
<tr class="text-primary">
<th>Departments</th>
<th><b>New Male</b></th>
<th>Old Male</th>
<th><b>New Female</b></th>
<th>Old Female</th>
<th><b>Total</b></th>
<th><b>Days</b></th>
</tr>
<?php foreach($departments as $department): 
$newmalecount   = 0;
$newfemalecount = 0;
$oldmalecount   = 0;
$oldfemalecount = 0;
$total          = 0;
$sumcount       =0;
foreach($listings_by_departments as $item):

if($item->Department == $department){
$newmalecount = $item->mcount - $item->oldmcount;
$newfemalecount = $item->fcount - $item->oldfcount;
$oldmalecount = $item->oldmcount;
$oldfemalecount = $item->oldfcount;
$total = $item->gcount;
$sumcount = $item->sumnod;
}
endforeach;
?>   <hr>
<tr>
<td><?=$department;?></td>
<td><b><?=$newmalecount;?></b></td>
<td><?=$oldmalecount;?></td>
<td><b><?=$newfemalecount;?></b></td>
<td><?=$oldfemalecount;?></td>
<td><b><?=$total;?></b></td>
<td><b><?=$sumcount;?></b></td>
</tr>
<?php endforeach; ?>
<hr>
</table>