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
  <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="/produtos"><i class="fa fa-home"></i> Produtos</a></li>
              </ul>
            
 <div class="m-b-sm"> 
     <div class="btn-group" data-toggle="buttons">
         
            
             <select id="categoria" class="btn btn-sm btn-info">
                 <option value="0">Filtrar</option>
                              <?php
                               foreach (\app\models\Categoria::find()->all() as $categoria){
                                   echo '<option value='.$categoria->id.'>'.$categoria->categoria.'</option>';
                               }
                              ?></select>
             
                           
             <label class="btn btn-sm btn-success novo <?php if($novo == 'true')echo 'active';?>"> 
                 <input type="checkbox" name="novo" id="novo" class="filtro" ><i class="fa fa-check text-active"></i> Novo </label> 
             <label class="btn btn-sm btn-primary vendido <?php if($vendido == 'true')echo 'active';?>">
                 <input type="checkbox" name="vendido" id="vendido"  class="filtro"><i class="fa fa-check text-active"></i> Vendido</label> 
     </div> 
 </div>
    

   

      <section class="panel panel-default">
                    <header class="panel-heading">
                     <span class="label  pull-right"> 
                            <a class="btn btn-success" style="display: initial  !important; " href="/produto/create">Novo Produto</a>
    </span>
                      Produtos
                    </header>
           <?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>
                    <table class="table table-striped m-b-none">
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
         <?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>
                  </section>
                <script>
                    jQuery(function(){
                        jQuery("#categoria").val(<?php echo $idCategoria?>);
                       
                        <?php if($novo == "true"){
                                              echo'jQuery("#novo").attr("checked","checked");';
                     };
?>
                        <?php if($vendido == "true"){
                            
                         echo    'jQuery("#vendido").attr("checked","checked");';
                        }
?>
                       
                   
                       
                        jQuery(".novo").click(function(){
                            debugger;
                            
                            var idCategoria = jQuery("#categoria").val();
                            if("<?php echo $vendido?>" == "true"){
                                var vendido ="true";
                            }else if(jQuery("#vendido:checked").length > 0){
                                var vendido ="true"
                            };
                              if("<?php echo $novo?>" == "true"){
                                  var novo ="false";}
                              else if(jQuery("#novo:checked").length < 1){
                                  var novo ="true";};
                            filtro(idCategoria, vendido, novo);
                        });
                           jQuery(".vendido").click(function(){
                            var idCategoria = jQuery("#categoria").val();
                              if("<?php echo $vendido?>" == "false"){ var vendido ="true";}else if(jQuery("#vendido:checked").length < 1){var vendido ="true";}
                              if("<?php echo $novo?>" == "true"){ var novo ="true";}else if(jQuery("#novo:checked").length > 0){var novo ="true";};
                           
                            filtro(idCategoria, vendido, novo);
                        });
                         jQuery("#categoria").change(function(){
                            var idCategoria = jQuery("#categoria").val();
                            if("<?php echo $vendido?>" == "true"){
                                var vendido ="true";
                            }else if(jQuery("#vendido:checked").length > 0){
                                var vendido ="true"
                            };
                              if("<?php echo $novo?>" == "true"){
                                  var novo ="true";}
                              else if(jQuery("#novo:checked").length < 1){
                                  var novo ="true";};
                            filtro(idCategoria, vendido, novo);
                        });
                    })
                    function filtro(idCategoria, vendido, novo){
     debugger;
   
 location.href="/produto/index?idCategoria="+idCategoria+"&vendido="+vendido+"&novo="+novo+""

                    };
                    </script>
