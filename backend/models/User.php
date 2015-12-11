<?php
/**
 * Created by PhpStorm.
 * User: Sargis
 * Date: 30.09.2015
 * Time: 19:03
 */

namespace backend\models;


class User extends  \common\models\User
{
    public static function findAdminByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE,'role'=>'1']);
    }
}