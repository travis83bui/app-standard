<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    </head>
<body>
    <?php $this->beginBody() ?>
       <header>
        <?php
           NavBar::begin([
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Trang chủ 1', 'url' => ['/site/index']],
                ['label' => 'Thông tin', 'url' => ['/site/about'],
                	'items'=>[
                		['label' => 'Bảng giá thiết kế', 'url' => ['/site/about']],
                	],
                ],
                ['label' => 'Liên hệ', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Đăng ký', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Đăng nhập', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Đăng xuất (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
		</header>
        <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
