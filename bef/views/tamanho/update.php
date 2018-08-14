<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tamanho */

$this->title = 'Update Tamanho: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tamanhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tamanho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
