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
                  <h4 class="card-title "> Stock Items</h4>
                  <p class="card-category"> Stock Items Master</p>
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
                          Name
                        </th>
                        <th>
                          Type
                        </th>
                        <th>
                          Qty
                        </th>
                        <th>
                          Price
                        </th>
                        <th>
                          Remark
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
                          <?=$listing->item;?>
                          </td><td>
                          <?=$stocktype[$listing->stocktype];?>
                          </td>
                          <td>
                          <?=$listing->qty;?>
                          </td>
                          
                          <td>
                          <?=$listing->price;?>
                          </td>
                          <td>
                          <?=$listing->remark;?>
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
        </div>  </div>
<script type="text/javascript">
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/tbl_stock_item');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_stock_item/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_stock_item/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });
</script>