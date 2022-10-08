<?php if(!$show_listings): ?>
<div class="card">
<div class="card-header card-header-primary">
                  <h4 class="card-title ">Treatment</h4>
                  <p class="card-category">Given Medicines</p>
                </div>
               <div class="card-body">
<form action="<?=base_url('/master/update_with_id');?>" method="post" id="save_data">
                    <input type="hidden" id="id_ipd_trt" name="ID" value="<?=$data->ID;?>">
                    <input type="hidden" name="series" id="Series" value="<?=$data->Series;?>">
                    <input type="hidden" name="crno" id="CRNO" value="<?=($data->crno) ? $data->crno : $data->CRNO;?>">
                    <input type="hidden" name="tbl" value="tbl_ipd_treatment">
                    <input type="hidden" name="ddate" value="<?=date('d/m/Y');?>">            
                    <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                          <label class="bmd-label-floating">Medicine</label>
                          <input type="text" class="form-control" id="medicine" name="medicine" value="<?=$data->medicine;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                          <label class="bmd-label-floating">Quantity</label>
                          <input type="text" class="form-control" id="qty" name="qty" value="<?=$data->qty;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                          <label class="bmd-label-floating">Does Given</label>
                          <input type="text" class="form-control" id="dose"  name="dose" value="<?=$data->dose;?>" required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                          <label class="bmd-label-floating">Remark</label>
                          <input type="text" class="form-control" id="remark" name="remark" value="<?=$data->remark;?>" required="required">
                        </div>
                      </div>
                    <div class="col-md-2">
                        <button type="submit" id="save_button_med" class="btn btn-primary pull-right">Save <i class="fa fa-save addIcn" aria-hidden="true"></i></button>
                    </div>
                    <div class="clearfix"></div>
                      </form>
                      <script type="text/javascript">

                      $("#save_data").submit(function(event){
						  $('#save_button_med').attr('disabled','disabled');
						$('#save_button_med').html('<i class="fa fa-spinner fa-spin"></i> Data Saving....');
    event.preventDefault(); //prevent default action
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data
    }).done(function(response){ 
    $('#save_button_med').html('Save <i class="fa fa-save addIcn" aria-hidden="true"></i>');
	$('#save_button_med').attr('disabled', false);	
      $('#id_ipd_trt').val('');
      $('#qty').val('');
      $('#dose').val('');
      $('#remark').val('');
      $('#medicine').val('');
      $("#load_view_list").load("<?=base_url('/master/get_custom_list/tbl_ipd_treatment/crno/');?>" + response);
    });
});
                      </script>         
                      </div>
                      </div>

                      <?php else: ?>
              <div class="card">
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
                        <th> Medicine Given</th>
                        <th> Qty</th>
                        <th> Does</th>
                        <th> Remarks</th>
                        <th style="text-align:right;"> Action</th>
                      </thead>
                      <tbody>
                      <?php $count = 1; foreach($listings as $listing): //print_r($listing); exit;?>

                        <tr id="row_<?=$listing->ID;?>">
                          <td>
                            <?=$count;//$listing->ID;?>
                          </td>
                          <td>
                          <?=$listing->crno;?>
                          </td>
                           <td>
                          <?=date('d/m/Y', strtotime($listing->ddate));?>
                          </td>
                           <td>
                          <?=$listing->medicine;?>
                          </td>
                           <td>
                          <?=$listing->qty;?>
                          </td>
                          <td>
                          <?=$listing->dose;?>
                          </td>
                          <td>
                          <?=$listing->remark;?>
                          </td>
                        
                          
                          <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm edit_item" id="<?=$listing->ID;?>">
                                <i class="material-icons">edit</i>
                              </button>
                           <!--   <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete_item"  id="<?=$listing->ID;?>">
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
   <script type="text/javascript">
   
    $('.edit_item').click(function(){ 
       $("#load_view").load("<?=base_url('/master/update/tbl_ipd_treatment/');?>" + $(this).attr('id')); 
    });
   $('.delete_item').click(function(){ 
      if(confirm("Are you sure?")){
       $.get("<?=base_url('/master/delete/tbl_ipd_treatment/');?>" + $(this).attr('id'), function(data){
        $('#' + data).closest('tr').remove();
       }); 
       } 
    });
  </script>
  <?php endif; ?>