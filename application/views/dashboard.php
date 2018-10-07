<div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-12"><br><h4><?=$config_data['hospital_name']; ?></h4><h6><?=$config_data['address']; ?></h6></div>
            <div class="col-lg-3 col-md-4 col-sm-12">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Total Bed Occupancy</p>
                  <h3 class="card-title"><?=$all_beds->unvailable;?>/<?=$all_beds->total_count;?>
                    <small>Beds</small>
                  </h3>
                </div>
                <div class="card-footer">
                  
                </div>
              </div>
            </div>
          </div>
      
          <div class="row">
            <div class="col-lg-6 col-md-12">
              
            <div class="card">
                <div class="card-header card-header-warning">
                <a href="<?=base_url('/master/occupancy_report');?>" target="_blank" class="btn btn-primary pull-right">Daily Occupancy report</a>
                  <h4 class="card-title">Admit Patient</h4>
                  <p class="card-category">All Admit Patient</p>
                 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                    <tr>
                      <th>Department</th>
                      <th>Male</th>
                      <th>Female</th>
                      <th>Total</th>
                      <tr>
                    </thead>
                    <tbody>
                      
                      <?php $countmale=0;
                      $countfemale=0;
                      $counttotal=0;
                       foreach($all_ipd_patients as $item): ?>
                       <tr>
                        <td><?=$item->department;?></td>
                        <td><?=$item->male_count;?></td>
                        <td><?=$item->female_count;?></td>
                        <td><?=$item->total_count;?></td>
                      </tr>
                      <?php $counttotal += $item->total_count;
                    $countfemale += $item->female_count;
                    $countmale += $item->male_count;
                    endforeach; ?>
<tr>
                      <th>Total</th>
                      <th><?=$countmale;?></th>
                      <th><?=$countfemale;?></th>
                      <th><?=$counttotal;?></th>
                      <tr>

                    </tbody>
                  </table>
                </div>
              </div></div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Today OPD Status</h4>
                  <p class="card-category">All OPD Patients for Current date.</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>Department</th>
                      <th>Male</th>
                      <th>Female</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                    <?php $count=1;
                    $countmaleopd=0;
                    $countfemaleopd=0;
                    $counttotalopd=0; foreach($all_opd_patients as $item): ?>
                    <tr>
                        <td><?=$item->Department;?></td>
                        <td><?=$item->male_count;?></td>
                        <td><?=$item->female_count;?></td>
                        <td><?=$item->total_count;?></td>
                      </tr>
                      <?php $counttotalopd += $item->total_count;
                    $countfemaleopd += $item->female_count;
                    $countmaleopd += $item->male_count;
                    endforeach; ?>
<tr>
                      <th>Total</th>
                      <th><?=$countmaleopd;?></th>
                      <th><?=$countfemaleopd;?></th>
                      <th><?=$counttotalopd;?></th>
                      <tr>

                                 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>