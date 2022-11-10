 
   <div align="center" style:color:#000000;>
   <h6><?php if($dispensary_sale_report == 2): ?>OPD<?php elseif($dispensary_sale_report == 3): ?>IPD<?php endif; ?> Dispencing Sales Reports </h6>

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
                      <hr><tr ><th width="30">Sr. NO</th><th width="200"> Patient Name</th><th width="400"> Medicine Name</th><th width="40"> Unit QTY</th><th width="80"> Date</th><th width="40"> Rate</th><th width="40"> CGST</th><th width="40"> SGST</th><th width="40"> Total</th>
                      </tr><?php $countnum = 1; $count = 1; foreach($listings as $listing): 
                           $total++;
                      ?><hr><tr id="row_<?=$listing->ID;?>">
                        <td width="30"><?=$countnum;?></td><td width="200"><?=$listing->PName;?></td><td width="4   00"><?=$listing->med_name;?></td><td width="40"><?=$listing->unit_qty;?></td><td width="80"><?=date('d/m/Y',strtotime($listing->created));?></td><td width="40"><?=$listing->rate;?></td><td width="40"><?=$listing->cgst;?></td><td width="40"><?=$listing->sgst;?></td><td width="40"><?=$listing->total;?></td>
                        </tr><?php if($count === $rows){ $rows = REPORT_MAX_ROWS; $count = 0;?> 
</table>||<table class="table" style="font-size:9px!important;text-align:left;" cellspacing="2" cellpadding="2">
<?php } ?>
                      <?php $countnum++; endforeach; ?>
                    </table><hr>
                   
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
</div>
