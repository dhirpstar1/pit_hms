<h1></h1>
<table cellspacing="5" cellpadding="5" width="100%" style="font-size:10px!importantd;">
   <tr>
      <td width="15%"><b>Name of Patient</b></td>
      <td width="15%"><?=$data->PName;?></td>
      <td width="15%"><b>Age</b></td>
      <td width="15%"><?=$data->Age;?></td>
      <td width="15%"><b>IPD NO.</b></td>
      <td width="15%" colspan="2"><?=$data->CRNO;?></td>
    </tr><hr>
    <tr><td colspan="8"></td></tr>
    <tr>
      <td><b>Name of Patient: Veryfied </b></td>
      <td><?php if($data->patient_verified == 1){ ?> Yes <?php } ?></td>
      <td><b>Site Of Surgery: Veryfied</b></td>
      <td><?php if($data->site_surgery_verified == 1){ ?> Yes <?php } ?></td>
      <td><b>Side Of Surgery: Veryfied</b></td>
      <td colspan="2"><?php if($data->side_surgery_verified == 1){ ?> Yes <?php } ?> </td>
    </tr><hr>
    <tr><td colspan="7" align="center"><h3>REPORT OF SURGERY</h3></td></tr>
    <tr><hr>
      <td><b>Name of Surgeon:</b></td>
      <td><?=$data->name_of_surgeon;?></td>
      <td><b>Anesthesiologist:</b></td>
      <td><?=$data->anesthesiologist;?></td>
      <td><b>Name of Nurse:</b></td>
      <td colspan="2"><?=$data->name_of_nurse;?></td>
    </tr><hr>
    <tr>
      <td><b>Type of Surgery:</b></td>
      <td><?=$data->type_of_surgery;?></td>
      <td><b>Pre - Operative Diagnosis:</b></td>
      <td><?=$data->preoperative_diagnosis;?></td>
      <td><b>Type of Anesthesia:</b></td>
      <td colspan="2"><?=$data->type_of_anaesthesia;?></td>
    </tr><hr>
    <tr>
      <td><b>Pre - Operative Medication:</b></td>
      <td><?php if($data->preoperative_medication == 1){ ?> Yes <?php } ?></td>
      <td><b>Surgery Major/Minor:</b></td>
      <td><?php if($data->surgery_major_minor == 1){ ?> Major <?php }else{ ?> Minor <?php } ?><?=$data->department;?></td>
      <td><b>Begins at:</b></td>
      <td><?=$data->begins_time;?></td>
      <td><b>Ended at:</b></td>
      <td><?=$data->end_time;?></td>
    </tr><hr>
    <tr><td colspan="8"></td></tr>
    <tr><td colspan="7" align="center"><h3>DESCRIPTION OF SURGERY</h3></td></tr>
    <tr><td colspan="7" height="50"><?=$data->description_of_surgery;?></td></tr>
    <tr><td colspan="7" align="left"><h3>Post Operative Assessment nd plan of Treatment</h3></td></tr>
    <tr><td colspan="7"  height="50"><?=$data->plan_of_treatment;?></td></tr>
    <tr><td colspan="7" align="right">Name, Designation and <br> Signature Of Surgeon </td></tr>

</table>

    

