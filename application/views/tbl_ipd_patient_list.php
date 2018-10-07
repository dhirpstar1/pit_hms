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
               <form action="<?=base_url('/master/index/tbl_ipd_patient');?>" method="post" id="serch_data">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
              <div class="col-md-3 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=($startDate) ? $startDate : date('m/d/Y');?>" id="startDate" name="startDate" class="form-control" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>

       <div class="col-md-3 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=($endDate) ? $endDate : date('m/d/Y');?>" id="endDate" name="endDate" class="form-control" data-toggle="datepicker" placeholder="End Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 pull-left">
      <?php echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-3 col-sm-12 pull-left">
       <button type="button" class="btn btn-primary pull-right" id="print">Print </button>

                    <button type="submit" class="btn btn-primary pull-right">Search</button>
      </div>


      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true
          });

            
    </script> 
                     </form>
            </div>
            <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
</div>
<script type="text/javascript">  
            $('#print').click(function(){

var url = "<?=base_url('/master/print_data/tbl_ipd_patient');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
$('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
});
               
</script>
            <div class="clearfix"></div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">IPD Status</h4>
                  <p class="card-category">Today IPD Status</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="min-height:300px;">
                    <?php if($listings) :?>
                    <table class="table">
                      <thead class=" text-primary">
                        <th width="20">
                          ID
                        </th>
                        <th> CR No.</th>
                        <th> DOA</th> 
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> Diagnosis</th>
                        <th> Bed</th> 
                        <th> Department</th>
                        <th> Doctor</th> 
                        
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
                          <?=date('d/m/Y', strtotime($listing->doa));?>
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
                          <?=$listing->bedname;?>
                          </td>
                          <td>
                          <?=$listing->Department;?>
                          </td>
                          <td>
                          <?=$listing->DoctorName;?>
                          </td>
                          
                          <td class="td-actions text-right">
                          <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
  <i class="material-icons">menu</i>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#" class="edit_item" id="<?=$listing->ID;?>">Edit</a></li>
    <li><a href="#" class="view_item" data-table="tbl_ipd_treatment" data-id="<?=$listing->CRNO;?>">IPD Treatment</a></li>
    <li><a href="#" class="view_item" data-table="tbl_panchkarma" data-id="<?=$listing->CRNO;?>">Punchkarma</a></li>
    <li><a href="#" class="view_item" data-table="tbl_gynec" data-id="<?=$listing->CRNO;?>">Gynec</a></li>
    <li><a href="#" class="view_item" data-table="tbl_physio" data-id="<?=$listing->CRNO;?>">Physio</a></li>
    <li><a href="#" class="view_item" data-table="tbl_diet" data-id="<?=$listing->CRNO;?>">Diet</a></li>
    <li><a href="#" class="view_item" data-table="tbl_anc_register" data-id="<?=$listing->CRNO;?>">ANC</a></li>
    <li><a href="#" class="view_item" data-table="tbl_surgery" data-id="<?=$listing->CRNO;?>">Surgery</a></li>
  </ul>
</div> 
                           
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
  //////////////////////////////////////////////////////////////////////////////////////////////
  <?php if($postcrno){ ?>
          window.addEventListener('load', 
          function() { 
            $('.add_item').trigger('click');
          }, false);
        <?php } ?>
        
        $('.add_item').click(function(){
          $("#load_view").load("<?=base_url('/master/update/tbl_ipd_patient');?>", function(data){
            <?php if($postcrno){ ?>
              sate_form_data(<?=$postcrno;?>);
              <?php } ?>
           });  
        });
      ////////////////////////////////////////////////////////////////////////////////////////////  
      $('.view_item').click(function(){ 
      $('<form action="<?=base_url('/master/index/');?>'+ $(this).data('table') +'" method="post" target="_blank"><input type="hidden" name="postcrno" value="'+ $(this).data('id') +'"></form>').appendTo('body').submit();
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_ipd_patient/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_ipd_patient/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>