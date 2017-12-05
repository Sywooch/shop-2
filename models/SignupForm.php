<?php

namespace app\models;

use yii\base\Model;


class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $verifyCode;

    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['name'], 'string'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            [['email'], 'email'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function signup()
    {
        if ($this->validate()) {

            $user = new User();
            $user->attributes = $this->attributes;
            $user->setPassword($user->password);

            return $user->create();
        }
    }
}