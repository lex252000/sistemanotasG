<?php

use app\models\Cargos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CargosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'CARGOS DE LA INSTITUCION';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Cargo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cargo',
            'detallecargo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cargos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idcargos' => $model->idcargos]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
