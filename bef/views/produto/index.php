<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Setup;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
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
                               foreach (\app\models\Fabricante::find()->all() as $categoria){
                                   echo '<option value='.$categoria->id.'>'.$categoria->nome.'</option>';
                               }
                              ?></select>
                   <span class="input-group-btn">
                      <a href="produto/create" class="btn btn-primary" type="button">Novo!</a>
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
                    <h2>Table design <small>Custom design</small></h2>
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

                    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                   
    

   

     
           <?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">

                      <thead>
                        <tr>
                             <th></th> 
                        
                          <th>Nome</th>
                          <th>Custo</th>
                            <th>Preço</th>
                         
                          <th width="70"></th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php foreach($models as $model){
   echo' <tr><td class="">';             ?> 
                        <i class="fa fa-star text-danger"></i>
                        
                        <i class="fa fa-thumbs-down text-danger"></i><?php echo
                          '</td><td>
                            <a href="/produto/view/'.$model->id.'">'.$model->nome.'</a>
                          </td>
                           <td class="text-warning">'.Setup::FormataMoeda($model->preco_custo).'</td>
                          <td class="text-success">'.Setup::FormataMoeda($model->preco).'</td>';
                         ?>
   <?php
                         echo '<td class="text-right">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil"></i></a>
                              <ul class="dropdown-menu pull-right">
                               <li><a href="/produto/view/'.$model->id.'">Detalhes</a></li>
                                <li><a href="/produto/update/'.$model->id.'">Editar</a></li>
                                <li><a href="#">Vender</a></li>
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
                <script>
                    jQuery(function(){
                        jQuery("#categoria").val(<?php echo $idCategoria?>);
                       
                        
                       
                   
                       
                       
                         jQuery("#categoria").change(function(){
                            var idCategoria = jQuery("#categoria").val();
                            
                            filtro(idCategoria);
                        });
                    });
                    function filtro(idCategoria){
     debugger;
   
 location.href="/produto/index?idCategoria="+idCategoria

                    };
                    </script>
