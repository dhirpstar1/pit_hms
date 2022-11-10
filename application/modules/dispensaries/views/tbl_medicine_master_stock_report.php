      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <link href="<?=base_url('/assets/css/datepicker.min.css');?>" rel="stylesheet" media="screen">
            <div class="clearfix"></div>

            <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/dispensaries/report/tbl_medicine_master_stock');?>" method="post" id="serch_data">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                  <div class="col-md-4 col-sm-12 pull-left">
        <span class="serchLabel">Category</span><br>
      <?php echo form_dropdown('category', $categories, $category, 'class="form-control" id="category"'); ?>    
      </div>
       
     
       <div class="col-md-6 col-sm-12 pull-left">
       <button type="submit" class="btn btn-primary pull-left middleBtnRgt">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
       <button type="button" class="btn btn-primary pull-left"  id="print">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
       <button type="button" class="btn btn-primary pull-right"  id="save">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
       
      </div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
  $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
  });

  $('#print').click(function(){ 
var url = "<?=base_url('/dispensaries/print_report/tbl_medicine_master_stock');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var category = $('#category').val();
  $('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="category" value="'+category+'"></form>').appendTo('body').submit();
}); 
$('#save').click(function(){ 
  $('#save').attr('disabled','disabled');
$('#save').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
var url = "<?=base_url('/dispensaries/print_report/tbl_medicine_master_stock');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var category = $('#category').val();
  $('<form action="'+url+'" method="POST" id="save_file"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="category" value="'+category+'"><input type="hidden" name="report_type" value="save"></form>').appendTo('body');
  $.post( url, $( "#save_file" ).serialize())
  .done(function( data ) {
    Swal.fire({
  title: 'Success!',
  text: 'File save successfully.',
  icon: 'success',
  confirmButtonText: 'Close'
});
    $('#save').attr('disabled',false);
    $('#save').html('Save <i class="fa fa-save addIcn" aria-hidden="true"></i>');
  });

  
});               
</script>


                     </form>
            </div>
 <div class="col-md-12">
              <div class="card">


                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicine Stock Report</h4>
                  <p class="card-category"> Current Stock report</p>
                </div>
                <div class="card-body">
                <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:right; white-space:nowrap;width:99%;">
                      <th>ID</th>
                        <th> Name.</th>
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
         $('.pagination').on('click','a',function(e){
       e.preventDefault(); 
         $("#serch_data").attr("action", $(this).attr('href'));
       $("#serch_data").submit();
     });
      </script>
  