<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Direccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Direccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigoPostal',
            'ciudad',
            'pais',
            'estado',
            // 'calle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
