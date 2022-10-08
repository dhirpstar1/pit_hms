      <div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <button type="button" class="btn btn-primary pull-right add_item" style="visibility:hidden;">Add</button>

             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">
 <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/master/index/tbl_gynec');?>" method="post" id="serch_data">
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
	  
       <button type="button" class="btn btn-primary pull-right commnBtnSpc" id="print">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
       <button type="submit" class="btn btn-primary pull-right commnBtnSpc middleBtnRgt">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
                    
      </div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });

            
                   
            $('#print').click(function(){

var url = "<?=base_url('/master/print_data/tbl_gynec');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
$('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
});
</script> 
          
          </form>

            </div>
            <div class="clearfix"></div>
            <div class="card">
            <div class="col-md-12">
            <table class="table">
                      <thead class=" text-primary">
                        <tr><th>Count => <?php //print_r($procedures_count); ?></th>
            <?php foreach($procedures as $key => $item): ?><th><?=$item; $pcount=0;?><br>
            <?php foreach($procedures_count as $key1 => $item1): 
                if($item1->procedure_id == $key):  $pcount = $item1->procedure_count; ?>
              <?php endif; ?>
            <?php endforeach; echo $pcount; ?>

          </th> <?php endforeach; ?>
        </tr>
        </head>
        </table>
          </div>
            </div>
            <div class="clearfix"></div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Gynec Status</h4>
                  <p class="card-category">Today Gynec Status</p>

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
                        <th> IPD No.</th>
                        <th> Date</th> 
                        <th> Patient Name</th>
                        <th> M/F</th>
                      
                        <th> Department</th>
                        <th> Doctor</th> 
                        <th> Local Procedure</th> 
                        <th>Action</th>                     
                      </thead>
                      <tbody style="text-align:center; white-space:nowrap;width:99%;">
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
                          </td>
                          <td>
                          <?=$listing->Crno;?>
                          </td>
                          <td>
                          <?=$listing->ipdno;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->gdate));?>
                          </td>
                           <td>
                          <?=$listing->pname;?>
                          </td>
                           <td>
                          <?=$listing->sex;?>
                          </td>
                         
                          <td>
                          <?=$listing->department;?>
                          </td>
                          <td>
                          <?=$listing->doctorname;?>
                          </td>
                          <td>
                          <?=$listing->LocalProcedure;?>
                          </td>
                          <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
                              </button>
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
          $("#load_view").load("<?=base_url('/master/update/tbl_gynec');?>", function(data){
            <?php if($postcrno){ ?>
              sate_form_data(<?=$postcrno;?>);
              <?php } ?>
           });  
        });
      ////////////////////////////////////////////////////////////////////////////////////////////  
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_gynec/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_gynec/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>