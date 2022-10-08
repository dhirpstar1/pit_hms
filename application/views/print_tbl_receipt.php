<div align="center" style="color:#000000;">
<h3>General Receipt</h3>
</div> 
<hr>
<table cellspacing="0" cellpadding="5" width="100%" style="font-size:13px!importantd; width:100%;">
   <tr>
      <td width="50%">Sr No. &nbsp;&nbsp;&nbsp;<b><?=$data->sr_no;?></b></td>
      <td width="25%">CR. NO. <b><?=$data->CRNO;?></b></td>
      <td width="25%">Date/Time <b><?=date('d-m-Y', strtotime($data->ddate)).' / '.$data->ttime;?></b></td>
    </tr>
    <hr>
    <tr>
      <td width="50%">Name of Patient: <b><?=$data->pname;?></b></td>
      <td width="25%">Age: <b><?=$data->age;?></b></td>
      <td width="25%">Sex: <b><?=$data->sex;?></b></td>
    </tr>
    <tr>
      <td width="50%">Address: <b><?=$data->address;?></b></td>
      <td width="25%">Card No: <b><?=$data->cardno;?></b></td>
      <td width="25%"></td>
    </tr>
    <tr>
      <td width="50%">Doctor: <b><?=$data->careof;?></b></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr>
      <td width="50%">Ref. By: <b><?=$data->refby;?></b></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <hr>
    <tr>
      <td width="50%"></td>
      <td width="25%" align="right"><b><?=$data->family;?></b> Rs.</td>
      <td width="25%"><b><?=$data->charges;?></b></td>
    </tr>
    <tr><td width="50%"></td><td colspan="2" align="right"><br><b> Sign</b> </td></tr>

</table>