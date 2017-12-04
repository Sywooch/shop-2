<?php

namespace app\models;

use yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * Это класс модели для таблицы "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $isAdmin
 * @property string $photo
 * @property int $created_at
 * @property int $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'isAdmin', 'created_at', 'updated_at'], 'integer'],
            [['name', 'email', 'password', 'photo'], 'string', 'max' => 255],
            [['name', 'email',], 'required'],
            ['name', 'string', 'min' => 2],
            ['email', 'email'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'isAdmin' => 'Роль',
            'photo' => 'Аватар',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен'
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByUsername($username)
    {
        return User::find()->where(['name' => $username])->one();
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function getPassword($id)
    {
        return User::findOne($id)->password;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function create()
    {
        return $this->save(false);
    }

    public function saveImage($filename)
    {
        $this->photo = $filename;

        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->photo) ? '/uploads/' . $this->photo : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->photo);
    }
}
