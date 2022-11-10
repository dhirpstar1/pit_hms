 
   <div align="center" style:color:#000000;>
   <h5>  Dispencing Purchase Report</h5>
    <h6>Date: From - <?=($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');?> To  <?=($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');?></h6>
  </div>
  <div  align="left">
<?php 
if($listings) :   
        $total = 0;
        $codunt = 1;
        $rows = REPORT_MAX_ROWS;
    ?>
          <table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
                      <hr><tr ><th width="30">Sr. NO</th><th width="300">Medicine Name</th><th width="30"> QTY</th><th width="40"> Unit QTY</th><th width="100"> Purchase Price</th><th width="100"> Purchase Date</th><th width="80"> Date of expiry</th><th width="40"> Rack </th><th width="40"> CGST</th><th width="40"> SGST</th><th width="40"> Total</th><th width="80"> Date</th>
                      </tr><?php $countnum = 1; $count = 1; foreach($listings as $listing): //print_r($listing); exit; 
                           $total++;
                      ?><hr><tr id="row_<?=$listing->ID;?>">
                        <td width="30"><?=$countnum;?></td><td width="300"><?=$listing->med_name;?></td><td width="30"><?=$listing->qty;?></td><td width="40"><?=$listing->unit_qty;?></td><td width="100"><?=$listing->purchase_price;?></td><td width="100"><?=$listing->pur_date;?></td><td width="80"><?=date('d/m/Y',strtotime($listing->date_of_expiry));?></td><td width="40"><?=$listing->rack;?></td><td width="40"><?=$listing->cgst;?></td><td width="40"><?=$listing->sgst;?></td><td width="40"><?=$listing->total;?></td><td width="80"><?=date('d/m/Y',strtotime($listing->created));?></td>
                        </tr><?php if($count === $rows){ $rows = REPORT_MAX_ROWS; $count = 0;?> 
</table>||<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php } ?>
                      <?php $countnum++; endforeach; ?>
                    </table><hr>
                   
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
</div>
