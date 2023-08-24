<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\asignaturasEducacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asignaturas-educacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_asignatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoeducacion_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
