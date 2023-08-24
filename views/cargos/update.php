<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cargos $model */

$this->title = 'Update Cargos: ' . $model->idcargos;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcargos, 'url' => ['view', 'idcargos' => $model->idcargos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cargos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
