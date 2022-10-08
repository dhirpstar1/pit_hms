        <div class="content">
        <div class="container-fluid">
          <div class="row">
             <div class="col-md-12 pull-right">

            <button type="button" class="btn btn-primary pull-right add_item">Add <i class="fa fa-plus-circle addIcn" aria-hidden="true"></i></button>
</div>
            <div id="load_view" class="col-md-12"></div>
 <div class="col-md-12">
              <div class="card">


                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Test Under Head</h4>
                  <p class="card-category"> Test Under Master</p>
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
                          Test Name
                        </th>
                        <th>
                         Test Code
                        </th>
                        <th>
                          Head Code
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
                          <?=$listing->TNAME;?>
                          </td>
                          <td>
                          <?=$listing->TCODE;?>
                          </td>
                          <td>
                          <?=$listing->HCODE;?>
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
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/n_master_testunderhead');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/n_master_testunderhead/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/n_master_testunderhead/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>