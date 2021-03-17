      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.plj.ac.id">
                  www.plj.ac.id
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  Help
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Licenses
                </a>
              </li> -->
            </ul>
          </nav>
          <div class="copyright ml-auto">
            Made by Rafiq Mustaqim | <!-- <i class="fa fa-heart heart text-danger"></i> --> Theme by <a href="https://www.themekita.com">ThemeKita</a>
          </div>        
        </div>
      </footer>
    </div>
    

  </div>

  <!--   Core JS Files   -->
  <script src="<?php echo base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <!-- jQuery UI -->
<!--   <script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
-->  <script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Atlantis JS -->
<script src="<?php echo base_url() ?>assets/js/atlantis.min.js"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url() ?>assets/js/setting-demo2.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>

<!-- Chart JS -->
<script src="<?php echo base_url() ?>/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo base_url() ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?php echo base_url() ?>/assets/js/plugin/chart-circle/circles.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
    });
</script>


<script >
  $(document).ready(function() {
    $('#basic-datatables').DataTable({
    });




      // Add Row
      $('#add-row').DataTable({
        "pageLength": 10,
      });

      var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action
          ]);
        $('#addRowModal').modal('hide');

      });
    });
  </script>




</body>
</html>