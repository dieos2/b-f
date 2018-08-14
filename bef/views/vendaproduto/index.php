<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Venda Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Venda Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_produto',
            'valor',
            'id_venda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
