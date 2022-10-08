 <div align="center" style:color:#000000;>
 <h6>  <?php if($selected_department): ?> Departmental (<?php echo ucfirst(strtolower($selected_department)); ?>) IPD Register<?php else: ?>Central IPD Register <?php endif; ?></h6>
    <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div>
  <div>
<?php //echo '<pre>';
    //print_r($listings); exit;
if($listings) :   
        $old = 0;
        $new = 0;
        $male = 0;
        $female = 0;
        $total = 0;
		$rows = REPORT_MAX_ROWS;
    ?>
                   <table  style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2">
                       <tr >
					<td width="30">Sr. No</td>
					<td width="60"> CR No.</td>
					<td width="60">DOA</td>
					<td width="60">IPD No.</td>
					<td width="150"> Patient Name</td>
					<td width="30"> M/F</td>
					<td width="30"> Age</td>
					<td width="120"> Address</td>
					<td width="120"> Bed No.</td>
					<td width="100"> Diagnosis</td>
					<td width="100">Department</td>
                    <td>Doctor</td> 
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
                        <td width="30"><?=$count;?></td><td width="60"><?=$listing->CRNO;?></td><td width="60"><?=date('d/m/Y',strtotime($listing->opddate));?></td><td width="60"><?=$listing->ipdno;?></td><td width="150"><?=$listing->PName;?></td><td width="30"><?=$listing->Sex;?></td><td width="30"><?=$listing->Age;?></td><td width="120"><?=$listing->Address;?></td><td width="120"><?=$listing->bedname;?></td><td width="100"><?=$listing->Diagnosis;?></td><td width="100"><?=$listing->department;?></td><td><?=$listing->doctorname;?></td>
                        </tr>

                          <?php if(($count % (int)$rows) === 0){ $rows = REPORT_MAX_ROWS; $count=0; ?> 	
</table>||<table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>        
                      <?php $num++; $count++; endforeach; ?>
                    </table><hr>
                    <table class="table" style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2">
                    <hr>
                      <tr class=" text-primary">
                        <td>New</td>
                        <td><?=$new;?> </td>
                        <td> OLD </td>
                        <td><?=$old;?> </td>
                        <td> Male</td>
                        <td> <?=$male;?></td>
                        <td> Female</td>
                        <td> <?=$female;?></td>
                        <td> Total</td>
                        <td><?=$total;?> </td>
                        </tr>
                        </table>
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                  <table class="table" style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2">
                <hr>
                 <tr class="text-primary">
                    <td>Departments</td>
                    <td>New Male</td>
                    <td>Old Male</td>
                    <td>New Female</td>
                    <td>Old Female</td>
                    <td>Total</td>
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
