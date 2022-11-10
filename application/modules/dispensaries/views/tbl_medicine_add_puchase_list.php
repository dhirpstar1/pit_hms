      <div class="content">
        <div class="container-fluid">
          <div class="row">            
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">
 <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/dispensaries/index/tbl_medicine_add_puchase');?>" method="post" id="serch_data" >
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
				  <input type="hidden" id="year_code" name="year_code" value="<?php echo $this->input->post('year_code'); ?>">
        <div class="col-md-2 col-sm-12 pull-left">
            <span class="serchLabel">From</span><br>
        <div class="input-append">
        <input size="16" type="text" value="<?=($startDate) ? $startDate : date('d/m/Y');?>" name="startDate" id="startDate" class="form-control select_date" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>

       <div class="col-md-2 col-sm-12 pull-left">
			<span class="serchLabel">To</span><br>
        <div class="input-append">
        <input size="16" type="text" value="<?=($endDate) ? $endDate : date('d/m/Y');?>" name="endDate" id="endDate" class="form-control select_date" data-toggle="datepicker" placeholder="End Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="col-md-2 col-sm-12 pull-left">
        <span class="serchLabel"></span><br>
      <?php //echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-6 col-sm-12 pull-left">  
        <button type="button" id="serch_data_button" class="btn btn-primary pull-left">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-primary pull-right add_item">Add/Purchase Medicine <i class="fa fa-plus-circle addIcn" aria-hidden="true"></i></button>
        </div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });
 </script> 
                     </form>
            </div>
            <!-- Modal -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
</div>
<script type="text/javascript">  
            $('#print').click(function(){ 
var url = "<?=base_url('/master/print_data/tbl_discharge_patient');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
$('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
});                
</script>
            <div class="clearfix"></div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicine Add/Purchase</h4>
                  <p class="card-category">Today's Medicine Add/Purchase List</p>
                </div>
                <div class="card-body">
                <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:center; white-space:nowrap;width:99%;">
                        <th> ID</th>
						            <th> Action</th>  
                        <th> Medicine Name</th>
                        <th> D.O.P.</th>
                        <th> D.O.E.</th>
                        <th> Purchase Price</th> 
                        <th> Purchase From</th> 
                        <th> QTY</th>
                        <th> Unit QTY</th>
                        <th> CGST</th>
                        <th> SGST</th>
                        <th> Total</th> 
                      </thead>
                      <tbody style="text-align:center; white-space:nowrap;width:99%;">
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
						 <td>
                            <?=$count;?>
                          </td>
						<td class="">
                           <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
                              </button>
                            
                            </td>
                           <td><?=$listing->med_name;?>        
                          </td>
                        <td>
                          <?=date('d/m/Y', strtotime($listing->pur_date));?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->date_of_expiry));?>
                          </td>
                          
                          <td>
                          <?=$listing->purchase_price;?>
                          </td>
                          <td>
                          <?=$listing->purchase_from;?>
                          </td>
                          
                          <td>
                          <?=$listing->qty;?>
                          </td>
                          <td>
                          <?=$listing->unit_qty;?>
                          </td>
                          <td>
                          <?=$listing->cgst;?>
                          </td>
                          <td>
                          <?=$listing->sgst;?>
                          </td>
                          <td>
                          <?=$listing->total;?>
                          </td>
                         
                          
                        </tr>
                      <?php $count++; endforeach; ?>
                      </tbody>
                    </table>
                    <div class="col-md-12"><?php echo $page_links; ?></div>
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <script type="text/javascript">
	$('#serch_data_button').click(function(e){
		e.preventDefault();
		var startDate = $('#startDate').val();
		var endDate = $('#endDate').val();
		$.post("<?=base_url('/master/get_year_code');?>",
		  {
			startDate: startDate,
			endDate: endDate
		  },
		  function(data, status){
				$('#year_code').val(data);
				$('#serch_data').submit();
		  });
    });
  
  
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/dispensaries/update/tbl_medicine_add_puchase');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/dispensaries/update/tbl_medicine_add_puchase/');?>" + $(this).attr('id'));
    });
    $('.print_item').click(function(){ 
      window.open("<?=base_url('/dispensaries/print_data/tbl_medicine_add_puchase/');?>" + $(this).attr('id') + "/" + $('#year_code').val());
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/dispensaries/delete/tbl_medicine_add_puchase/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });
    
  </script>