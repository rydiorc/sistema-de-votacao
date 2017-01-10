<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Opcao */

$this->title = 'Create Opcao';
$this->params['breadcrumbs'][] = ['label' => 'Opcaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opcao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
