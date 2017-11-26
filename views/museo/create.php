<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Museo */

$this->title = 'Create Museo';
$this->params['breadcrumbs'][] = ['label' => 'Museos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="museo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
