<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Session */

$this->title = 'Create Session';
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="session-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
<?php
$script = <<< JS
$(document).ready(function() {
    $("#session-hall_id").change(function(){
 var hall_id=$("#session-hall_id").val();
    $.get('/admin/session/time/'+hall_id,{},function(data){
        var data= $.parseJSON(data);
        $("#session-start_time " ).html("")
        $("#session-start_time " ).append("<option value> Select time</option>").removeAttr('disabled')
        $("#session-movie_id " ).removeAttr('disabled')

        $.each(data, function(key,value){
    $("#session-start_time " ).append("<option value="+value.time_list+">"+value.time_list+"</option>")

        })
    })
    }) ;
    });
$(document).ready(function(){

    $("button").click(function(){

     var hall_id=$("#session-hall_id").val();
     var time = $("#session-start_time " ).val();
     console.log(hall_id+time)
         $.get('/admin/session/timeupdate/'+hall_id+'/'+time,{},function(data){
})
    })
})
JS;
$this->registerJs($script);
?>