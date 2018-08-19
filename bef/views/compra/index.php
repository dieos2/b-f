<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Setup;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
           
             
                           
    
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-left top_search">
                  <div class="input-group">
                   <select id="categoria" class="form-control">
                 <option value="0">Filtrar</option>
                              <?php
                               foreach (\app\models\Produto::find()->all() as $produto){
                                   echo '<option value='.$produto->id.'>'.$produto->nome.'</option>';
                               }
                              ?></select>
                   <span class="input-group-btn">
                      <a href="/compra/create" class="btn btn-primary" type="button">Novo!</a>
                      </span>
                </div> 
               </div> 
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produtos <small>Lista</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                  

                   
    

   

     
           <?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>
                    <div id="tabelaProdutos" class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">

                      <thead>
                        <tr>
                            
                          <th>Produto</th>
                          <th>Qtd</th>
                          <th>Valor</th>
                          
                         
                          <th width="70">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php foreach($models as $model){
   echo' <tr>';             ?> 
                      <?php echo
                          '<td>
                            <a href="/compra/view/'.$model->id.'">'.$model->produto->nome.'</a>
                          </td>
                          <td>'.$model->qtd.'</td>
                           <td class="text-warning">'.Setup::FormataMoeda($model->valor).'</td>'
                         
                         ?>
   <?php
                         echo '<td class="text-right">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil"></i></a>
                              <ul class="dropdown-menu pull-right">
                               <li><a href="/produto/'.$model->id.'">Detalhes</a></li>
                                <li><a href="/produto/update/'.$model->id.'">Editar</a></li>
                                
                                <li><a href="#">Deletar</a></li>
                            
                              </ul>
                            </div>
                          </td>
                        </tr>';
   }
   ?>
                       
                      
                      </tbody>
                    </table>
                    </div>
         <?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>
                  </div>
                </div> </div>
                </div> </div>
                </div>
