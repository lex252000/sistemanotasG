<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\asignaturasEducacion $model */

$this->title = 'Create Asignaturas Educacion';
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas Educacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-educacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
