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
                  <h4 class="card-title ">Sub Tests</h4>
                  <p class="card-category"> Sub Test Master</p>
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
                         Sub Head Code
                        </th>
                        <th>
                          Rate
                        </th>
                        <th>
                          Unit
                        </th>
                        <th>
                          Range From
                        </th>
                        <th>
                          Range Upto
                        </th>
                          <th style="text-align: right;">
                          Action
                        </th>
                      </thead>
                      <tbody>


                      <?php foreach($listings as $key => $listingold): ?>
                      <tr><th colspan="10"><?=$key;?></th></tr>
                      <?php $count = 1; foreach($listingold as $key => $listing): ?>
                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;?>
                          </td>
                          <td>
                          <?=$listing->FNAME;?>
                          </td>
                          <td>
                          <?=$listing->TCODE;?>
                          </td>
                          <td>
                          <?=$listing->RATE;?>
                          </td>
                          <td>
                          <?=$listing->UNIT;?>
                          </td>
                          <td>
                          <?=$listing->RFROM;?>
                          </td>
                          <td>
                          <?=$listing->RTO;?>
                          </td>
                          
                          <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
                              </button>
                             
                            </td>
                        </tr>
                        <?php $count++; endforeach; ?>
                      <?php  endforeach; ?>
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
       $("#load_view").load("<?=base_url('/master/update/n_master_fields');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/n_master_fields/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/n_master_fields/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>