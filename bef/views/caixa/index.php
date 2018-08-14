<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Setup;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caixas';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="/caixa"><i class="fa fa-home"></i> Caixa</a></li>
                
              </ul>

     
                <section class="panel panel-default">
                    <header class="panel-heading" style="padding: 0px 10px 18px !important; ">
                      <span class="label bg-danger pull-right"> 
                          <a href="/caixa/create" class="btn">Abrir Caixa</a>
    </span>
                        <span>Caixa</span> 
                    </header>
                    <div class="line"></div>
                <div class="row">
         <?php foreach($dataProvider->models as $model){
echo '<div class="col-md-4">
                 <section class="panel panel-default '; if($model->data_fechamento != "0000-00-00 00:00:00" && $model->data_fechamento != Null){echo 'panel-success';}else{echo 'panel-info';};
                 echo '">
                    <header class="panel-heading font-bold">';if($model->data_fechamento != "0000-00-00 00:00:00" && $model->data_fechamento != Null){echo '<a href="/caixa/'.$model->id.'">Fechado</a>';}else{echo '<a href="/caixa/'.$model->id.'">Aberto</a>';};
                   echo '</header>
                  
                    <div class="panel-body">
                      <div>
                        <span class="text-muted">Total:</span>
                        <span class="h3 block">'.Setup::FormataMoeda($model->valor_fechamento).'</span>
                      </div>
                      <div class="line pull-in"></div>
                      <div class="row m-t-sm">
                        <div class="col-xs-4">
                          <small class="text-muted block">Abertura</small>
                          <span>'.Setup::FormataMoeda($model->valor_abertura).'</span>
                        </div>
                        <div class="col-xs-4">
                          <small class="text-muted block">Data Abertura</small>
                          <span>'.Setup::DepoisDePegar($model->data_abertura).'</span>
                        </div>
                        <div class="col-xs-4">
                          <small class="text-muted block">Encerrado</small>
                          <span>'.Setup::DepoisDePegar($model->data_fechamento).'</span>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>';
         } ?>
                </div>
                </section>
            </section>
