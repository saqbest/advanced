<?php

namespace common\models;

use Yii;
use common\models\Time;
/**
 * This is the model class for table "session".
 *
 * @property integer $id
 * @property string $start_time
 * @property integer $hall_id
 * @property integer $movie_id
 *
 * @property Hall $hall
 * @property Movie $movie
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_time',  'hall_id'], 'required'],
            [['start_time'], 'safe'],
            [['hall_id', 'movie_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_time' => 'Start Time',
            'hall_id' => 'Hall ID',
            'movie_id' => 'Movie ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHall()
    {
        return $this->hasOne(Hall::className(), ['id' => 'hall_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }
    public function getTime()
    {
        return $this->hasOne(Time::className(), ['id' => 'time_id']);
    }
}
