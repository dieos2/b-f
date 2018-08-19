<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Fabricante */

$this->title = 'Create Fabricante';
$this->params['breadcrumbs'][] = ['label' => 'Fabricantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabricante-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
