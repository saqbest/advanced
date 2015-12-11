<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Hall;

/* @var $this yii\web\View */
/* @var $model common\models\Session */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'id',
            [
                'label' => 'Hall',
                'value' => common\models\Hall::findOne(['id' => $model->hall_id])->hall_name,
            ],
            [
                'label' => 'Movie',
                'value' => common\models\Movie::findOne(['id' => $model->movie_id])->name,
            ],
            'start_time',


        ],
    ]) ?>

</div>
