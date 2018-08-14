<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categoria;
use app\models\Tamanho
?>

          
            <section class="scrollable padder">
    <div class="m-b-md">
              
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Cadastro</header>
                    <div class="panel-body">
                         <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
    <?= $form->field($model, 'foto')->fileInput() ?>
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
                        <div class="form-group field-produto-nome required"> 
                            <select id="categorias" name="Produto[id_categoria]" class="btn btn-sm btn-info">
                              <option>Selecione uma categoria</option>
   <?php
                               foreach (Categoria::find()->all() as $categoria){
                                  
                                   echo     '<option value="'.$categoria->id.'">'.$categoria->categoria.' </option>';
                               
                               
                                   }
                              ?>
                            </select>
    
                        </div>
                        <div class="form-group field-produto-nome required"> 
                            <select id="tamanhos" name="Produto[id_tamanho]" class="btn btn-sm btn-info">
                                <option>Selecione um tamanho</option>
                            </select>
    
                        </div>
                  
    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco_custo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>
                        
                    
                        <div class="form-group">
                      <label class="col-sm-2 control-label">Novo</label>
                      <div class="col-sm-10">
                        <label class="switch">
                            <?php if($model->novo){
                                 echo'<input type="checkbox" id="produto-novo" checked="checked" name="Produto[novo]" >';
                            }else
                            {
                             echo '<input type="checkbox" id="produto-novo" checked="" name="Produto[novo]" >';
                            }
?>
                           
                          <span></span>
                        </label>
                      </div>
                    </div>
  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
                   
                    </div>
                  </section>
                </div>
              </div>
    </section>
          
<script>
jQuery(function(){
    jQuery("#categorias").val(<?php echo $model->id_categoria ?>)
    jQuery("#tamanhos").hide();
    jQuery("#categorias").change(function(){
         debugger;
        $.get( "/tamanho/tamanhoporcategoria/"+$(this).val()).done(function( data )  {
  var resultado;
 debugger;
        for(var i=0; data.length > i; i++){
  resultado = resultado + "<option value='"+data[i].id+"'>"+data[i].nome+"</option>"
        }
        $("#tamanhos").html(resultado);
 
});
        jQuery("#tamanhos").show();
        
    });
    
});</script>


   


         