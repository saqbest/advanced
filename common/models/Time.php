<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "time".
 *
 * @property integer $time_id
 * @property string $time_list
 * @property integer $red_hall
 * @property integer $blue_hall
 * @property integer $green_hall
 */
class Time extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['red_hall', 'blue_hall', 'green_hall'], 'integer'],
            [['time_list'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'time_id' => 'Time ID',
            'time_list' => 'Time List',
            'red_hall' => 'Red Hall',
            'blue_hall' => 'Blue Hall',
            'green_hall' => 'Green Hall',
        ];
    }
}
