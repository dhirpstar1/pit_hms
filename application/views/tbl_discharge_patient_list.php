      <div class="content">
        <div class="container-fluid">
          <div class="row">            
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">
 <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/master/index/tbl_discharge_patient');?>" method="post" id="serch_data" >
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
        <span class="serchLabel">Department</span><br>
      <?php echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-6 col-sm-12 pull-left">  
        <button type="button" id="serch_data_button" class="btn btn-primary pull-left">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-primary pull-left" id="print" style="margin-left:5px;">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-primary pull-right add_item">Add (New Discharge) <i class="fa fa-plus-circle addIcn" aria-hidden="true"></i></button>
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
                  <h4 class="card-title ">Discharge Status</h4>
                  <p class="card-category">Today's Discharge Patient</p>
                </div>
                <div class="card-body">
                <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:center; white-space:nowrap;width:99%;">
                        <th>ID</th>
						            <th>Action</th>  
                        <th> CR No.</th>
                        <th> IPD No.</th>
                        <th> D.O.A.</th>
                        <th> D.O.D.</th>
                        <th> No. of Days</th>
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Bed</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> Diagnosis</th>
                        <th> Department</th>
                        <th> Doctor</th> 
                        <th> Operation</th> 
                        <th> Final Diagnosis</th> 
                        <th> Investigations</th> 
                        <th> Treatment Given</th> 
                        <th> Treatment Adviced</th> 
                        <th> Followup After</th> 
                        <th> Condition On Discharge</th> 
                        <th> Type of Discharge</th> 
                                           
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
                              <button type="button" rel="tooltip" title="Print" class="btn btn-primary btn-link btn-sm print_item" id="<?=$listing->CRNO;?>">
                                <i class="material-icons">print</i>
                              </button>
                             <!-- <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete_item"  id="<?=$listing->ID;?>">
                                <i class="material-icons">close</i>
                              </button> -->
                            </td>
                         
                          <td>
                          <?=$listing->CRNO;?>
                          </td>
                           <td>
                          <?=$listing->ipdno;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->doa));?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->dod));?>
                          </td>
                          <td>
                          <?=$listing->nod;?>                          </td>
                           <td>
                          <?=$listing->PName;?>
                          </td>
                           <td>
                          <?=$listing->Sex;?>
                          </td>
                          <td>
                          <?=$listing->bedname;?>
                          </td>
                          <td>
                          <?=$listing->Age;?>
                          </td>
                          
                          <td>
                          <?=$listing->Address;?>
                          </td>
                          <td>
                          <?=$listing->Diagnosis;?>
                          </td>
                          <td>
                          <?=$listing->Department;?>
                          </td>
                          <td>
                          <?=$listing->DoctorName;?>
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
       $("#load_view").load("<?=base_url('/master/update/tbl_discharge_patient');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_discharge_patient/');?>" + $(this).attr('id'));
    });
    $('.print_item').click(function(){ 
      window.open("<?=base_url('/master/print_data/tbl_discharge_patient/');?>" + $(this).attr('id') + "/" + $('#year_code').val());
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_discharge_patient/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>