<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<head>

	<title><?= Html::encode($this->title) ?></title>

	<link rel="shortcut icon" href="favicon.ico" />
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<header>
		<div class="top-menu">
			<div class="container">
				<a class="hide-menu visible-xs" id="hm" href="#"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></a>
				<a class="hide-menu hidden-xs visible-xs" id="hc" href="#"><i class="fa fa-close fa-3x" aria-hidden="true"></i></a>
				<a class="hidden-xs" href="#"><img class="logo" src="/img/logo.png" alt="Выборг Палас"></a>
				<nav id="nn" class="hidden-xs">
					<ul><a href="/site/index"><li>Главная</li></a>
						<a href="/site/viewer"><li>Зрителям</li></a>
						<a href="#"><li>Кинотеатр</li></a>
						<a href="#"><li>Сеансы</li></a>
						<a href="#"><li>Контакты</li></a>
					</ul>
				</nav>
				<form id="search" class="visible-lg">
					<input placeholder="Поиск..." class="input-search" type="text">
					<button type="submit" id="btn-send"></button>
					<a href="#" class="s-login"><img alt="Авторизация" src="/img/user.png"></a>
				</form>
			</div>
		</div>
		<div class="container regb">
			<div class="autorization">
				<h3>ВОЙТИ НА САЙТ</h3>
				<form id="autoriz" action="POST">
					<div class="login">
						<input placeholder="Логин" class="input-login" type="text"><i class="fa fa-user btn-login"></i>
					</div>
					<div class="password">
						<input placeholder="Пароль" class="input-login" type="text"><i class="fa fa-lock btn-login"></i>
					</div>
					<div class="chk">
						<input type="checkbox" name="rem" value="remined"><a class="check_text" href="#">Запомнить меня</a>
						<a href="#">забыли пароль</a><span> / </span><a id="reg" href="#">регистрация</a>
					</div>
					<button class="logbtn">ВОЙТИ</button>
				</form>
			</div>
			<div class="registration">
				<a class="back" href="#"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></i></a>
				<a class="close" href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
				<h3>РЕГИСТРАЦИЯ НА САЙТЕ</h3>
				<form action="POST">
					<div class="login">
						<input placeholder="Логин" class="input-login" type="text"><i class="fa fa-user btn-login" aria-hidden="true"></i>
					</div>
					<div class="email">
						<input placeholder="Email" class="input-login" type="text"><i class="fa fa-envelope btn-login" aria-hidden="true"></i>
					</div>
					<div class="password">
						<input placeholder="Пароль" class="input-login" type="text"><i class="fa fa-lock btn-login" aria-hidden="true"></i>
					</div>
					<div class="password">
						<input placeholder="Подтвердите пароль" class="input-login" type="text"><i class="fa fa-lock btn-login" aria-hidden="true"></i>
					</div>
					<button class="logbtn">ОТПРАВИТЬ</button>
				</form>
			</div>
		</div>
		<div style="clear:both;"></div>
	</header>

	<?= $content ?>

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<h3>О НАШЕМ КИНОТЕАТРЕ</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id nisi non elit consectetur facilisis in a erat. Fusce feugiat iaculis scelerisque. Sed eu interdum elit. Vivamus vel purus lectus. Pellentesque gravida, ex quis placerat tristique, nisi sapien accumsan libero, aliquam sagittis lorem sapien a metus. Morbi pellentesque risus erat, eget varius sem porttitor id. Quisque efficitur ullamcorper lacus, ac tempor diam viverra non. Nunc egestas ut erat nec convallis. Praesent sed erat in mauris volutpat suscipit. </p>
				</div>
				<div class="col-md-2">
					<h3>ДЕРЖИТЕ С НАМИ СВЯЗЬ</h3>
					<ul class="sc">
						<a href="#"><li class="s-vk"><img src="/img/vk1.png">Следите за нами в ВК</li></a>
						<a href="#"><li class="s-o"><img src="/img/o.png">в одноклассниках</li></a>
						<a href="#"><li class="s-ins"><img src="/img/Ins.png">в инстаграмме</li></a>
					</ul>
				</div>
				<div class="col-md-5">
					<h3>КОНТАКТНАЯ ИНФОРМАЦИЯ</h3>
					<p>Обращаем ваше внимание на то, что данный интернет-сайт носит исключительно информативный характер и ни при каких условиях не является публичной офертой,определяемой положениями Статьи 437 ГК РФ.</p>
				</div>
			</div>
		</div>
		<div class="copy">
			<p> © 2010-2016. Выборг Палас. Все права защищены. Полное или частичное копирование материалов запрещено.</p>
		</div>
	</div>

	<div style="display:none">
		<div id="trailer1">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/URYjaHaC7OM" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
	<div style="display:none">
		<div id="trailer2">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/sRZPWZU8rDw" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
	<div style="display:none">
		<div id="trailer3">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/sRZPWZU8rDw" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>