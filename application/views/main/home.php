<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?$this->load->view("shared/header", $this->_ci_cached_vars);?>


<div class="container">
	<div class="step step0">
		<h1>Тестирование по способностям работы с текстовой и числовой информацией</h1>
		
		<div class="alert alert-warning">Уважаемый претендент (кандидат)! Просим заполнить следующие поля.</div>
<?
$fields=[
	[
		"id"=>"tb0101_idn"
		,"type"=>"string"
		,"title"=>"ИИН"
		,"class"=>"form-control"
		,"mask"=>"000 000 000 000"
		,"desc"=>"ИИН (вместо ФИО)"
		,"required"=>true
	]
	,[
		"id"=>"tb0101_phone1"
		,"type"=>"string"
		,"title"=>"Телефон"
		,"class"=>"form-control"
		,"mask"=>"+7 (000) 000-0000"
		,"desc"=>"Номер сотового телефона"
		,"required"=>true
	]
	,[
		"id"=>"tb0101_name1"
		,"type"=>"string"
		,"title"=>"Фамилия"
		,"class"=>"form-control"
		// ,"mask"=>"+7 (000) 000-0000"
		// ,"desc"=>"Номер сотового телефона"
		,"required"=>true
	]
	,[
		"id"=>"tb0101_name2"
		,"type"=>"string"
		,"title"=>"Имя"
		,"class"=>"form-control"
		// ,"mask"=>"+7 (000) 000-0000"
		// ,"desc"=>"Номер сотового телефона"
		,"required"=>true
	]
	,[
		"id"=>"tb0101_name3"
		,"type"=>"string"
		,"title"=>"Отчество"
		,"class"=>"form-control"
		// ,"mask"=>"+7 (000) 000-0000"
		// ,"desc"=>"Номер сотового телефона"
		// ,"required"=>true
	]
	// ,[
	// 	"id"=>"tb0101_code"
	// 	,"type"=>"string"
	// 	,"title"=>"Код участника"
	// 	,"class"=>"form-control"
	// 	,"mask"=>"00000"
	// 	,"desc"=>"Ввести присвоенный индивидуальный код (из 5 цифр)Ввести присвоенный индивидуальный код (из 5 цифр)"
	// 	,"required"=>true
	// ]
	,[
		"id"=>"tb0101_tb0002_id"
		,"type"=>"dropdown"
		,"title"=>"Язык"
		,"sql"=>"SELECT * FROM tb0002_langs"
		,"class"=>"selectpicker w-100"
		,"fieldId"=>"tb0002_id"
		,"fieldText"=>"tb0002_name_ru"
		,"desc"=>""
		,"required"=>true
	]
	// ,[
	// 	"id"=>"tb0101_tb0201_id"
	// 	,"type"=>"dropdown"
	// 	,"title"=>"Вид обучения	"
	// 	,"sql"=>"SELECT * FROM tb0201_eduTypes"
	// 	,"class"=>"selectpicker w-100"
	// 	,"fieldId"=>"tb0201_id"
	// 	,"fieldText"=>"tb0201_name_ru"
	// 	,"desc"=>""
	// 	,"required"=>true
	// ]
];
echo $this->html->formGroups($fields);
?>

		<div class="text-center">
			<button type="button" onclick="testGo(this)" class="btn btn-primary btn-lg">Далее</button>
		</div>
	</div>
</div>

<script>
	function testGo(o)
	{
		var d={
			tb0101_idn:$(o).parents(".step").find("#tb0101_idn").unmask().val()
			,tb0101_name1:$(o).parents(".step").find("#tb0101_name1").val()
			,tb0101_name2:$(o).parents(".step").find("#tb0101_name2").val()
			,tb0101_name3:$(o).parents(".step").find("#tb0101_name3").val()
			,tb0101_phone1:$(o).parents(".step").find("#tb0101_phone1").unmask().val()
			,tb0101_tb0002_id:$(o).parents(".step").find("#tb0101_tb0002_id").val()
			// ,tb0101_tb0201_id:$(o).parents(".step").find("#tb0101_tb0201_id").val()
		}

		$(o).parents(".step").find("#tb0101_idn").mask("000 000 000 000")
		$(o).parents(".step").find("#tb0101_phone1").mask("+7 (000) 000-0000")

		if(!d.tb0101_idn)
		{
			Swal.fire({icon:'error',title:"Ошибка",text:"Укажите свой ИИН."});
			return;
		}

		if(!d.tb0101_name1||!d.tb0101_name2)
		{
			Swal.fire({icon:'error',title:"Ошибка",text:"Укажите ФИО."});
			return;
		}

		if(!d.tb0101_phone1)
		{
			Swal.fire({icon:'error',title:"Ошибка",text:"Укажите свой номер сотового телефона."});
			return;
		}

		if(!d.tb0101_tb0002_id)
		{
			Swal.fire({icon:'error',title:"Ошибка",text:"Выберите язык."});
			return;
		}

		// if(!d.tb0101_tb0201_id)
		// {
		// 	Swal.fire({icon:'error',title:"Ошибка",text:"Выберите вид обучения."});
		// 	return;
		// }

		sendAsPost({
			url: "<?=site_url("test/start")?>"
			, data: d
			, title: "Начало теста"
		});

		$("#tb0101_idn").mask("000 000 000 000");
	}
</script>
<?$this->load->view("shared/footer", $this->_ci_cached_vars);?>
