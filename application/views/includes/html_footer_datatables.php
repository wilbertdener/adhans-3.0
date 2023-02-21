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

	<!-- Atlantis JS -->
    <script src=<?php echo base_url('/assets/js/atlantis.min.js')?> ></script>

	<!-- Bootstrap V5.2.0 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <script>
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
                "columnDefs": [ {
                    "targets": 0,
                    "data": "download_link",
                    "render": function ( data, type, row, meta ) {
                    return '<a href="'+data+'">Download</a>';
                    }
                } ]
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#classes-list').DataTable({
				"pageLength": 5,
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


    function saveAndAddClearButton(header, rows) {
        window.localStorage.header = JSON.stringify(header);
        window.localStorage.rows = JSON.stringify(rows);
        window.localStorage.date = (new Date()).toString();

        var $clear = $('<button class="btn btn-sm btn-outline-danger clear">Apagar</button>');
        $('p.message').append($clear);
        $clear.click(function(e) {
            delete window.localStorage.header;
            delete window.localStorage.rows;
            delete window.localStorage.date;
            var $tbody = $('#some-table tbody').empty();
            $('p.message').html('0 linhas na tabela. ');
        });
    }

  function buildTable(header, rows) {
    //var $table = $('#some-table').empty();
    var $thead = $('#some-table thead').empty();
    var $tbody = $('#some-table tbody').empty();

    var $tr2 = $('<th></th>').appendTo($thead);
    $tr2.append('Matrícula');
    var $tr3 = $('<th></th>').appendTo($thead);
    $tr3.append('Conceito');

    var $tr = $('<tr></tr>').appendTo($tbody);
    header.forEach(function(value) {
      $tr.append('<td>' + value + '</td>');
    });

    rows.forEach(function(row) {
      var $tr = $('<tr></tr>').appendTo($tbody);
      row.forEach(function(value) {
        $tr.append('<td>' + value + '</td>');
      });
    });
    $('p.message').html((rows.length+1) + ' linhas na tabela. ');
    saveAndAddClearButton(header, rows);
  }

  // Attempt to restore from local storage
  try {
    var header = JSON.parse(window.localStorage.header);
    var rows = JSON.parse(window.localStorage.rows);
    buildTable(header, rows);
    $('p.message').append('<br/><em>' + window.localStorage.date + '</em>');
  } catch (err) {};

		$("[data-tt=tooltip]").tooltip();


		/*$("div[id^='myModal']").each(function(){
  
			var currentModal = $(this);
			
			//click next
			currentModal.find('.btn-next').click(function(){
				currentModal.modal('hide');
				currentModal.closest("div[id^='myModal']").nextAll("div[id^='myModal']").first().modal('show'); 
			});
			
			//click prev
			currentModal.find('.btn-prev').click(function(){
				currentModal.modal('hide');
				currentModal.closest("div[id^='myModal']").prevAll("div[id^='myModal']").first().modal('show'); 
			});

		});*/
	</script>
    <script>
        $('#modalEvent').on('show.bs.modal', function(e) {
            var cat = $(e.relatedTarget).data('cat');
            // $(e.currentTarget).find('input[name="category"]').val(cat);
            document.getElementById('category').value = cat;
        });

		function addNewClass () {
			// Pegar dados das disciplinas
			var disc_Nome = document.getElementById('disc_Nome').value;
			var disc_Codigo = document.getElementById('disc_Codigo').value;
			var disc_CH = document.getElementById('disc_CH').value;
			var disc_CA = document.getElementById('disc_CA').value;
			var disc_CT = document.getElementById('disc_CT').value;
			var disc_ProgResumido = document.getElementById('disc_ProgResumido').value;
			var disc_ProgCompleto = document.getElementById('disc_ProgCompleto').value;
			var disc_Bibliografia = document.getElementById('disc_Bibliografia').value;

			//console.log(disc_Nome);	

			if (disc_Nome == "" || disc_Codigo == "" || disc_CH == "" || disc_CA == "" || disc_CT == "" || disc_ProgResumido == "" || disc_ProgCompleto == "" ||  disc_Bibliografia == "") {
				swal("Atenção!", "Por favor, preencha os campos obrigatórios!", {
                icon : "info",
                buttons: {                    
                    confirm: {
                    className : 'btn btn-info'
                    }
                },
                });
			} else {
				$.ajaxSetup({async:false});
				$.post("<?php echo site_url('classes/addNewClass/');?>", {disc_Nome:disc_Nome,disc_Codigo:disc_Codigo,disc_CH:disc_CH,disc_CA:disc_CA,disc_CT:disc_CT,disc_ProgResumido:disc_ProgResumido,disc_ProgCompleto:disc_ProgCompleto,disc_Bibliografia:disc_Bibliografia},
					function(data, status) {
						if (status) {
							swal({
								title: 'Tudo certo!',
								text: 'Disciplina adicionada com sucesso.',
								icon: 'success',
								buttons : {
									confirm: {
									className : 'btn btn-success'
									}
								}
							}).then(function(){ 
								// console.log(data);
								location.reload();
							});
						} else {
							swal({
								title: 'Não permitido!',
								text: 'Erro desconhecido. Entre em contato com o administrador do sistema.',
								icon: 'error',
								buttons : {
									confirm: {
									className : 'btn btn-danger'
									}
								}
							}).then(function(){
								swal.close();
								location.reload();
							});// fecha o swal
						} //fecha o else
					}// fecha a função callback
				);
			}

			
		}
    </script>
	
</body>
</html>