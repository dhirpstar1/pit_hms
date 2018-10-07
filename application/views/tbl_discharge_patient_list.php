      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 pull-right">

            <button type="button" class="btn btn-primary pull-right add_item">Add</button>
</div>
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">
 <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/master/index/tbl_discharge_patient');?>" method="post" id="serch_data" >
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
              <div class="col-md-3 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=($startDate) ? $startDate : date('m/d/Y');?>" name="startDate" id="startDate" class="form-control" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>

       <div class="col-md-3 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=($endDate) ? $endDate : date('m/d/Y');?>" name="endDate" id="endDate" class="form-control" data-toggle="datepicker" placeholder="End Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 pull-left">
      <?php echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-3 col-sm-12 pull-left">
       <button type="submit" class="btn btn-primary pull-left">Search</button>
       <button type="button" class="btn btn-primary pull-right"  id="print">Print </button>
      </div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
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
                  <p class="card-category">Today Discharge Patient</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php if($listings) :?>
                    <table class="table">
                      <thead class=" text-primary">
                        <th width="20">
                          ID
                        </th>
                        <th> CR No.</th>
                        <th> IPD No.</th>
                        <th> Date Of Admit</th>
                        <th> Date Of Discharge</th>
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
                        <th> Condition Ondischarge</th> 
                        <th> Type of Discharge</th> 
                        <th>Action</th>                     
                      </thead>
                      <tbody>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
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
                          <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
                              </button>
                             <!-- <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete_item"  id="<?=$listing->ID;?>">
                                <i class="material-icons">close</i>
                              </button> -->
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
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/tbl_discharge_patient');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_discharge_patient/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_discharge_patient/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>