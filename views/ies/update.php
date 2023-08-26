<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ies $model */

$this->title = 'Update Ies: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
