<?php

namespace frontend\controllers;

use common\models\Hall;
use common\models\Order;
use Yii;
use common\models\Session;
use common\models\SessionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SessionController implements the CRUD actions for Session model.
 */
class SessionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Session models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SessionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionOrder($id, $hallid)
    {
        $res = Hall::find()->select('hall_seat')->where(['id' => $hallid])->asArray()->one();
        $res = $res['hall_seat'];
        $res2 = Order::find()->select('seats')->where(['session_id' => $id])->asArray()->one();
        $res2 = $res2['seats'];
        $res2 = explode(",", $res2);
        return $this->render('seats', [
            'id' => $id,
            'res' => $res,
            'res2' => $res2,
        ]);
    }

    public function actionSelect($id, $hallid)
    {
        $res = Order::find()->select('session_id')->where(['session_id' => $id])->one();
        if (!empty($res)) {
            \Yii::$app->db->createCommand("UPDATE `order` SET `seats`=:status WHERE `session_id`=:id")
                ->bindValue(':id', $id)
                ->bindValue(':status', $hallid)
                ->execute();;
        } else {
            \Yii::$app->db->createCommand()->insert('order', [
                'session_id' => $id,
                'seats' => $hallid,
            ])->execute();
        }
    }

    protected function findModel($id)
    {
        if (($model = Session::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
