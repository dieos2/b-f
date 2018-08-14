<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Caixa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caixa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valor_abertura')->textInput(['maxlength' => true]) ?>

    <?= $model->isNewRecord ? '': $form->field($model, 'data_fechamento')->textInput() ?>

    <?= $model->isNewRecord ? '' : $form->field($model, 'valor_fechamento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Abrir' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
