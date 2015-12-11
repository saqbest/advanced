<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'hall_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Hall::find()->all(), 'id', 'hall_name'), ['prompt' => 'Select Hall']) ?>

    <?= $form->field($model, 'start_time')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Time::find()->where(['6' => '0'])->all(), 'time_id', 'time_list'), ['prompt' => 'Select time',"disabled"=>"disabled"]) ?>

    <?= $form->field($model, 'movie_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Movie::find()->all(), 'id', 'name'), ['prompt' => 'Select Movie',"disabled"=>"disabled"]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>

</script>

</div>
