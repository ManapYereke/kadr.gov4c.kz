<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/ie.css">
<![endif]-->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/fc-3.3.0/fh-3.1.6/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="/css/style.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" integrity="sha256-l3FykDBm9+58ZcJJtzcFvWjBZNJO40HmvebhpHXEhC0=" crossorigin="anonymous" />

 <script>
 	var ONLOAD=[]
 </script>

</head>
<body style="padding-top: 70px; padding-bottom: 20px">
<nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
	<a class="navbar-brand" href="/">
		<img src="https://gov4c.kz/public/img/logo.png" alt="logo.png" height="40" style="margin-top: -15px;"> 
		<span class="navbar-text" style="font-size: 12px; padding: 0px">НАО «Государственная корпорация»<br>«Правительство для граждан»</span>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
<?if(@$tb0101->tb0101_tb0003_id==1){?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Справочники
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?=site_url("user/lst")?>">Пользователи</a>
					<? /*<a class="dropdown-item" href="<?=site_url("edutype/lst")?>">Виды обучения</a> */ ?>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?=site_url("subtest/lst")?>">Субтесты</a>
					<a class="dropdown-item" href="<?=site_url("question/lst")?>">Вопросы</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=site_url("test/dlJSON")?>">Выгрузить данные JSON</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=site_url("test/dlDefault")?>">Выгрузить данные Default</a>
			</li>
<?}?>
		</ul>
	</div>
<?if(!@$tb0101->tb0101_id){?>
	<form class="form-inline" style="display: none" id="authForm">
		<!-- <a class="pr-2" href="<?=site_url("user/registration")?>">Регистрация</a>
		<a class="pr-2" href="<?=site_url("user/recovery")?>">Забыли пароль?</a> -->
		<input type="text" class="form-control mr-sm-2" data-mask="000 000 000 000" id="tb0101_idn" name="tb0101_idn" placeholder="ИИН">
		<input type="password" class="form-control mr-sm-2" id="tb0101_passwd" name="tb0101_passwd" placeholder="Пароль">
		<button type="button" onclick="doLogin()" class="btn btn-outline-success my-2 my-sm-0">войти</button>
	</form>
<?}else{?>
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?=$tb0101->tb0101_name2?> <?=$tb0101->tb0101_name1?>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="<?=site_url("user/passwd")?>">Сменить пароль</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?=site_url("user/logout")?>">Выход</a>
			</div>
		</li>
	</ul>
<?}?>
</nav>

<script>
	function doLogin(){
		var idn=$("#tb0101_idn").unmask().val();
		var passwd=$("#tb0101_passwd").val();

		sendAsPost({
			url: "<?=site_url("user/login")?>"
			, data: {tb0101_idn: idn, tb0101_passwd:passwd}
			, formData: ""
			, title: "Авторизация"
			, callbackOk: function(){location.href="<?=site_url("main/home")?>"}
		});

		$("#tb0101_idn").mask("000 000 000 000")
	}
</script>
<div class="container-fluid">
