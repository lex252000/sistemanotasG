<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\asignaturasEducacion $model */

$this->title = 'Update Asignaturas Educacion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas Educacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignaturas-educacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
