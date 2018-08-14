<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Produto;
use app\models\Setup;
/* @var $this yii\web\View */
/* @var $model app\models\venda */
use yii\widgets\ActiveForm;

?>
<style>
    video{
        width: 100%
    };
    #qr-canvas{
        display: none;
    }
    #outdiv
{
    background-color: #000;
    width:100%;
    height: 200px;
	border: solid;
	
}
</style>
  <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="/caixa"><i class="fa fa-home"></i> Caixa</a></li>
                  <li class="active"><a href="/caixa/<?php echo $model->id_caixa?>"><i class="fa fa-list-alt"></i> Vendas</a></li>
                    <li class="active"><a href="#"><i class="fa fa-tags"></i> produtos</a></li>
              </ul>
                 <div class="row">
                <div class="col-md-12">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Produtos  <span class="label  pull-right"> 
</header>
                       <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                             <div class="input-group">
                           <div class="col-sm-2">
                            <a href="#" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#myModal" >Escanear</a>
                        </div>
                        
                        <div class="col-sm-10">
                          <div class="m-b">
                            <select id="select2"  style="width:260px">
                                <option value="">Escolha um Produto</option>
                                 <?php
                               foreach (Produto::find()
                ->joinWith('vendaProdutos')
                ->where(['venda_produto.id_produto' => null])
                ->all() as $produto){
                                  echo '<option value="'.$produto->id.'">'.$produto->nome. '-'.$produto->descricao.'-'.Setup::FormataMoeda($produto->preco). '</option>'; 
                               }
                               ?>
                              
                            </select>
                            
                          </div>
                       
                        </div>
                       
                    </div>  
                             
                            </div>
                        </div>
                               <div class="row">
                             <div class="col-md-12">
                                     <div class="line"></div>
              <table class="table">
                <thead>
                  <tr>
                      <th width="60"></th>
                    
                    <th>DESCRIÇÂO</th>
                    <th width="140">UNI PREÇO</th>
                    <th width="90">TOTAL</th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($model->produtos as $produto){
                        echo '<tr>
                             <td><a href="#" class="text-danger removeProduto" data-id="'.$produto->id.'">x</a></td>
                    
                    <td>'.$produto->nome.'</td>
                    <td>'.Setup::FormataMoeda($produto->preco).'</td>
                    <td>'.Setup::FormataMoeda($produto->preco).'</td>
                       
                  </tr>';
                    }
?>
                  <tr>
                      <td colspan="3"></td>
                      <td class="text-danger"><?php echo Setup::FormataMoeda($model->totalVenda) ?></td>
                  </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td> <a href="#" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#fechamentoModal" >Fechar Venda</a></td>
                    </tr>
                </tfoot>
              </table>
                             </div>
                        </div>
                     
                  </section>
                </div>
            </section>
        </section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
        <div class="modal-body" style="height: 400px;">
            <div id="mainbody">
                <div id="conteudoqrcode">

           <div id="outdiv"></div>
               
            </div>   <div id="result"></div>
            </div>
                    
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="fechamentoModal" tabindex="-1" role="dialog" aria-labelledby="fechamentoModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1>Escolha a forma de pagamento</h1>
      </div>
        <div class="modal-body" style="height: 400px;">
          
                
<div class="col-sm-12">
                            <!-- radio -->
                            <?php  foreach (app\models\TipoVenda::find()->all() as $tipovenda){
                                  echo   '<div class="radio">
                              <label class="radio-custom" data-id="'.$tipovenda->id.'">
                                <input type="radio" data-id="'.$tipovenda->id.'" name="radio" value="'.$tipovenda->id.'" >
                                <i class="fa fa-circle-o"></i>
                               '.$tipovenda->nome.'
                              </label>
                            </div>'; 
                               }?>
                          
                          
                          </div>
 

    <div class="form-group">
        <button id="btnfechavenda" type="button" value="Fechar" class="btn btn-success">Fechar</button>
    </div>

   
            
                    
        </div>
    </div>
  </div>
</div>
<canvas id="qr-canvas" width="800" height="600"></canvas>

<script>
   var idVenda = '<?php echo $model->id;?>';
jQuery(function(){
    jQuery("#select2").select2();
        $('#myModal').on('show.bs.modal', function (e) {
            debugger;
            jQuery("#outdiv").show();
              load();
     
});
  $('#myModal').on('hide.bs.modal', function (e) {
      debugger;
        jQuery("#qr-canvas").hide();
         jQuery("#outdiv").hide();
             
});

    jQuery("#btnfechavenda").click(function(){
        
    var idVendaTipo = jQuery("input[name=radio]:checked").val();
        fechaVenda(idVenda, idVendaTipo);
        
    });   
    jQuery(".removeProduto").click(function(){
        
    var idProduto = jQuery(this).attr('data-id');
        removeProdutoVenda(idVenda, idProduto);
        
    });
    jQuery("#select2").click(function(){
 
debugger;
        var idProduto = jQuery(this).val();
        adicionaProdutoVenda(idProduto,idVenda);

      
   }); 
   });
function fechaVenda(idVenda, idVendaTipo){

        debugger;     
        $.ajax({
  url: "/venda/fechamento?idVenda="+idVenda+"&idVendaTipo="+idVendaTipo,
  
}).done(function(data) {
   location.href ='/caixa/'+data;
});    
};
function removeProdutoVenda(idVenda, idProduto){

        debugger;     
        $.ajax({
  url: "/vendaproduto/remove?idProduto="+idProduto+"&idVenda="+idVenda,
  
}).done(function(data) {
  location.reload();
});    
};
function adicionaProdutoVenda(idProduto, idVenda){
        debugger;     
        $.ajax({
  url: "/vendaproduto/create?idProduto="+idProduto+"&idVenda="+idVenda,
  
}).done(function(data) {
    debugger;
     $('#myModal').modal('hide');
 location.reload();
});
};
</script>
