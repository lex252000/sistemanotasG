<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ies $model */

$this->title = 'Create Ies';
$this->params['breadcrumbs'][] = ['label' => 'Ies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
