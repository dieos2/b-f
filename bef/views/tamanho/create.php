<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tamanho */

$this->title = 'Create Tamanho';
$this->params['breadcrumbs'][] = ['label' => 'Tamanhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tamanho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
