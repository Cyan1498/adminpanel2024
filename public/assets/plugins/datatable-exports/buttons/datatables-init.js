// (function ($) {





// })(jQuery);

$(document).ready(function () {
		//    "use strict";


	/*  Data Table
	-------------*/

	// $('#bootstrap-data-table').DataTable();


	$('#bootstrap-data-table').DataTable({
		lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
	});



	$('#tblExports').DataTable({
		dom: 'lBfrtip',
		responsive: "true",
		lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
		buttons: [
			// 'copy', 'csv', 'excel', 'pdf', 'print'
			{
				extend: 'excelHtml5',
				text: '<i class="fas fa-file-excel"></i>',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend: 'pdfHtml5',
				text: '<i class="fas fa-file-pdf"></i>',
				titleAttr: 'Exportar a pdf',
				className: 'btn btn-danger'
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i>',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]
		
	});

	$('#row-select').DataTable({
		initComplete: function () {
			this.api().columns().every(function () {
				var column = this;
				var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});


});