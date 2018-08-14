<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */

?>

<section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="/produtos"><i class="fa fa-home"></i> Produtos</a></li>
                  <li><a href="/#"><i class="fa fa-tag"></i> Editar</a></li>
              </ul>
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


