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
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {link}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-screenshot"></span>',
                            $url);
                    },
                    'link' => function ($url,$model,$key) {
                        return Html::a('Order tikcet', ['order','id'=>$model->id,'hallid'=>$model->hall_id,] );
                    },
                ],
            ],

        ],
    ]); ?>

</div>
