<div class="content">
        <div class="container-fluid">
          <div class="row">            
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">
 <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/dispensaries/index/tbl_medicine_master_stock');?>" method="post" id="serch_data" >
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
        <span class="serchLabel">Category</span><br>
      <?php echo form_dropdown('category', $categories, $category, 'class="form-control" id="category"'); ?>    
      </div>
       <div class="col-md-6 col-sm-12 pull-left">  
        <button type="button" id="serch_data_button" class="btn btn-primary pull-left">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-primary pull-right add_item">Add (New Medicine) <i class="fa fa-plus-circle addIcn" aria-hidden="true"></i></button>
        </div>
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
                  <h4 class="card-title ">Medicines Status</h4>
                  <p class="card-category">Today's Medicines Status</p>
                </div>
                <div class="card-body">
                <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:center; white-space:nowrap;width:99%;">
                      <th>ID</th>
                      <th> Action</th>
                        <th> Name</th>
                        <th> Unit</th>
                        <th> Packing</th>
                        <th> QTY</th>
                        <th> Unit QTY</th>
                        <th> Purchase Price</th>
                        <th> Sale Price</th>
                        <th> Date of expiry</th>
                        <th> Category</th>
                        <th> Batch Id</th>
                        <th> Rack </th>
                        <th> Rate</th>
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
                             
                             <!-- <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete_item"  id="<?=$listing->ID;?>">
                                <i class="material-icons">close</i>
                              </button> -->
                            </td>
                         
                          <td>
                          <?=$listing->med_name;?>
                          </td>
                           <td>
                          <?=$listing->unit;?>
                          </td>
                          <td>
                          <?=$listing->packing;?>                          </td>
                           <td>
                          <?=$listing->qty;?>
                          </td>
                           <td>
                          <?=$listing->unit_qty;?>
                          </td>
                          <td>
                          <?=$listing->purchase_price;?>
                          </td>
                          <td>
                          <?=$listing->mrp;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->date_of_expiry));?>
                          </td>
                          <td>
                          <?=$listing->category;?>
                          </td>
                          <td>
                          <?=$listing->batch_id;?>
                          </td>
                          <td>
                          <?=$listing->rack;?>
                          </td>
                          <td>
                          <?=$listing->rate;?>
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
       $("#load_view").load("<?=base_url('/dispensaries/update/tbl_medicine_master_stock');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/dispensaries/update/tbl_medicine_master_stock/');?>" + $(this).attr('id'));
    });
    $('.print_item').click(function(){ 
      window.open("<?=base_url('/dispensaries/print_data/tbl_medicine_master_stock/');?>" + $(this).attr('id') + "/" + $('#year_code').val());
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/dispensaries/delete/tbl_medicine_master_stock/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>