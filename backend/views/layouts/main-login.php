<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
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
</head>
<body class="login-page">

<?php $this->beginBody() ?>
    <div class="jumbotron" style="padding-bottom:4px;text-align:center;padding-top:2px;background-color: #3c8dbc;">
        <?php echo Html::img('@web/image/logo.png', ['width' => 50, 'height' => 50]) ?>
        <h5><strong>Kementerian Energi dan Sumber Daya Mineral</strong></h5>
        <h5><strong>Direktorat Jenderal Energi Baru Terbarukan dan Konservasi Energi</strong></h5>
        <h2>Aplikasi Format Pantau WKP</h2>

    </div>
    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
