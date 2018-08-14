 <?php 
 use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Setup;
 ?> <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Painel</a></li>
                <li class="active">Estatisticas</li>
              </ul>
            
              <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-male fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                        <span class="h3 block m-t-xs"><strong><?php echo app\models\Produto::find()->where(["=", "vendido", true])->count() ?></strong></span>
                      <small class="text-muted text-uc">Produtos</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-bug fa-stack-1x text-white"></i>
                    
                    </span>
                    <a class="clear" href="#">
                        <span class="h3 block m-t-xs"><strong id="bugs"><?php echo app\models\Produto::find()->where(["=", "vendido", false])->count() ?></strong></span>
                      <small class="text-muted text-uc">Vendidos</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">                     
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-fire-extinguisher fa-stack-1x text-white"></i>
                    
                    </span>
                    <a class="clear" href="#">
                        <span class="h3 block m-t-xs"><strong id="firers"><?php echo Setup::FormataMoeda(app\models\Produto::find()->where(["=", "vendido", true])->sum("preco")) ?></strong></span>
                      <small class="text-muted text-uc">Prospec de Ganho</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong><?php echo Setup::FormataMoeda(app\models\Produto::find()->where(["=", "vendido", true])->sum("preco_custo")) ?></strong></span>
                      <small class="text-muted text-uc">Valor Investido</small>
                    </a>
                  </div>
                </div>
              </section>
            