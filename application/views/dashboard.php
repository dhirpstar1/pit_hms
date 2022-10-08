<div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12"><br><h4><?=$config_data['hospital_name']; ?></h4><h6><?=$config_data['address']; ?></h6></div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card card-stats cardextra">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">                    
                    <i class="fa fa-bed" aria-hidden="true"></i>
                  </div>
                  <p class="card-category card-category-dash">Total Bed Occupancy</p>
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
            <div class="card cardextra">
                <div class="card-header card-header-warning btnoccRprt">
                  <a href="<?=base_url('/master/occupancy_report');?>" target="_blank" class="btn btn-primary pull-right">Daily Occupancy report <i class="fa fa-print prntIcn" aria-hidden="true"></i></a>
                  <h4 class="card-title">Admit Patient</h4>
                  <p class="card-category">All Admit Patient</p>
                 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover tableSpc">
                    <thead class="text-warning">
                    <tr style="background: #0d393c; color:#fff;">
                      <th>Department</th>
                      <th class="text-center">Male</th>
                      <th class="text-center">Female</th>
                      <th class="text-center">Total</th>
                      <tr>
                    </thead>
                    <tbody>
                      
                      <?php $countmale=0;
                      $countfemale=0;
                      $counttotal=0;
                       foreach($all_ipd_patients as $item): ?>
                       <tr>
                        <td><?=$item->department;?></td>
                        <td class="textBld" style="text-align: center;"><?=$item->male_count;?></td>
                        <td class="textBld" style="text-align: center;"><?=$item->female_count;?></td>
                        <td class="textBld" style="text-align: center;"><?=$item->total_count;?></td>
                      </tr>
                      <?php $counttotal += $item->total_count;
                    $countfemale += $item->female_count;
                    $countmale += $item->male_count;
                    endforeach; ?>
                    <tr>
                      <th style="font-size:16px;">Total</th>
                      <th class="totleTxt" style="text-align: center;"><?=$countmale;?></th>
                      <th class="totleTxt" style="text-align: center;"><?=$countfemale;?></th>
                      <th class="totleTxt" style="text-align: center;"><?=$counttotal;?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div></div>
            <div class="col-lg-6 col-md-12">
              <div class="card cardextra">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Today OPD Status</h4><i class="pull-right fa fa-hospital-o" style="font-size:24px;color:orange;" aria-hidden="true"></i>
                  <p class="card-category">All OPD Patients for Current date.</p> 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover tableSpc">
                    <thead class="text-warning">
                      <tr style="background: #0d393c; color:#fff;">
                        <th>Department</th>
                        <th class="text-center">Male</th>
                        <th class="text-center">Female</th>
                        <th class="text-center">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $count=1;
                    $countmaleopd=0;
                    $countfemaleopd=0;
                    $counttotalopd=0; foreach($all_opd_patients as $item): ?>
                    <tr>
                        <td><?=$item->Department;?></td>
                        <td class="textBld" style="text-align: center;"><?=$item->male_count;?></td>
                        <td class="textBld" style="text-align: center;"><?=$item->female_count;?></td>
                        <td class="textBld" style="text-align: center;"><?=$item->total_count;?></td>
                      </tr>
                      <?php $counttotalopd += $item->total_count;
                    $countfemaleopd += $item->female_count;
                    $countmaleopd += $item->male_count;
                    endforeach; ?>
<tr>
                      <th style="font-size:16px;">Total</th>
                      <th class="totleTxt" style="text-align: center;"><?=$countmaleopd;?></th>
                      <th class="totleTxt" style="text-align: center;"><?=$countfemaleopd;?></th>
                      <th class="totleTxt" style="text-align: center;"><?=$counttotalopd;?></th>
                      </tr>                                 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>