<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Caixa */

$this->title = 'Abrir Caixa';
$this->params['breadcrumbs'][] = ['label' => 'Caixas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="/caixa"><i class="fa fa-home"></i> Caixa</a></li>
                <li class="active"><a href="#"><i class="fa fa-plus-circle"></i> Abrir</a></li>
              </ul>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


