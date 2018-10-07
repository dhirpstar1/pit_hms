      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 pull-right">

            <button type="button" class="btn btn-primary pull-right add_item">Add</button>
</div>
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Certificates</h4>
                  <p class="card-category">Death Certificates</p>
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
                      <tbody>
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