      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <link href="<?=base_url('/assets/css/datepicker.min.css');?>" rel="stylesheet" media="screen">
            <div class="clearfix"></div>
            <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/dispensaries/report/tbl_medicine_add_puchase');?>" method="post" id="serch_data">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
              <div class="col-md-2 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=$startDate;?>" name="startDate" id="startDate" class="form-control" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
       <div class="col-md-2 col-sm-12 pull-left">
        <div class="input-append">
        <input size="16" type="text" value="<?=$endDate;?>" name="endDate" id="endDate" class="form-control" data-toggle="datepicker" placeholder="End Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="col-md-2 col-sm-12 pull-left">
      <?php //echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
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
var url = "<?=base_url('/dispensaries/print_report/tbl_medicine_add_puchase');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
  $('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
}); 
$('#save').click(function(){ 
  $('#save').attr('disabled','disabled');
$('#save').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
var url = "<?=base_url('/dispensaries/print_report/tbl_medicine_add_puchase');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
  $('<form action="'+url+'" method="POST" id="save_file"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"><input type="hidden" name="report_type" value="save"></form>').appendTo('body');
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
                  <h4 class="card-title ">Dispensaries Purchase Report</h4>
                  <p class="card-category"> Current Purchase report</p>
                </div>
                <div class="card-body">
                <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:right; white-space:nowrap;width:99%;">
                      <th>ID</th>
                        <th> Name</th>
                        <th> QTY</th>
                        <th> Unit QTY</th>
                        <th> Purchase Date</th>
                        <th> Purchase Price</th>
                        <th> Date of expiry</th>
                        <th> Rack </th>
                        <th> CGST</th> 
                        <th> SGST</th> 
                        <th> Total</th> 
                        <th> Purchase From</th>                             
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
                          <?=$listing->qty;?>
                          </td>
                           <td>
                          <?=$listing->unit_qty;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->pur_date));?>
                          </td>
                          <td>
                          <?=$listing->purchase_price;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->date_of_expiry));?>
                          </td>
                          <td>
                          <?=$listing->rack;?>
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
                          <td>
                          <?=$listing->purchase_from;?>
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
  