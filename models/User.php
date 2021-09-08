<?php

namespace app\models;
use phpDocumentor\Reflection\Types\Object_;
use yii\db\ActiveRecord;
class User extends ActiveRecord implements \yii\web\IdentityInterface
{




    /**
     * @return string table name form the database
     * the table name is guessed automatically from the classname 'user'.
     * this method can overwrite the table name.
     */
    public static function tableName () {
        return 'user';
    }


    /**
     * {@inheritdoc}
     * this method searches the user by id and returns it
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     * @return Object
     * this method one object
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return Object
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     * @param string  $auth_key framework will inherit this variable name from the table and public it
     * @return bool if the auth key provided is valid for current user
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}
