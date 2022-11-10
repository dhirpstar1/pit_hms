 
   <div align="center" style:color:#000000;>
   <h5> Medicine Stock report</h5>
    <h6>Date: <?=date('d/m/Y');?> </h6>
  </div>
  <div  align="left">
<?php 
if($listings) :   
        $total = 0;
        $codunt = 1;
        $rows = REPORT_MAX_ROWS;
    ?>
          <table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
                      <hr><tr ><th width="30">Sr. NO</th><th width="200"> Name</th><th width="30"> Unit</th><th width="30"> Packing</th><th width="30"> QTY</th><th width="40"> Unit QTY</th><th width="50"> Purchase Price</th><th width="50"> Sale Price</th><th width="80"> Date of expiry</th><th width="60"> Category</th><th width="40"> Batch Id</th><th width="40"> Rack </th><th width="40"> Rate</th><th width="40"> CGST</th><th width="40"> SGST</th><th width="40"> Total</th><th width="80"> Date</th>
                      </tr><?php $countnum = 1; $count = 1; foreach($listings as $listing): //print_r($listing); exit; 
                           $total++;
                      ?><hr><tr id="row_<?=$listing->ID;?>">
                        <td width="30"><?=$countnum;?></td><td width="200"><?=$listing->med_name;?></td><td width="30"><?=$listing->unit;?></td><td width="30"><?=$listing->packing;?></td><td width="30"><?=$listing->qty;?></td><td width="40"><?=$listing->unit_qty;?></td><td width="50"><?=$listing->purchase_price;?></td><td width="50"><?=$listing->mrp;?></td><td width="80"><?=date('d/m/Y',strtotime($listing->date_of_expiry));?></td><td width="60"><?=$listing->category;?></td><td width="40"><?=$listing->batch_id ;?></td><td width="40"><?=$listing->rack;?></td><td width="40"><?=$listing->rate;?></td><td width="40"><?=$listing->cgst;?></td><td width="40"><?=$listing->sgst;?></td><td width="40"><?=$listing->total;?></td><td width="80"><?=date('d/m/Y',strtotime($listing->created));?></td>
                        </tr><?php if($count === $rows){ $rows = REPORT_MAX_ROWS; $count = 0;?> 
</table>||<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php } ?>
                      <?php $countnum++; endforeach; ?>
                    </table><hr>
                   
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
</div>
