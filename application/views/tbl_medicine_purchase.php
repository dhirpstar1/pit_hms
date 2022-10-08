<script src="<?=base_url('/assets/js/typeahead.bundle.js');?>"></script>

<div class="col-md-12">
              <div class="card">
                <div class="col-md-12">
                       <div class="card-header card-header-primary">
                  <h4 class="card-title ">Medicine</h4>
                  <p class="card-category"> Add / Edit </p>
                </div>
                <br>
                <form action="<?=base_url('/master/update');?>" method="post" id="save_data">
                  <input type="hidden" name="ID" value="<?=$data->ID;?>">
                  <input type="hidden" name="tbl" value="<?=$tbl;?>">
                    <div class="row">
                       
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medicine Name</label><br>
                          <input type="text" class="form-control typeahead" name="name" value="<?=$data->name;?>" required="required">
                        </div>
                      </div>
                    
					 
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medicine Price</label>
                          <input type="text" class="form-control" name="price" value="<?=$data->price;?>" required="required">
                        </div>
                      </div>
                    
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medicine Quantity</label>
                          <input type="text" class="form-control" name="quantity" value="<?=$data->quantity;?>" required="required">
                        </div>
                      </div>
                     </div>
                                       
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                     </form>
 </div>           
</div>
</div>



<script type="text/javascript">
$( document ).ready(function() {
$('input.typeahead').typeahead({ alert();
source: function (query, process) {
return $.get('<?=base_url('/master/get_medicines');?>', { query: query }, function (data) {
data = $.parseJSON(data);
return process(data);
});
},
showHintOnFocus:'all'
});
});


</script>

