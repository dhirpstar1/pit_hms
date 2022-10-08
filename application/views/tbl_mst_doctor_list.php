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
                  <h4 class="card-title ">Doctors</h4>
                  <p class="card-category"> Doctor Master</p>
                </div>
                <div class="card-body">
                <div class="table-responsive"  style="max-height: 500px; width: 100%;overflow: auto;">
                    <?php if($listings) :?>
                      <table class="table" class="table table-bordered table-striped" style="font-size: 12px;padding:0px;margin:0px;">
                      <thead  style="text-align:right; white-space:nowrap;width:99%;">
                        <th width="20">
                          ID
                        </th>
                        <th>
                          Doctor Name
                        </th>
                        <th>
                          Address
                        </th>
                        <th>
                          Contact
                        </th>
                        <th>
                          Specialist
                        </th>
                         <th>
                          Department
                        </th>
                         <th>
                          Same Time Days
                        </th>
                         <th>
                          Other Time Days
                        </th>
                          <th>
                          Action
                        </th>
                      </thead>
                      <tbody style="text-align:center; white-space:nowrap;width:99%;">
                      <?php $count = 1; foreach($listings as $listing): ?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
                          </td>
                          <td>
                          <?=$listing->DNAME;?>
                          </td>
                          <td>
                            <?=$listing->ADDRESS;?>
                            
                          </td>
                          <td>
                            <?=$listing->contact;?>
                          </td>
                          <td class="text-primary">
                            <?=$listing->specialist;?>
                          </td>
                          <td class="text-primary">
                            <?=$listing->department;?>
                          </td>
                          <td class="text-primary">
                            <?=$listing->Sametimedays;?>
                          </td>
                          <td class="text-primary">
                            <?=$listing->OtherTimeDays;?>
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
      </div></div>
  <script type="text/javascript">
    $('.add_item').click(function(){
       $("#load_view").load("<?=base_url('/master/update/tbl_mst_doctor');?>"); 
    });
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_mst_doctor/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_mst_doctor/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>