<div align="center"><h3>IPD Case Paper</h3></div>
<table class="table" style="font-size:9px!important;" cellspacing="2" cellpadding="2">
    <tr>
    <td colspan="3"><b>CR. No./OPD ID:</b> <?=$data->CRNO;?></td>
    <td colspan="3"><b> IPD No:</b> <?=$data->ipdno;?></td>
    </tr>
    <tr><td colspan="6"><hr></td></tr>
    <tr>
      <td width="15%"><b>Patient Name:</b></td>
      <td width="15%"><?=$data->PName;?></td>
      <td width="15%"><b>Gender:</b></td>
      <td width="15%"><?=$data->Sex;?></td>
      <td width="15%"><b>Date of Admission:</b></td>
      <td width="15%"><?=$data->doa;?></td>
    </tr>
    <tr>
      <td><b>Address:</b></td>
      <td><?=$data->Address;?></td>
      <td><b>Age:</b></td>
      <td><?=$data->Age;?></td>
      <td><b>BP:</b></td>
      <td><?=$data->bp;?></td>
    </tr>
    <tr>
      <td><b>Pulse:</b></td>
      <td><?=$data->pulse;?></td>
      <td><b>Random Blood Sugar:</b></td>
      <td><?=$data->randum_blood_suger;?></td>
      <td><b>Complents:</b></td>
      <td><?=$data->sign_symptoms;?></td>
    </tr>
    <tr>
      <td><b>X-Ray:</b></td>
      <td><?=$data->x_ray;?></td>
      <td><b>ECG:</b></td>
      <td><?=$data->ecg;?></td>
      <td><b>Lab Investigation:</b></td>
      <td><?=$data->other;?></td>
    </tr>
    <tr>
      <td><b>Diagnosis:</b></td>
      <td><?=$data->Diagnosis;?></td>
      <td><b>Department:</b></td>
      <td><?=$data->department;?></td>
      <td></td>
      <td></td>
    </tr>
    <?php if($data->dod): ?>
    <tr>
      <td><b>Date of Discharge:</b></td>
      <td><?=date('m/d/Y', strtotime($data->dod));?></td>
      <td><b></b></td>
      <td></td>
      <td><b></b></td>
      <td></td>
    </tr>
<?php endif; ?>
    <tr><td colspan="6"><hr></td></tr>
</table>
<?php if($treatments): ?>
<table class="table" style="font-size:9px!important;" cellspacing="2" cellpadding="2">  
    <tr>
      <td width="5%"><b>Sr. No.</b></td>
      <td width="30%"><b>Medicine</b></td>
      <td width="10%"><b>Date</b></td>
      <td width="10%"><b>Qty</b></td>
      <td width="20%"><b>Doses</b></td>
      <td width="25%"><b>Remark</b></td>
    </tr>
    <tr><td colspan="6"><hr></td></tr>
    <?php $count=1; foreach($treatments as $item): if($item->medicine !== '-'):?> <hr>
     <tr>
      <td ><?=$count;?></td>
      <td ><?=$item->medicine;?></td>
      <td ><?=date('d/m/Y',strtotime($item->ddate));?></td>
      <td ><?=$item->qty;?></td>
      <td ><?=$item->dose;?></td>
      <td ><?=$item->remark;?></td>
    </tr>
<?php $count++; endif; endforeach; ?>
<tr><td colspan="6"><hr><div align="right"><?=$data->doctorname; ?></div></td></tr>
</table>
<?php endif; ?>




