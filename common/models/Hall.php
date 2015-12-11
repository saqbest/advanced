<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hall".
 *
 * @property integer $id
 * @property string $hall_name
 *
 * @property Session[] $sessions
 */
class Hall extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hall';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hall_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hall_name' => 'Hall Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['hall_id' => 'id']);
    }
}
