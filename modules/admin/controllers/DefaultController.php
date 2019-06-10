<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\User_fv;
use app\models\Raiting;
use app\models\Vacancy;
use app\models\User_content;
use app\models\Product;
use app\models\UserLock;
use yii\db\Expression;
use yii\data\Pagination;
use app\models\Complaint;


class DefaultController extends Controller
{
    public function actionIndex()
{
    $model = new Raiting;
    if(Yii::$app->request->isPost){
        $model->load(Yii::$app->request->post());
        $query = $model->searchUserAdmin();
    }
    else{
        $query = Raiting::find();
    }
    $count = $query->count();
    $pagination = new Pagination(['totalCount' => $count,'pageSize'=>10]);
    $users = $query->offset($pagination->offset)->limit($pagination->limit)->all();
    return $this->render('index', [
        'users' => $users,
        'model' => $model,
        'pagination'=>$pagination
    ]);
}

    public function actionViewUser($id)
    {
        $user_one = User_fv::findOne($id);
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
        Yii::$app->db->createCommand('UPDATE user SET status=1 WHERE id ='.$id)
            ->execute();
        return $this->redirect(['index']);
    }
//    public function actionBann($id)
//    {
//        $model_lock = new UserLock;
//        if (Yii::$app->request->isPost)
//        {
//            $model_lock->load(Yii::$app->request->post());
//            if($model_lock->saveBan($id))
//            {
//                return $this->redirect(['index']);
//            }
//        }
//
//        return $this->render('lock', ['model'=>$model_lock]);
//    }

    public function actionLock($id)
    {
        $date = date("Y-m-d H:i:s");
        $model_lock = new UserLock;
        if (Yii::$app->request->isPost)
        {

            $model_lock->load(Yii::$app->request->post());
            if($model_lock->saveBan($id))
            {
                Yii::$app->db->createCommand('UPDATE user SET status=0 WHERE id ='.$id )
                    ->execute();
                return $this->redirect(['index']);
            }
        }

        return $this->render('lock', ['model'=>$model_lock, 'date'=>$date]);
    }
    public function actionComplaint()
    {// де контролер який переда модельку скарг? оно?да ну так де запит який передає дані
        $compl = Complaint::find()->all();// select * from Complaint

        return $this->render('complaint',['complaints' => $compl]);// кожна вюха має мати контролер!!!
    }
}
