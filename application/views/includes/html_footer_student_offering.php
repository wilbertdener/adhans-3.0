</div>
	<!--   Core JS Files   -->
	<script src=<?php echo base_url('/assets/js/core/jquery.3.2.1.min.js') ?>></script>
	<script src=<?php echo base_url('/assets/js/core/popper.min.js') ?>></script>
	<script src=<?php echo base_url('/assets/js/core/bootstrap.min.js')?>></script>

	<!-- jQuery UI -->
	<script src=<?php echo base_url('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>></script>
	<script src=<?php echo base_url('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>></script>

	<!-- jQuery Scrollbar -->
	<script src=<?php echo base_url('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?> ></script>
	
	<!-- Chart JS -->
	<script src=<?php echo base_url('/assets/js/plugin/chart.js/chart.min.js')?>></script>
	
	<!-- Datatables -->
	<script src=<?php echo base_url('/assets/js/plugin/datatables/datatables.min.js')?> ></script>

	<!-- Bootstrap Notify -->
	<script src=<?php echo base_url('/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?> ></script>

	<!-- Sweet Alert -->
	<script src=<?php echo base_url('/assets/js/plugin/sweetalert/sweetalert.min.js')?> ></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>


	<!-- Atlantis JS -->
    <script src=<?php echo base_url('/assets/js/atlantis.min.js')?> ></script>

    <script>

      function changeActiveTab(active_tab, active_tab_content){
          localStorage.setItem('last_tab', active_tab);
          localStorage.setItem('last_tab_content', active_tab_content);
      }

		$(document).ready(function() {

      //Carrega a tab atual ao recarregar a página
      var last_tab = localStorage.getItem("last_tab");
      var last_tab_content = localStorage.getItem("last_tab_content");

      if(last_tab === null){
          last_tab = "v-pills-home-tab-icons";
          last_tab_content = "tabs-1";
      }else if(last_tab_content === null){
          last_tab_content = "tabs-1";
      }

      document.getElementById(last_tab).className = "nav-link active";
      document.getElementById(last_tab_content).className = "tab-pane fade active show";

    });

	</script>
</body>
</html>