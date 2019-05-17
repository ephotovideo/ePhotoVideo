<?php

namespace app\controllers;
namespace app\modules\admin\controllers;

use Yii;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User_fv;
use yii\web\Controller;

class ListController extends Controller{

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSigin()
    {
        $user_one = User_fv::find()->all();
        return $this->render('sigin',
            ['users'=>$user_one]);
    }

    public function actionUnlock($id)
    {
        Yii::$app->db->createCommand('UPDATE user SET status=0 WHERE id ='.$id)
            ->execute();
        return $this->redirect(['sigin']);
    }

    public function actionLock($id)
    {
        Yii::$app->db->createCommand('UPDATE user SET status=1 WHERE id ='.$id )
            ->execute();
        return $this->redirect(['sigin']);
    }
}
?>