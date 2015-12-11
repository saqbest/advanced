<?php
namespace backend\models;

class LoginForm extends \common\models\LoginForm
{
    private  $_user;
    public function getUser()
    {

        if ($this->_user === null) {
            $this->_user = User::findAdminByUsername($this->username);
        }

        return $this->_user;
    }
}