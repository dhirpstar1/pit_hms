      <div class="content">
        <div class="container-fluid">
          <div class="row">
          
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div id="load_view" class="col-md-12">
               <form action="<?=base_url('/master/index/tbl_receipt');?>" method="post" id="serch_data">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
              <div class="col-md-3 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=($startDate) ? $startDate : date('d/m/Y');?>" name="startDate"  id="startDate" class="form-control" data-toggle="datepicker" placeholder="Start Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>

       <div class="col-md-3 col-sm-12 pull-left">
                    <div class="input-append">
        <input size="16" type="text" value="<?=($endDate) ? $endDate : date('d/m/Y');?>" name="endDate" id="endDate" class="form-control" data-toggle="datepicker" placeholder="End Date" autocomplete="off">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
        </div>
      </div>
      <div class="col-md-2 col-sm-12 pull-left">
      <?php echo form_dropdown('Department', $departments, $Department, 'class="form-control" id="Department"'); ?>    
      </div>
       <div class="col-md-4 col-sm-12 pull-left">
	   <button type="submit" class="btn btn-primary pull-left">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
       <button type="button" class="btn btn-primary pull-left" id="print">Print <i class="fa fa-print prntIcn" aria-hidden="true"></i></button>
		<button type="button" class="btn btn-primary pull-right add_item">Add <i class="fa fa-plus-circle addIcn" aria-hidden="true"></i></button>
      </div>
      <script type="text/javascript" src="<?=base_url('/assets/js/datepicker.min.js');?>" charset="UTF-8"></script>
<script type="text/javascript">
          $('[data-toggle="datepicker"]').datepicker({
            autoHide:true,
			format: 'dd/mm/yyyy'
          });
$('#print').click(function(){

var url = "<?=base_url('/master/print_data/tbl_receipt');?>";
var startdate = $('#startDate').val();
var enddate = $('#endDate').val();
var department = $('#Department').val();
$('<form action="'+url+'" target="_blank" method="POST"><input type="hidden" name="startDate" value="'+startdate+'"><input type="hidden" name="endDate" value="'+enddate+'"><input type="hidden" name="Department" value="'+department+'"></form>').appendTo('body').submit();
});
            
            
    </script> 
                     </form>
            </div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Receipts</h4>
                  <p class="card-category">All Receipts</p>
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
                        <th> Date</th> 
                        <th> Type</th> 
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> Care of</th>
                        <th> Refby</th>
                        <th> Family</th> 
                        <th> cardno</th> 
                        <th> charges</th> 
                        <th> validupto</th> 
                        <th> For</th> 
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
                          <?=date('d/m/Y', strtotime($listing->ddate));?>
                          </td> <td>
                          <?=$listing->type;?>
                          </td>

                           <td>
                          <?=$listing->pname;?>
                          </td>
                           <td>
                          <?=$listing->sex;?>
                          </td>
                          <td>
                          <?=$listing->age;?>
                          </td>
                          <td>
                          <?=$listing->address;?>
                          </td>
                          <td>
                          <?=$listing->careof;?>
                          </td>
                          <td>
                          <?=$listing->refby;?>
                          </td>
                          <td>
                          <?=$listing->family;?>
                          </td>
                          <td>
                          <?=$listing->cardno;?>
                          </td>
                          <td>
                          <?=$listing->charges;?>
                          </td>
                          
                          <td>
                          <?=date('d/m/Y', strtotime($listing->validupto));?>
                          </td><td>
                          <?=$listing->For;?>
                          </td>
                          
                          <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
                              </button>
							   <button type="button" rel="tooltip" title="Print" class="btn btn-primary btn-link btn-sm print"  id="<?=$listing->ID;?>">
                                <i class="material-icons">print</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete_item"  id="<?=$listing->ID;?>">
                                <i class="material-icons">close</i>
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
     $('.print').click(function(){ 
var url = "<?=base_url('/master/print_data/tbl_receipt/');?>" + $(this).attr('id');
$('<form action="'+url+'" target="_blank" method="POST"></form>').appendTo('body').submit();
});                
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
          $("#load_view").load("<?=base_url('/master/update/tbl_receipt');?>", function(data){
            <?php if($postcrno){ ?> alert();
              sate_form_data(<?=$postcrno;?>);
              <?php } ?>
           });  
        });
      //////////////////////////////////////////////////////////////////////////////////////////// 
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/tbl_receipt');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_receipt/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_receipt/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>