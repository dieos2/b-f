<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Fabricante;
use app\models\Tamanho
?>

          
           
                         <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data','class'=>'form-horizontal form-label-left']
            ]); ?>


   <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="input-group">
                          <select id="categorias" name="Produto[id_fabricante]" class="select2_single form-control" tabindex="-1">
                            
                              <option>Selecione um fabricante</option>
   <?php
                               foreach (Fabricante::find()->all() as $produto){
                                  
                                   echo     '<option value="'.$produto->id.'">'.$produto->nome.' </option>';
                               
                               
                                   }
                              ?>
                            
                          </select><span class="input-group-btn">
                      <a href="#" id="novoFabricante" data-toggle="modal" data-target="#modalFabricante" class="btn btn-primary" type="button">Novo!</a>
                      </span>
                        </div>
        
                      </div>
                       
                         
   <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
   </div>
    
    
                       
                       
                  
   
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <?= $form->field($model, 'preco_custo')->textInput(['maxlength' => true, 'class'=> 'form-control']) ?>
  </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <?= $form->field($model, 'preco')->textInput(['maxlength' => true, 'class'=> 'form-control']) ?>
        </div>
                    
             <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <?= $form->field($model, 'qtd')->textInput(['maxlength' => true, 'class'=> 'form-control']) ?>
        </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <?= $form->field($model, 'preco_distribuidor')->textInput(['maxlength' => true, 'class'=> 'form-control']) ?>
        </div>
         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <?= $form->field($model, 'NCM')->textInput(['maxlength' => true, 'class'=> 'form-control']) ?>
        </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <?= $form->field($model, 'lucro')->textInput(['maxlength' => true, 'class'=> 'form-control']) ?>
        </div>

    
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   
    <?php ActiveForm::end(); ?>
                   
                   
          



   


         