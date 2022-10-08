<div align="center" style="color:#000000;">
<h3>Diet Report</h6>
</div> 
<table cellspacing="0" cellpadding="5" border="1" width="100%" style="font-size:10px!importantd;border:1px solid #000000; width:100%;border-collapse: collapse;">
   <tr>
      <td width="25%"><b>Name of Patient</b></td>
      <td width="25%"><?=$data->PName;?></td>
      <td width="25%"><b>CR. NO.</b> - <?=$data->CRNO;?></td>
      <td width="25%"><b>IPD NO</b> - <?=$data->ipdno;?></td>
    </tr>
    <tr>
      <td width="25%"><b>Occupation</b></td>
      <td width="25%"><?=$data->occupation;?></td>
      <td width="25%"><b>Contact Number</b></td>
      <td width="25%"><b><?=$data->contact_no;?></b></td>
    </tr>
    <tr>
      <td width="25%"><b>Age</b></td>
      <td width="25%"><?=$data->Age;?></td>
      <td width="25%"><b>Gender</b></td>
      <td width="25%"><b><?=$data->Sex;?></b></td>
    </tr>
    <tr>
      <td width="25%"><b>Height</b>&nbsp;&nbsp;&nbsp;<?=$data->height;?> Cms</td>
      <td width="25%"><b>Weight</b>&nbsp;&nbsp;&nbsp;<?=$data->weight;?> Kg</td>
      <td width="25%"><b>BMI</b></td>
      <td width="25%"><?=$data->BMI;?></td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><b>Type of Food Accustomed</b></td>
      <td width="50%" colspan="2"><b><?=$data->type_of_food_accustomed;?></b></td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><b>Any Food Allergy</b></td>
      <td width="50%" colspan="2"><b><?=$data->food_allergy;?></b> </td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><b>Any weight loss reported</b></td>
      <td width="50%" colspan="2"><b><?=$data->weight_loss_reported;?></b> </td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><b>Assessment of Agni</b></td>
      <td width="50%" colspan="2"><b><?=$data->assessment_of_agni;?></b></td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><b>Assessment of Mala Pravruti</b></td>
      <td width="50%" colspan="2"><b><?=$data->assessment_of_mala_pravrutti;?></b></td>
    </tr>
    <tr><td colspan="4"><?php //print_r($data); ?></td></tr>
    
    <tr><td colspan="4" align="center"><h3>DIET PRESCRIPTION</h3></td></tr>
    <tr><td colspan="4" height=""><?=$data->diet_prescription;?></td></tr>
    <tr><td colspan="4"></td></tr>

    <tr><td colspan="4" align="center"><h3>PRESCRIBED DIET</h3></td></tr>

    <tr><td colspan="4" align="left">Prescribed Breakfast: <?=$data->prescribed_breakfast;?></td></tr>
    <tr><td colspan="4" align="left">Prescribed Lunch: <?=$data->prescribed_lunch;?></td></tr>
    <tr><td colspan="4" align="left">Prescribed Dinner: <?=$data->prescribed_dinner;?></td></tr>
    <tr><td colspan="4"></td></tr>
    <tr><td colspan="4" height="50">Consultant Statement: </td></tr>

    <tr><td colspan="4" align="right" height="50">( Signature & Stamp of consultant ) </td></tr>

</table>