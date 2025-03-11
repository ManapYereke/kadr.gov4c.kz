<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?$this->load->view("shared/header", $this->_ci_cached_vars);?>


<div class="container">
	<div class="alert alert-success">Тест завершен.</div>

	<h1 class="display-4">Результат</h1>
	<hr>

	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Тест</th>
						<th>Балл</th>
					</tr>
				</thead>
				<tbody>
<?
$sum=0;
foreach($result as $r){
	$sum+=$r->v;
?>
					<tr>
						<td><?=$r->tb0301_name_ru?></td>
						<td><?=$r->v?></td>
					</tr>
<?}?>
				</tbody>
				<tfoot>
					<tr>
						<th>ИТОГО</th>
						<th><?=$sum?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
	
<?$this->load->view("shared/footer", $this->_ci_cached_vars);?>
