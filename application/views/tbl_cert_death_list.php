      <div class="content">
        <div class="container-fluid">
          <div class="row">
		   <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            <div class="col-md-12 pull-right">

            <div class="col-md-12 pull-right">
 <form action="<?=base_url('/master/index/tbl_cert_death');?>" method="post" id="serch_data">
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
                   <button type="button" class="btn btn-primary pull-right add_item">Add</button>

       <button type="submit" class="btn btn-primary pull-right middleBtnRgt" style="padding-left:18px; padding-right:18px;">Search <i class="fa fa-search srchIcn" aria-hidden="true"></i></button>
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

            <div class="clearfix"></div>
            
 <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Certificates</h4>
                  <p class="card-category">Death Certificates</p>
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
                        <th> Date Of Admit</th> 
                        <th> Patient Name</th>
                        <th> M/F</th>
                        <th> Age</th>
                        <th> Address</th>
                        <th> Date Of Issue</th> 
                        <th> Date Of Death/Time</th> 
                        <th> Doctor</th> 
                        <th> Action</th>                     
                      </thead>
                      <tbody style="text-align:center; white-space:nowrap;width:99%;">
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
                          </td>
                          <td>
                          <?=$listing->ipdno;?>
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->doa));?>
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
                          <?=date('d/m/Y', strtotime($listing->issuedate));?> 
                          </td>
                          <td>
                          <?=date('d/m/Y', strtotime($listing->deathdate));?> / <?=$listing->deathtime ?>
                          </td>
                          <td>
                          <?=$listing->dname;?>
                          </td>
                          <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
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
      </div>
  </div>
    
  <script type="text/javascript">
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/tbl_cert_death');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_cert_death/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_cert_death/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>