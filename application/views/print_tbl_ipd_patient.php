<br><br><table class="table" style="font-size:9px!important;" cellspacing="2" cellpadding="2">
    <tr>
    <td colspan="3"><b>CR. No./IPD ID:</b> <?=$data->CRNO;?></td>
    <td colspan="3"><b>OLD IPD ID (If Any):</b> <?=$data->OldCRNO;?></td>
    </tr>
    <tr><td colspan="6"><hr></td></tr>
    <tr>
      <td width="15%"><b>Patient Name:</b></td>
      <td width="15%"><?=$data->PName;?></td>
      <td width="15%"><b>Gender:</b></td>
      <td width="15%"><?=$data->Sex;?></td>
      <td width="15%"><b>Date:</b></td>
      <td width="15%"><?=date('m/d/Y', strtotime($data->doa));?></td>
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
      <td><b>Sign & Symptoms:</b></td>
      <td><?=$data->sign_symptoms;?></td>
    </tr>
    <tr>
      <td><b>X-Ray:</b></td>
      <td><?=$data->x_ray;?></td>
      <td><b>ECG:</b></td>
      <td><?=$data->ecg;?></td>
      <td><b>Other:</b></td>
      <td><?=$data->other;?></td>
    </tr>
    <tr>
      <td><b>Diagnosis:</b></td>
      <td><?=$data->Diagnosis;?></td>
      <td><b>Department:</b></td>
      <td><?=$data->department;?></td>
      <td><b>Sugar:</b></td>
      <td><?=$data->Occupation;?></td>
    </tr>
    <tr><td colspan="6"><hr></td></tr>
</table>
<?php if($treatments): ?>
<table class="table" style="font-size:9px!important;" cellspacing="2" cellpadding="2">  
    <tr>
      <td width="5%"><b>Sr. No.</b></td>
      <td width="30%"><b>Medicine</b></td>
      <td width="20%"><b>Qty</b></td>
      <td width="20%"><b>Doses</b></td>
      <td width="25%"><b>Remark</b></td>
    </tr>
    <tr><td colspan="6"><hr></td></tr>
    <?php $count=1; foreach($treatments as $item): ?> <hr>
     <tr>
      <td ><?=$count;?></td>
      <td ><?=$item->medicine;?></td>
      <td ><?=$item->qty;?></td>
      <td ><?=$item->dose;?></td>
      <td ><?=$item->remark;?></td>
    </tr>
<?php $count++; endforeach; ?>
<tr><td colspan="6"><hr><div align="right"><?=$data->doctorname; ?></div></td></tr>
</table>
<?php endif; ?>




