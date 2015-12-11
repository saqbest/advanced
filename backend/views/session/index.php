<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sessions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Session', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

     //       'id',

            [
                'label' => 'Hall',
                'format' => 'raw',
                'value' => function($row){
                    return \common\models\Hall::findOne(['id' => $row->hall_id])->hall_name;
                }
            ],
            [
                'label' => 'Movie',
                'format' => 'raw',
                'value' => function($row){
                    return \common\models\Movie::findOne(['id' => $row->movie_id])->name;
                }
            ],

            'start_time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
