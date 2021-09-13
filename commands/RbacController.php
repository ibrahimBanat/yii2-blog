<?php
namespace app\commands;
use yii\base\InvalidParamException;
use yii;
use yii\BaseYii;
use yii\console\Controller;
use app\models\User;

class RbacController extends Controller {
    public function actionAssign($role, $username)
    {
        $user = User::find()->where(['username' => $username])->one();
        if (!$user) {
            throw new InvalidParamException("There is no user \"$username\".
");
        }
        $auth = \Yii::$app->authManager;
        $roleObject = $auth->getRole($role);
        if (!$roleObject) {
            throw new InvalidParamException("There is no role \"$role\".");
        }
        $auth->assign($roleObject, $user->getId());
        return $user;
    }
}



