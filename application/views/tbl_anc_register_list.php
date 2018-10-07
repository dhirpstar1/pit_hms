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
                  <h4 class="card-title ">ANC</h4>
                  <p class="card-category">ANC Register Master</p>
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
                        <th>Name</th>
                        <th> Address</th>
                        <th> Age</th>
                        <th> Sex</th>
                        <th> Doctor</th>
                        <th> LMP</th>
                        <th> EDD</th>
                        <th> G</th>
                        <th> P</th>
                        <th> G1</th>
                        <th> P1</th>
                        <th> G2</th>
                        <th> Indication</th>
                        <th> Radiologist</th>
                        <th> Complications</th>
                        <th> USGReport</th>
                        <th style="text-align:right;"> Action</th>
                      </thead>
                      <tbody>
                      <?php $count = 1; foreach($listings as $listing): ?>
                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;?>
                          </td>
                          <td>
                          <?=$listing->crno;?>
                          </td>
                           <td>
                          <?=date('d/m/Y', strtotime($listing->ddate));?>
                          </td>
                           <td>
                          <?=$listing->pname;?>
                          </td>
                           <td>
                          <?=$listing->address;?>
                          </td>
                          <td>
                          <?=$listing->age;?>
                          </td>
                          <td>
                          <?=$listing->sex;?>
                          </td>
                          <td>
                          <?=$listing->doctor;?>
                          </td>
                          <td>
                          <?=$listing->lmp;?>
                          </td>
                          <td>
                          <?=$listing->edd;?>
                          </td>
                          <td>
                          <?=$listing->G;?>
                          </td>
                          <td>
                          <?=$listing->P;?>
                          </td>
                          <td>
                          <?=$listing->G1;?>
                          </td>
                          <td>
                          <?=$listing->P1;?>
                          </td>
                          <td>
                          <?=$listing->G2;?>
                          </td>
                          <td>
                          <?=$listing->Indication;?>
                          </td>
                          <td>
                          <?=$listing->Radiologist;?>
                          </td>
                          <td>
                          <?=$listing->Complications;?>
                          </td>
                          <td>
                          <?=$listing->USGReport;?>
                          </td>
                          
                          <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
                              </button>
                             <!-- <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete_item"  id="<?=$listing->ID;?>">
                                <i class="material-icons">close</i>
                              </button> -->
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
          $("#load_view").load("<?=base_url('/master/update/tbl_anc_register');?>", function(data){
            <?php if($postcrno){ ?>
              sate_form_data(<?=$postcrno;?>);
              <?php } ?>
           });  
        });
      ////////////////////////////////////////////////////////////////////////////////////////////  
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_anc_register/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_anc_register/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });


  </script>