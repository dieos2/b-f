<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categoria;
/* @var $this yii\web\View */
/* @var $model app\models\Tamanho */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tamanho-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

     <div class="form-group field-produto-nome required"> 
                            <select id="categorias" name="Tamanho[id_categoria]" class="btn btn-sm btn-info">
                                 <?php
                               foreach (Categoria::find()->all() as $categoria){
                                  
                                   echo     '<option value="'.$categoria->id.'">'.$categoria->categoria.' </option>';
                               
                               
                                   }
                              ?>
                            </select>
    
                        </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
