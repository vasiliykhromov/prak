<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property string $username
 * @property string $password
 * @property string $surname
 * @property string $firstname
 * @property string $patronymic
 * @property string $phone
 * @property string $email
 *
 * @property Order[] $orders
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $password_repeat= null;
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->username;
    }

    public function getAuthKey()
    {
        return null;
    }
    public function validateAuthKey($authKey)
    {
        return null;
    }

    public static function findByUsername($username)
    {
       return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'surname', 'firstname', 'patronymic', 'phone', 'email'], 'required'],
            [['username', 'surname', 'firstname', 'patronymic'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 50,'min'=>6],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['email'], 'email'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'surname' => 'Фамилия',
            'firstname' => 'Имя',
            'patronymic' => 'Отчество',
            'phone' => 'Номер',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['username' => 'username']);
    }
}
