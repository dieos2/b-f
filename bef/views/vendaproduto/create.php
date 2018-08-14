<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\vendaProduto */

$this->title = 'Create Venda Produto';
$this->params['breadcrumbs'][] = ['label' => 'Venda Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
