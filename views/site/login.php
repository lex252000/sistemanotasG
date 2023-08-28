<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'UEFR LOGIN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="text-center"> <!-- Centrar el título -->
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Usuario']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña']) ?>

            <div class="form-group">
                <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
