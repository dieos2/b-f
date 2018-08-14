<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Setup;
/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


   

    <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="/produtos"><i class="fa fa-gift"></i> Produtos</a></li>
                  <li><i class="fa fa-shopping-cart"></i> Detalhes</li>
              </ul>
      <section id="vbox" class="vbox">
            <header class="header bg-white b-b b-light">
              <p>Detalhes Produto</p>
            </header>
     <section class="scrollable">
              <section class="hbox stretch">
    <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <div class="clearfix m-b">
                          <a href="#" class="pull-left thumb m-r">
                            <img src="/produtos/<?php echo $model->foto ?>" class="img-circle">
                          </a>
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs"><?php echo $model->nome ?></div>
                            <small class="text-muted"><i class="fa fa-tag"></i> <?php echo $model->idCategoria->categoria ?></small>
                          </div>                
                        </div>
                        <div class="panel wrapper panel-success">
                          <div class="row">
                            <div class="col-xs-4">
                              <a href="#">
                                <span class="m-b-xs h4 block "><?php echo Setup::FormataMoeda($model->preco_custo) ?></span>
                                <small class="text-muted">Custo</small>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="#">
                                <span class="m-b-xs h4 block"><?php echo Setup::FormataMoeda($model->preco) ?></span>
                                <small class="text-muted">Venda</small>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="#">
                                <span class="m-b-xs h4 block text-success"><?php echo Setup::FormataMoeda($model->preco - $model->preco_custo) ?></span>
                                <small class="text-muted">Lucro</small>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="btn-group btn-group-justified m-b">
                          <a href="/produto/update/<?php echo $model->id ?>" class="btn btn-primary btn-rounded" data-toggle="">
                            <span class="text">
                              <i class="fa fa-pencil"></i> Editar
                            </span>
                           
                          </a>
                          <a href="#" class="btn btn-dark btn-rounded" data-toggle="modal" data-target="#myModal" >
                            <i class="fa fa-print"></i> Imprimir
                          </a>
                        </div>
                        <div>
                          <small class="text-uc text-xs text-muted">Condição</small>
                         <?php
                         if($model->novo){
                             echo '<p>Usado</p>';
                         }else{
                             echo '<p>Novo</p>';
                         }
                         ?>
                           <small class="text-uc text-xs text-muted">Vendido</small>
                         <?php
                         if($model->vendido){
                             echo '<p>Não</p>';
                         }else{
                             echo '<p>Sim</p>';
                         }
                         ?>
                          <small class="text-uc text-xs text-muted">Descrição</small>
                          <p><?php echo $model->descricao ?></p>
                            <small class="text-uc text-xs text-muted">Tamanho</small>
                          <p><?php echo $model->idTamanho->nome ?></p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">Codigo</small>
                          <p class="m-t-sm">
                           <img src="<?= Url::to(['produto/qrcode/'.$model->id.''])?>" />
                          </p>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
   

              </section>
     </section>
     </section>
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
        <div class="modal-body" style="">
          <div class="wrapper" id="divPrint" >
                      <div class="clearfix m-b" style="
    align-items: center;
">
                          <a href="#" class="" style="
    align-items: center;
    text-align: center;
">
                              <img src="/images/AtelieInvertido.png" class="" style="
   width: 40%;
    margin-left: 30%;
">
                          </a>
                          <div class="clear" style="
    text-align: center;
">
                              <div class="h3 m-t-xs m-b-xs" style="font-size: 20px"><?php echo $model->nome ?></div>
                            <small class="text-muted"><i class="fa fa-tag"></i><?php echo $model->idCategoria->categoria ?> </small>
                             <?php
                         if($model->novo){
                             echo '<small><i class="fa fa-tag"></i> Usado</small>';
                         }else{
                             echo '<small><i class="fa fa-tag"></i> Novo</small>';
                         }
                         ?>
                                             
                            <small><i class="fa fa-tag"></i> <?php echo $model->descricao ?></small>
                            <small><i class="fa fa-tag"></i>cod: <?php echo $model->id ?></small>
                           <small><i class="fa fa-tag"></i>Tam: <?php echo $model->idTamanho->nome ?></small>
                          </div>                
                        </div>
              <div class="panel wrapper panel-success" style="padding: 6px; margin-bottom: 0px;  border: solid 1px #000 !important;">
                          <div class="row">
                          
                              <div class="col-xs-12" style="text-align: center">
                              <a href="#">
                                  <span class="m-b-xs h4 block" style="font-size: 30px"><?php echo Setup::FormataMoeda($model->preco) ?></span>
                             
                              </a>
                            </div>
                      
                          </div>
                        </div>
                      
                        <div>
                          <small class="text-uc text-xs text-muted"></small>
                          <p class="m-t-sm">
                              <img style="    width: 80%;
    margin-left: 10%;" src="<?= Url::to(['produto/qrcode/'.$model->id.''])?>" />
                          </p>
                          <div class="line"></div>
                        </div>
                      </div>
      </div>
      <div class="modal-footer">
           <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" onclick="printArea()" class="btn btn-success" >Imprimir</button>
        
      </div>
    </div>
  </div>
</div>
           
   
    <script>
    jQuery(function(){
        $('#myModal').on('show.bs.modal', function (e) {
               $('#vbox').hide();  
})
  $('#myModal').on('hide.bs.modal', function (e) {
               $('#vbox').show();  
})
    });
    </script>