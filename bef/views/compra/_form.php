<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Produto;
use app\models\StatusCompra;
/* @var $this yii\web\View */
/* @var $model app\Models\Compra */
/* @var $form yii\widgets\ActiveForm */
use yii\helpers\ArrayHelper;
$listData=ArrayHelper::map(StatusCompra::find()->all(),'id','nome');
?>



        <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data','class'=>'form-horizontal form-label-left']
            ]); ?>

    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="input-group">
                          <select id="produtos" name="Compra[id_produto]" class="select2_single form-control" tabindex="-1">
                            
                              <option>Selecione um produto</option>
   <?php
                               foreach (Produto::find()->all() as $produto){
                                  
                                   echo     '<option value="'.$produto->id.'">'.$produto->nome.' </option>';
                               
                               
                                   }
                              ?>
                            
                          </select><span class="input-group-btn">
                      <a href="#" id="novoFabricante" data-toggle="modal" data-target="#modalFabricante" class="btn btn-primary" type="button">Novo!</a>
                      </span>
                        </div>
        
                      </div>

   

    <?= $form->field($model, 'qtd')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_status')->dropDownList($listData)->label(false) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
