<div align="center" style="color:#000000;">
<h3>Lab Test Report</h6>
</div> 
<table class="table" style="font-size:9px!important; text-align:left;" cellspacing="2" cellpadding="2">
    <tr class=" text-primary">
      <th >Reg No. - <?=$data->sr_no;?></th>
      <th >CR No. - <?=$data->crno;?></th>
      <th >IPD No. - <?=$data->ipdno;?></th>
      <th >DATE - <?=$data->DDATE;?></th>
      </tr>
      <tr class=" text-primary">
      <th colspan="2" >Name - <?=$data->PNAME;?></th>
      <th >Age - <?=$data->AGE;?></th>
      <th >Sex - <?=$data->SEX;?></th>
      </tr>
      <tr class=" text-primary">
      <th >Referred By - <?=$data->REFFEREDBY;?></th>
      <th > </th>
      <th colspan="2">Department - <?=$data->department;?></th>
      </tr>
  </table>    
<hr><?php //print_r($tests_options); ?>      
<?php if($tests_options) :    ?>
  <table class="table" style="font-size:9px!important; text-align:center;" cellspacing="3" cellpadding="3">
    <tr class=" text-primary">
      <th>Test</th>
      <th>Result</th>
      <th>Unit</th>
      <th>Range</th>                     
    </tr>
    <hr>
    <?php $count = 1; foreach($tests_options as $item): $head = 0; //print_r($listing); exit;  ?>
    <tr>
      <td align="left"><?php if($lastheadname !== $item->headname): ?><b><?=strtoupper($item->headname);?></b><br><?php $head = 1; endif; if($lastparent_headname !== $item->parent_headname): ?><?php endif; ?><br><?=$item->TNAME;?></td>
      <td><?php if($head == 1): ?><br><br><br><?php endif; ?><?=($item->NRESULT) ? '<b>'.$item->NRESULT.'</b>' : $item->FRESULT;?></td>
      <td><?php if($head == 1): ?><br><br><br><?php endif; ?><?=$item->UNIT;?></td>
      <td><?php if($head == 1): ?><br><br><br><?php endif; ?><?=$item->RANGEFROM;?> - <?=$item->RANGETO;?></td>
    </tr>
    <?php $lastheadname = $item->headname; $lastparent_headname = $item->parent_headname;   $count++; endforeach; ?>
  </table>
  <?php else: ?>
    <div>No data found.</div>
<?php endif; ?>
<br><hr>