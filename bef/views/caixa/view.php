<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Setup;
/* @var $this yii\web\View */
/* @var $model app\models\Caixa */


?>


   

  
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="/caixa"><i class="fa fa-home"></i> Caixa</a></li>
                 <li><a href="/caixa"><i class="fa fa-list-alt"></i> Vendas</a></li>
              </ul>
            
              <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-male fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                        <span class="h3 block m-t-xs"><strong><?php echo $model->numeroVendas ?></strong></span>
                      <small class="text-muted text-uc">Vendas</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-bug fa-stack-1x text-white"></i>
                    
                    </span>
                    <a class="clear" href="#">
                        <span class="h3 block m-t-xs"><strong id="bugs"><?php echo Setup::FormataMoeda($model->valor_abertura) ?></strong></span>
                      <small class="text-muted text-uc">Abertura</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">                     
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-fire-extinguisher fa-stack-1x text-white"></i>
                    
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="firers"> <?php echo Setup::FormataMoeda($model->TotalVendas) ?></strong></span>
                      <small class="text-muted text-uc">Total</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong><?php echo $model->TempoAberto->i .':'.$model->TempoAberto->s?></strong></span>
                      <small class="text-muted text-uc">Tempo Aberto</small>
                    </a>
                  </div>
                </div>
              </section>
                  <div class="row">
                <div class="col-md-12">
                  <section class="panel panel-default panel-dark">
                    <header class="panel-heading font-bold">Vendas  <span class="label  pull-right"> 
                            <a class="btn btn-success" style="display: initial  !important; " href="/venda/create/<?php echo $model->id ?>">Nova Venda</a>
    </span></header>
                    <div class="panel-body ">
                        <div class="row">
                <div class="col-md-12 ">
                 
                  <ul class="list-group gutter list-group-lg list-group-sp sortable">
                    <?php foreach($model->vendas as $venda){
                          if($venda->id_vendaTipo != null){
                      
                    echo '<li class="list-group-item box-shadow btn-success text-white">
                     
                     
                      <div class="clear" id="todo-'.$venda->id.'">
                      <a href="#" class="text-white"> Cliente: '.$venda->idCliente->nome.' </a>|
                          <a class="text-white ">Valor: '.$venda->totalVenda.'  </a>
                               &nbsp;|
                                <a class="text-white ">Pagamento: '.$venda->idVendaTipo->nome.'  </a>
                      </div>
                    </li>';
                          }else{
                               echo '<li class="list-group-item box-shadow ">
                      <a href="#" class="pull-right cancelaVenda" data-id="'.$venda->id.'" data-dismiss="alert">
                        <i class="fa fa-times icon-muted"></i>
                      </a>
                     
                      <div class="clear" id="todo-'.$venda->id.'">
                      <a href="/venda/'.$venda->id.'" class=""> Cliente: '.$venda->idCliente->nome.' </a>|
                          <a class=" text-danger">Valor: '.$venda->totalVenda.'  </a>
                               &nbsp;
                      </div>
                    </li>';
                          }
                    }
                     ?>
                </div>
               
              </div>
                     
                     
                          <span class="label  pull-right"> <a href="#" id="fechacaixa" data-id="<?php echo $model->id?>" class="btn btn-info ">Fechar Caixa</a></span>
                     
                    </div>
                      
                  </section>
                </div>
            </section>
          </section>
<script>
   var idVenda = '<?php echo $model->id;?>';
jQuery(function(){
     jQuery(".cancelaVenda").click(function(){
        
    var idVenda = jQuery(this).attr('data-id');
        removeVenda(idVenda);
        
    });

 jQuery("#fechacaixa").click(function(){
        
    var idCaixa = jQuery(this).attr('data-id');
        fechaCaixa(idCaixa);
        
    });
});
function removeVenda(idVenda){

        debugger;     
        $.ajax({
  url: "/venda/remove?idVenda="+idVenda,
  
}).done(function(data) {
  location.reload();
});    
};
function fechaCaixa(idCaixa){

        debugger;     
        $.ajax({
  url: "/caixa/fecha?idCaixa="+idCaixa,
  
}).done(function(data) {
  location.href="/caixa";
});    
};
</script>
  


