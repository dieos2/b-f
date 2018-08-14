<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caixa */

$this->title = 'Update Caixa: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Caixas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caixa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
