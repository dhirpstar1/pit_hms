
         
 <div class="col-md-12 well " > <hr> 
<div class="table-responsive">
<?php if($listings) :?>
<table class="table info" style="background-color: antiquewhite;">
<thead class=" text-primary">
<th width="20">
ID
</th>
<th>
Test Name
</th>
<th>
Result
</th>
<th>
Rate
</th>
<th>
Unit
</th>
<th>
Range From
</th>
<th>
Range Upto
</th>
</thead>
<tbody>

<?php foreach($listings as $key => $listingold):  ?>

<tr id="<?=md5($key);?>" class="heading_class2" style="display:none;"><th colspan="10"><?=$key;?></th></tr>
<?php $count = 1; foreach($listingold as $key1 => $listing): //print_r($listing); 
if(in_array($listing->ID, $selected_tests)): $selectedrows[] = md5($key); ?>
<tr id="row_<?=$listing->ID;?>">
<td>
<?=$count;?>
</td>
<td>
<?=$listing->FNAME;?>
</td>
<td>
  <input type="text" class="form-control"    name="TEST[RESULT][]" required="required" >
  <input type="hidden" class="form-control"  name="TEST[TCODE][]" value="<?=$listing->TCODE;?>">
  <input type="hidden" class="form-control"  name="TEST[TNAME][]" value="<?=$listing->FNAME;?>">
  <input type="hidden" class="form-control"  name="TEST[UNIT][]"  value="<?=$listing->UNIT;?>">
  <input type="hidden" class="form-control"  name="TEST[RANGEFROM][]" value="<?=$listing->RFROM;?>">
  <input type="hidden" class="form-control"  name="TEST[RANGETO][]" value="<?=$listing->RTO;?>">
</td>
<td>
<?=$listing->RATE;?>
</td>
<td>
<?=$listing->UNIT;?>
</td>
<td>
<?=$listing->RFROM;?>
</td>
<td>
<?=$listing->RTO;?>
</td>
</tr>
<?php $count++; endif;   endforeach; ?>
<?php  endforeach; ?>
</tbody>
</table>
<?php else: ?>
<div class="col-md-12">No data found.</div>
<?php endif; ?>
</div>
</div>

<script>
 function set_headings() {
var jqueryarray = <?php echo json_encode($selectedrows); ?>;
 $.each($(".heading_class2"), function(){      
   var head_id = $(this).attr('id');
   $.each(jqueryarray, function (idx, val) {
  if(val === head_id){
     $('#' + val).css('display', 'block');
   }
  });
 });
}
</script>