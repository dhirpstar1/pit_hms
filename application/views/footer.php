<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> <footer class="footer">
        <div class="container-fluid">
          
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, HMS <i class="material-icons">favorite</i> by
            <a href="https://www.pitgondia.com" target="_blank">Pratham i Technologies</a> for a better web Apps.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?=base_url('/assets/js/core/popper.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('/assets/js/core/bootstrap-material-design.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('/assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chartist JS -->
  <!--  Notifications Plugin    -->
  <script src="<?=base_url('/assets/js/plugins/bootstrap-notify.js');?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url('/assets/js/material-dashboard.min.js');?>" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?=base_url('/assets/demo/demo.js');?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

        $('.customToggleMenu').click( function() {
          var toggleWidth = $(".sidebar-wrapper, .sidebar, .sidebar-background").width() == 60 ? "260px" : "60px";
          $('.sidebar-wrapper, .sidebar, .sidebar-background').animate({ width: toggleWidth }, 100);
          $(".main-panel").toggleClass("mailExtrWdth", 100);
          $(".sidebar").toggleClass("sideBrTxtNone", 100);
        });

        $('.crossLink').click( function() {           
          $(".navbar-toggler").removeClass("toggled");    
          $("html").removeClass("nav-open");
          $(".close-layer.visible").css("opacity", "0");          
        });
    });

    
  </script>
</body>

</html>