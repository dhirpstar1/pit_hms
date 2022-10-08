      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 pull-right">

            
</div>
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">
            <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/master/index/tbl_opd_patient');?>" method="post" id="serch_data">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                  <div class="col-md-2 col-sm-12 pull-left">
                    <span class="serchLabel">From</span><br>
                    <div class="input-append">
                    <input size="16" type="text" value="<?=($startDate) ? $startDate : date('d/m/Y');?>" id="startDate" name="startDate" class="form-control" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
                    <span class="add-on"><i class="icon-remove"></i></span>
                    <span class="add-on"><i class="icon-th"></i></span>
                    </div>
            </div>

       <div class="col-md-2 col-sm-12 pull-left">
                    <span class="serchLabel">To</span><br>
                    <div class="input-append">
        <input size="16" type="text" value="<?=($endDate) ? $endDate : date('d/m/Y');?>" id="endDate" name="endDate" class="form-control" data-toggle="datepicker" placeholder="End Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="col-md-2 col-sm-12 pull-left">
              <span class="serchLabel">Department</span><br>
              <?php echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-6 col-sm-12 pull-right" style=padding:0px;>
        <button type="submit" class="btn btn-primary">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
	      <button type="button" class="middleBtn btn btn-primary" id="print">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-primary add_item pull-right">Add New Patient <i class="fa fa-plus-circle addIcn" aria-hidden="true"></i></button>
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
            <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
</div>
<script type="text/javascript">  
            $('#print').click(function(){
var url = "<?=base_url('/master/print_data/tbl_opd_patient');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
$('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
});              
</script>
            <div class="clearfix"></div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">OPD Status</h4>
                  <p class="card-category">Today OPD Status</p>
                </div>
                <div class="card-body">
                     <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
				          <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:right; white-space:nowrap;width:99%;">
					              <th>Action</th>  
                        <th width="2%">ID</th>
                        <th width="7%"> CR No.</th>
                        <th width="8%"> OLD No.</th>
                        <th> Date</th> 
                        <th width="13%"> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> Diagnosis</th>
                        <th width="15%"> Department</th>
                        <th> Doctor</th> 
                                           
                      </thead>
                      <tbody style="text-align:center; white-space:nowrap;width:99%;">
                      <?php $count = (($page) ? $page : 0) + 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
						<td class="td-actions text-right">
                          <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
  <i class="material-icons">menu</i>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#" class="edit_item" id="<?=$listing->ID;?>">Edit</a></li>
    <li><a href="#" class="view_item" data-table="tbl_opd_treatment" data-id="<?=$listing->CRNO;?>">OPD Treatment</a></li>
    <li><a href="#" class="view_item" data-table="tbl_ipd_patient" data-id="<?=$listing->CRNO;?>">IPD Register</a></li>
    <li><a href="#" class="view_item" data-table="tbl_panchkarma" data-id="<?=$listing->CRNO;?>">Panchkarma</a></li>
    <?php if($listing->Sex == 'F'): ?>
    <li><a href="#" class="view_item" data-table="tbl_gynec" data-id="<?=$listing->CRNO;?>">Gynec</a></li>
    <li><a href="#" class="view_item" data-table="tbl_anc_register" data-id="<?=$listing->CRNO;?>">ANC</a></li>
    <?php endif; ?>
    <li><a href="#" class="view_item" data-table="tbl_physio" data-id="<?=$listing->CRNO;?>">Physio</a></li>
    <li><a href="#" class="view_item" data-table="tbl_diet" data-id="<?=$listing->CRNO;?>">Diet</a></li>
    <li><a href="#" class="view_item" data-table="n_report_testm" data-id="<?=$listing->CRNO;?>">Lab</a></li>
    <li><a href="#" class="view_item" data-table="tbl_x_ray" data-id="<?=$listing->CRNO;?>">X-Ray</a></li>

  </ul>
</div> 
                          
                              
                            </td>
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
                          <?=date('d/m/Y', strtotime($listing->opddate));?>
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
                          <?=$listing->Diagnosis;?>
                          </td>
                          <td>
                          <?=$listing->Department;?>
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

      <script type="text/javascript">
         $('.pagination').on('click','a',function(e){
       e.preventDefault(); 
         $("#serch_data").attr("action", $(this).attr('href'));
       $("#serch_data").submit();
     });
      </script>
  <script type="text/javascript">
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/tbl_opd_patient');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_opd_patient/');?>" + $(this).attr('id')); 
    });

    $('.view_item').click(function(){ 
      $('<form action="<?=base_url('/master/index/');?>'+ $(this).data('table') +'" method="post" target="_blank"><input type="hidden" name="postcrno" value="'+ $(this).data('id') +'"></form>').appendTo('body').submit();
    });



   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_opd_patient/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>