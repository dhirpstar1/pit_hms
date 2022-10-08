      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="clearfix"></div>

            <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/master/report/tbl_discharge_patient');?>" method="post" id="serch_data">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
              <div class="col-md-2 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=$startDate;?>" name="startDate"  id="startDate" class="form-control" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
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
      <?php echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-6 col-sm-12 pull-left">
        <button type="submit" class="btn btn-primary pull-left middleBtnRgt">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
       <button type="button" class="btn btn-primary pull-left"  id="print">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
       <button type="button" class="btn btn-primary pull-right"  id="save">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
       
      </div>
      <script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });           
      </script> 
      <script type="text/javascript">  
            $('#print').click(function(){ 
var url = "<?=base_url('/master/print_report/tbl_discharge_patient');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
$('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
});  

$('#save').click(function(){ 
  $('#save').attr('disabled','disabled');
$('#save').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
var url = "<?=base_url('/master/print_report/tbl_discharge_patient');?>";
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
    $('#save').html('Save <i class="fa fa-save addIcn" aria-hidden="true"></i>');  });

  
});
</script>
                     </form>
            </div>
 <div class="col-md-12">
              <div class="card">


                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Discharge Report</h4>
                  <p class="card-category"> Central Regitration Discharge Patient Sheet</p>
                </div>
                <div class="card-body">
                  <!-- <div class="table-responsive table-condensed"> -->
                  <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:center; white-space:nowrap;width:99%;">
                        <th width="20"> ID </th>
                        <th> CR No.</th>
                        <th> Old No.</th>
                        <th> Dis. Date</th> 
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> No Of Days</th>
                        <th> Operation</th>
                        <th> Diagnosis</th>
                        <th> Investigations</th>
                        <th> Treatment Given</th>
                        <th> Treatment Adviced</th>
                        <th> Followup After Days</th>
                        <th> Condition On Discharge</th>
                        <th> Type Of Discharge</th> 
                         <th> Doctor</th>             
                      </thead>
                      <tbody style="text-align:center; white-space:nowrap;width:99%;">
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
                          </td>
                          <td>
                          <?=$listing->CRNO;?>
                          </td>
                          
                           <td>
                          <?=$listing->OldCRNO;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->dod));?>
                          </td>
                           <td>
                          <?=$listing->PName;?>
                          </td>
                           <td>
                          <?=$listing->Sex;?>
                          </td>
                          <td>
                          <?=$listing->Age;?>
                          </td>
                          <td>
                          <?=$listing->Address;?>
                          </td>
                          <td>
                          <?=$listing->nod;?>
                          </td>
                           <td>
                          <?=$listing->operation;?>
                          </td>
                          <td>
                          <?=$listing->finaldiagnosis;?>
                          </td>
                          <td>
                          <?=$listing->investigations;?>
                          </td>
                          <td>
                          <?=$listing->treatmentgiven;?>
                          </td>
                          <td>
                          <?=$listing->treatmentadviced;?>
                          </td>
                          <td>
                          <?=$listing->followupafter;?>
                          </td>
                         <td>
                          <?=$listing->conditionondischarge;?>
                          </td>
                         <td>
                          <?=$listing->typeofdischarge;?>
                          </td>
                         
                          <td>
                          <?=$listing->DoctorName;?>
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
  