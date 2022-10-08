<div align="center" style="color:#000000;">
<h3>X-Ray Report</h6>
</div> <div style="font-size:12px!important;">Sr. No. - <?=$data->sr_no;?></div>
<br>
<table cellspacing="0" cellpadding="5" border="1" width="100%" style="font-size:10px!important;border:1px solid #000000; width:100%;border-collapse: collapse;">
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
      <td width="25%"><b>Date Of X-Ray</b></td>
      <td width="25%"><?=$data->xdate;?></td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><b>Name of X-Ray Part</b></td>
      <td width="50%" colspan="2"><b><?=$data->name_of_xray_part;?></b></td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><b>Observation</b></td>
      <td width="50%" colspan="2"><b><?=$data->observation;?></b> </td>
    </tr>
    <tr><td colspan="4"><?php //print_r($data); ?></td></tr>   
    <tr><td colspan="4" align="center"><h3> Result</h3></td></tr>
    <tr><td colspan="4" height="50"><?=$data->result;?></td></tr>
    <tr><td colspan="4"></td></tr>
   <tr><td colspan="4" align="right" height="50">( Signature & Stamp of consultant ) </td></tr>
</table>