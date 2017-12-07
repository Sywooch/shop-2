<?php
use yii\helpers\Html;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

app\assets\AppAsset::register($this);

app\assets\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<style>
		.content {overflow: auto}
		.user-image {
			width: auto!important;
			border-radius: 0!important;
			height: 30px!important;
			margin-right: 10px!important;
			margin-top: -5px!important;
		}
	</style>
	<script
			src="https://code.jquery.com/jquery-1.12.4.min.js"
			integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
			crossorigin="anonymous"></script>
</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

	<?= $this->render(
		'header.php',
		['directoryAsset' => $directoryAsset]
	) ?>

	<?= $this->render(
		'left.php',
		['directoryAsset' => $directoryAsset]
	)
	?>

	<?= $this->render(
		'content.php',
		[
			'content' => $content,
			'directoryAsset' => $directoryAsset
		]
	) ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

