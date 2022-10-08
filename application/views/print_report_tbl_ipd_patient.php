 
   <div align="center" style:color:#000000;>
   <h5>  <?php if($selected_department): ?> Departmental (<?php echo ucfirst(strtolower($selected_department)); ?>) IPD Register<?php else: ?>Central IPD Register <?php endif; ?></h5>
    <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div>
  <div  align="left">
<?php //echo '<pre>';
    //print_r($departments); exit;
if($listings) :   
        $old = 0;
        $new = 0;
        $male = 0;
        $female = 0;
        $total = 0;
        $codunt = 1;
        $rows = REPORT_MAX_ROWS;
    ?>
          <table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
                      <hr><tr ><b>
					<th width="30">Sr. No</th>
					<th width="60">CR No.</th>
					<th width="60">DOA</th>
					<th width="60">DOD</th>
					<th width="60">IPD No.</th>
					<th width="100">Patient Name</th>
					<th width="30">M/F</th>
					<th width="30">Age</th>
					<th width="100">Address</th>
					<th width="100">Bed No.</th>
					<th width="100">Diagnosis</th>
					<th width="100">Department</th>
                    <th>Doctor</th> </b>
                      </tr>
                      <?php $countnum = 1; $count = 1; foreach($listings as $listing): //print_r($listing); exit; 
                      if($listing->OldCRNO > 0){$old++;}
                      if($listing->OldCRNO ==''){$new++;}
                      if($listing->Sex == 'M'){$male++;}
                      if($listing->Sex == 'F'){$female++;}
                      $total++;
                      
                      ?>
<hr>
                        <tr id="row_<?=$listing->ID;?>">
                        <td width="30"><?=$countnum;?></td><td width="60"><?=$listing->CRNO;?></td><td width="60"><?=date('d/m/Y',strtotime($listing->opddate));?></td><td width="60"><?=$listing->dod;?></td><td width="60"><?=$listing->ipdno;?></td><td width="100"><?=$listing->PName;?></td><td width="30"><?=$listing->Sex;?></td><td width="30"><?=$listing->Age;?></td><td width="100"><?=$listing->Address;?></td><td width="100"><?=$listing->bedname;?></td><td width="100"><?=$listing->Diagnosis;?></td><td width="100"><?=$listing->department;?></td><td><?=$listing->doctorname;?></td>
                        </tr>
                        <?php if($count === $rows){ $rows = REPORT_MAX_ROWS; $count = 0;?> 
</table>||<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php } ?>
                      <?php $countnum++; endforeach; ?>
                    </table><hr>
                    <table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
                                        <hr>
                      <tr class=" text-primary">
                        <th><b>New</b></th>
                        <th><b><?=$new;?></b> </th>
                        <th><b> OLD</b> </th>
                        <th><b><?=$old;?> </b></th>
                        <th><b>Male</b></th>
                        <th><b><?=$male;?></b></th>
                        <th><b>Female</b></th>
                        <th><b><?=$female;?></b></th>
                        <th><b> Total</b></th>
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
                    ?><hr>
                  <tr>
                    <td><?=$department;?></td>
                    <td><b><?=$newmalecount;?></b></td>
                    <td><?=$oldmalecount;?></td>
                    <td><b><?=$newfemalecount;?></b></td>
                    <td><?=$oldfemalecount;?></td>
                    <td><b><?=$total;?></b></td>
                  </tr>
                      <?php endforeach; ?>
                      <hr>
                </table>           


</div>
