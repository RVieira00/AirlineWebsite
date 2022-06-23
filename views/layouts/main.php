<?php

/* @var $this \yii\web\View */
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Azores Airlines',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-expand-lg navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
            'options' => [
                    'class' => 'navbar-nav'
            ],
            'items' => [
                ['label' => 'FAQ', 'url' => ['/site/faq']
                ],
                ['label' => 'Contact', 'url' => ['/site/contact']
                ],
                ['label' => 'Admin',
                    'url' => '#',
                    'visible' => Yii::$app->user->can('admin'),
                    'items' => [
                                    [
                                        'label' => 'Gerir Users',
                                        'url' => ['/user/admin']
                                    ],
                                    [
                                        'label' => 'Gerir Trajetos',
                                        'url' => ['/trajeto']
                                    ],
                                    [
                                        'label' => 'Gerir Aviões',
                                        'url' => ['/aviao']
                                    ],
                                    [
                                        'label' => 'Gerir Reservas',
                                        'url' => ['/reserva']
                                    ],
                                    [
                                        'label' => 'Gerir Lugares',
                                        'url' => ['/lugar']
                                    ],
                                    [
                                        'label' => 'Gerir Trajeto-Reservas',
                                        'url' => ['/trajetoreserva']
                                    ],
                                    [
                                        'label' => 'Gerir Lugar-Reservas',
                                        'url' => ['/lugarreserva']
                                    ],
                                    [
                                        'label' => 'Gerir Aeroportos',
                                        'url' => ['/aeroportos']
                                    ],
                        ]
                ],
                [
                        'label' => 'Login',
                        'url' => ['/user/login'],
                        'visible' => Yii::$app->user->isGuest ],
                        [
                                'label' => 'Users',
                                'url' => '#',
                                'visible' => !Yii::$app->user->isGuest ,
                                'items' => [

                                    [
                                            'label' => 'Logout (' . Yii::$app->user->displayName . ')',
                                             'url' => ['/user/logout'],
                                             'linkOptions' => [
                                                     'data-method' => 'post'
                                             ]
                                    ],
                                    [
                                        'label' => 'Perfil e Reservas',
                                        'url' => ['/user/profile'],
                                    ],
                                ],
                        ]
            ],
        ]);
    NavBar::end();
    ?>
    <div class="alert alert-dismissible fade show" role="alert" id="msg">
        <strong></strong>
        <button type="button" class="close" id="msg_close" style="position: absolute; margin-top: 55px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php
            $errors = Yii::$app->session->getAllFlashes();
            foreach ($errors as $type => $msgs){
                if(is_array($msgs)) {
                    foreach ($msgs as $msg){
                        echo Alert::widget(
                                ['options' =>
                                    ['class' => 'alert-'. $type],'body' => $msg,]);
                    }
                }
            }
        ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p>Criado por Henrique Araujo, Hugo Brites e Ricardo Vieira</p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
