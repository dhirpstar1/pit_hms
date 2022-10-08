      <div class="content">
        <div class="container-fluid">
          <div class="row">
       
            <button type="button" class="btn btn-primary pull-right add_item" style="visibility:hidden;">Add</button>

             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            <div class="col-md-12">
 <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/master/index/tbl_anc_register');?>" method="post" id="serch_data">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
              <div class="col-md-3 col-sm-12 pull-left">
                <span class="serchLabel">From</span><br>
                    <div class="input-append">
        <input size="16" type="text" value="<?=($startDate) ? $startDate : date('d/m/Y');?>" id="startDate" name="startDate" class="form-control" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>

       <div class="col-md-3 col-sm-12 pull-left">
        <span class="serchLabel">To</span><br>
                    <div class="input-append">
        <input size="16" type="text" value="<?=($endDate) ? $endDate : date('d/m/Y');?>" id="endDate" name="endDate" class="form-control" data-toggle="datepicker" placeholder="End Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 pull-left">
        <span class="serchLabel">Department</span><br>
      <?php echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-3 col-sm-12 pull-left">
       <button type="button" class="btn btn-primary pull-right" id="print" style="padding-left:18px; padding-right:18px;">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
       <button type="submit" class="btn btn-primary pull-right middleBtnRgt" style="padding-left:18px; padding-right:18px;">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
                    
      </div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });

            
                   
            $('#print').click(function(){

var url = "<?=base_url('/master/print_data/tbl_anc_register');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
$('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
});
</script> 
          
          </form>

            </div>
            <div class="clearfix"></div>
 <div class="col-md-12">
              <div class="card">


                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ANC</h4>
                  <p class="card-category">ANC Register Master</p>
                </div>
                <div class="card-body">
                <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:right; white-space:nowrap;width:99%;">
                        <th width="20">
                          ID
                        </th>
                        <th> CR No.</th>
                        <th> IPDNO</th>
                        <th> Date</th>
                        <th>Name</th>
                        <th> Address</th>
                        <th> Age</th>
                        <th> Sex</th>
                        <th> Doctor</th>
                        <th> LMP</th>
                        <th> EDD</th>
                        <th> G</th>
                        <th> P</th>
                        <th> G1</th>
                        <th> P1</th>
                        <th> G2</th>
                        <th> Indication</th>
                        <th> Radiologist</th>
                        <th> Complications</th>
                        <th> USGReport</th>
                        <th style="text-align:right;"> Action</th>
                      </thead>
                      <tbody style="text-align:center; white-space:nowrap;width:99%;">
                      <?php $count = 1; foreach($listings as $listing): ?>
                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;?>
                          </td>
                          <td>
                          <?=$listing->crno;?>
                          </td>
                          <td>
                          <?=$listing->ipdno;?>
                          </td>
                           <td>
                          <?=date('d/m/Y', strtotime($listing->ddate));?>
                          </td>
                           <td>
                          <?=$listing->pname;?>
                          </td>
                           <td>
                          <?=$listing->address;?>
                          </td>
                          <td>
                          <?=$listing->age;?>
                          </td>
                          <td>
                          <?=$listing->sex;?>
                          </td>
                          <td>
                          <?=$listing->doctor;?>
                          </td>
                          <td>
                          <?=$listing->lmp;?>
                          </td>
                          <td>
                          <?=$listing->edd;?>
                          </td>
                          <td>
                          <?=$listing->G;?>
                          </td>
                          <td>
                          <?=$listing->P;?>
                          </td>
                          <td>
                          <?=$listing->G1;?>
                          </td>
                          <td>
                          <?=$listing->P1;?>
                          </td>
                          <td>
                          <?=$listing->G2;?>
                          </td>
                          <td>
                          <?=$listing->Indication;?>
                          </td>
                          <td>
                          <?=$listing->Radiologist;?>
                          </td>
                          <td>
                          <?=$listing->Complications;?>
                          </td>
                          <td>
                          <?=$listing->USGReport;?>
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
          $("#load_view").load("<?=base_url('/master/update/tbl_anc_register');?>", function(data){
            <?php if($postcrno){ ?>
              sate_form_data(<?=$postcrno;?>);
              <?php } ?>
           });  
        });
      ////////////////////////////////////////////////////////////////////////////////////////////  
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_anc_register/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_anc_register/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>