      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 pull-right">

            <button type="button" class="btn btn-primary pull-right add_item" style="visibility:hidden;">Add</button>
</div>
             <div id="load_view" class="col-md-12"></div>

            <div class="clearfix"></div>
            
 <div class="col-md-12">

            <!-- Modal -->
           

            <div class="clearfix"></div>
              <div class="card">


                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Downloads</h4>
                  <p class="card-category">All Downloads</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php if($listings) :?>
                    <table class="table">
                      <thead class=" text-primary">
                        <th width="20">
                          ID
                        </th>
            
                        <th> File Name</th>
                   
                        
                        <th class="td-actions text-right">Download</th>                     
                      </thead>
                      <tbody>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
                          </td>
                  
                          <td>
                          <?=$listing;?>
                          </td>
                   
                          <td class="td-actions text-right">
                             
                              <a target="_blank" href="<?=base_url('uploads/'.UPLOAD_FOLDER.'/'.$listing);?>" rel="tooltip" title="Download" class="btn btn-primary btn-link btn-sm">
                              Download
                              </a>
                             
                            </td>
                        </tr>
                      <?php $count++; endforeach; ?>
                      </tbody>
                    </table>
                    <?php else: ?>
                      <div class="col-md-12">No data found.</div>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
  