<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?$this->load->view("shared/header", $this->_ci_cached_vars);?>

<div class="container-fluid">

	<div class="page-header animated slideInDown">
		<h1 class="text-muted discount-card-text">
			<i class="fas fa-list"></i> Субтесты
		</h1>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Индекс сортировки</th>
				<th>Время</th>
				<th>Название на русском</th>
				<th>Название на казахском</th>
				<th>Дата/время</th>
				<th>Автор</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tfoot>
	</table>

</div><!-- container-fluid -->

<script type="text/javascript">
	ONLOAD.push(function(){
		$('.table').dataTable( {
			'ajax': '<?=site_url($this->uri->segment(1)."/lst")?>'
			// ,'scrollY': '481px'
			// ,'scrollCollapse': true
			,'language': DT_LANG
			,"order": [[ 1, 'desc' ]]
			,initComplete: function(){
				$('.dataTables_length').prepend('<a class="btn btn-primary btn-sm" href="<?=site_url($this->uri->segment(1)."/add")?>"><i class="far fa-plus-square"></i> Добавить новый субтест</a>&nbsp;&nbsp;&nbsp;');
			}
			, "columns": [
					{ "data": "tb0301_id", "className": "text-center" }
					, { "data": "tb0301_order", "className": "text-center" }
					, { "data": "tb0301_timelimit", "className": "text-center" }
					, { "data": "tb0301_name_ru", "className": "text-center" }
					, { "data": "tb0301_name_kz", "className": "text-center" }
					, { "data": "tb0301_created", "className": "text-center" }
					, { "data": "tb0301_createdby", "className": "text-center" }
				]
			, "columnDefs": [
					{
						"targets": [0,1,2,3,4,5		]
						, "render": function (data, type, row) {
							if (!data) return "";
							return '<a href="<?=site_url($this->uri->segment(1)."/edit")?>/' + row.tb0301_id + '">' + data + '</a>';
						}
					}
				]
		}).on( 'draw.dt', function () {
			// if($('.dataTables_length .btn').length) return;
			// $('.dataTables_length').prepend('<a class="btn btn-primary btn-sm" href="<?=site_url($this->uri->segment(1)."/add")?>">Add a new record</a>&nbsp;&nbsp;&nbsp;')
		});
	});
</script>

<?$this->load->view("/shared/footer",$this->_ci_cached_vars)?>