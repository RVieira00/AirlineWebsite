<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
use app\models\Voos;

$this->title = 'Voos';
$this->params['breadcrumbs'][] = $this->title;

$destino = Yii::$app->request->get('destino');
$origem = Yii::$app->request->get('origem');


?>



<div class="container">
    <?php Pjax::begin(); ?>
    <section id="flight-list-header">
        <h1><?php echo $origem ?></h1> <span>para</span> <h1><?php echo $destino ?></h1>
    </section>
    <hr>



        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_voos',
            'itemOptions' => ['class' => 'row flight-list-body'],
            'layout' => '{summary}<br><br><div class="text-center flight-list-item">{items}</div>{pager}',

        ]);
        ?>

    <?php Pjax::end(); ?>
</div>
