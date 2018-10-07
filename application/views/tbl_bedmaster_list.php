      <div class="content">
        <div class="container-fluid">
          <div class="row">
             <div class="col-md-12 pull-right">

            <button type="button" class="btn btn-primary pull-right add_item">Add</button>
</div>
            <div id="load_view" class="col-md-12"></div>
 <div class="col-md-12">
              <div class="card">


                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Beds</h4>
                  <p class="card-category"> Bed Master</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php if($listings) :?>
                    <table class="table">
                      <thead class=" text-primary">
                        <th width="20">
                          ID
                        </th>
                        <th>
                          Department
                        </th>
                         <th>
                          Ward
                        </th>
                         <th>
                          Bed Code
                        </th>
                         <th>
                          Description
                        </th> 
                        <th>
                          Available
                        </th>
                        
                          <th style="text-align: right;">
                          Action
                        </th>
                      </thead>
                      <tbody>
                      <?php $count = 1; foreach($listings as $listing): ?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
                          </td>
                          <td>
                          <?=$listing->Department;?>
                          </td>
                          <td>
                          <?=$listing->Ward;?>
                          </td>
                          <td>
                          <?=$listing->bedCode;?>
                          </td>
                          <td>
                          <?=$listing->Description;?>
                          </td>
                          <td>
                          <?=$listing->Available;?>
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
  <script type="text/javascript">
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/tbl_bedmaster');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_bedmaster/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_bedmaster/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>