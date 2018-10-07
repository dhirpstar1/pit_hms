 <div align="center" style:color:#000000;>
    <h6>Centeral Registration IPD Patient Sheet</h6>
  <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div>
  <div>
<?php //echo '<pre>';
    //print_r($departments); exit;
if($listings) :   
        $old = 0;
        $new = 0;
        $male = 0;
        $female = 0;
        $total = 0;
    ?>
                   <table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
                      <tr class=" text-primary">
                        <th>Date</th>
                        <th> CR No.</th>
                        <th> OLD No.</th>
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> Complaint</th>
                        <th> Department</th>
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
                        <td><?=date('d/m/Y',strtotime($listing->opddate));?></td><td><?=$listing->CRNO;?></td><td><?=$listing->OldCRNO;?></td><td><?=$listing->PName;?></td><td><?=$listing->Sex;?></td><td><?=$listing->Age;?></td><td><?=$listing->Address;?></td><td><?=$listing->Income;?></td><td><?=$listing->Department;?></td><td><?=$listing->DoctorName;?></td>
                         
                        </tr>

                          <?php if(($count % 15) == 0){?> 
</table>||<table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
<?php } ?>        
                      <?php $count++; endforeach; ?>
                    </table><hr>
                    <table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
                    <hr>
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
                  <table class="table" style="font-size:9px!important; text-align:center;" cellspacing="2" cellpadding="2">
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
