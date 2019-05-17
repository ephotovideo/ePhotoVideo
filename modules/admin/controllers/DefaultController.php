<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\User_fv;
use app\models\Vacancy;
use app\models\User_content;
use app\models\Product;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $user_table = User_fv::find()->all();
        return $this->render('index', ['users' => $user_table]);
    }

    public function actionViewUser($id)
    {
        $user_one = User_fv::findOne($id); //=)
        $contents = User_content::find()->where(['user_id' => $id])->all(); //select *from content where user_id= $id
        $vacancies = Vacancy::find()->where(['id_user' => $id])->all();
        $products = Product::find()->where(['id_user' => $id])->all();
        return $this->render('user_view',
            [
                'user_one' => $user_one,
                'contents' => $contents,
                'vacancies' => $vacancies,
                'products' => $products
            ]
        );
    }

    public function actionUnlock($id)
    {
        Yii::$app->db->createCommand('UPDATE user SET status=0 WHERE id ='.$id)
            ->execute();
        return $this->redirect(['index']);
    }

    public function actionLock($id)
    {
        Yii::$app->db->createCommand('UPDATE user SET status=1 WHERE id ='.$id )
            ->execute();
        return $this->redirect(['index']);
    }
}