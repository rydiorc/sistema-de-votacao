<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpcaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opcaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opcao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Opcao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'imagem',
            'responsavel',
            'categoria_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
