<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Session */

$this->title = 'Seats';
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="test"></div>
    <h2>Select order seats</h2>
    <h5>one click = select
        <h5>
            <h5>dblclick click = unselect
                <h5>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Number</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        for ($i = 1; $i <= $res; $i++) {
                            foreach ($res2 as $val) {
                                if ($val == $i) {

                                    echo "<tr>";
                                    echo "<td class=selected id=" . $i . " ; >" . $i . "</td>";
                                    echo "</tr>";
								continue 2;
                                }
                                //;
                            }
                            echo "<tr>";
                            echo "<td  id=" . $i . ">" . $i . "</td>";
                            echo "</tr>";

                        }
                        ?>


                        </tbody>
                    </table>

                    <p>
                        <?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-primary', 'name' => 'button']) ?>
                    </p>
                    <?php
                    $script = <<< JS
$(document).ready(function(){
$("table tr td").click(function(){
$( this ).addClass( "selected" );
})
$("table tr td").dblclick(function(){
$( this ).removeClass( "selected" );
})
})
$(document).ready(function(){
$("button").click(function(){
    $("table tr td[class='selected']").each(function(){
    var selected = $(this).attr("id")
    $(".test").append(selected+",")

    })

    var res=$(".test").text()
    if(res==""){
    var res=0
    }
    $(".test").text("")
            var sessionid =  $id ;
       $.get('/session/select/'+sessionid+'/'+res,{},function(data){

})
alert("Information Saved")
    })

})


JS;
                    $this->registerJs($script);
                    ?>
                    <style>
                        .selected {
                            background: red;
                        }
                    </style
