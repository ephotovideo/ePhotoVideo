<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\db\Expression;
use app\models\Point;
use app\models\SearchLocation;
use app\models\ImageUpload;
use app\models\User_content;
use app\models\User_fv;



class MapController extends Controller
{
    public function actionIndex()
    {
        $model = new Point;
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $points=$model->getSearch();
            $blocks=$model->getSearch();
        }
        return $this->render('search_map',['model' => $model,'points' => $points,'blocks' => $blocks]);
    }

    public function actionMap()
    {
        return $this->render('search_map');
    }

    public function actionSetMarker()
    {
        $model = new Point();
        $serch =new SearchLocation();
        if(Yii::$app->request->isAjax)
        {
           session_start();
            $_SESSION['longitude']=$_POST['longitude'];
            $_SESSION['latitude']=$_POST['latitude'];
            $_SESSION['place_id']=$_POST['place_id'];
            $_SESSION['address']=$_POST['address'];


        }
        else if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());

            $lat =  $_SESSION['latitude'];
            $lon= $_SESSION['longitude'];
            $place_id = $_SESSION['place_id'];
            $adress = $_SESSION['address'];

            unset($_SESSION['latitude']);
            unset($_SESSION['longitude']);
            unset ($_SESSION['place_id']);
            unset ($_SESSION['address']);
            if($model->savePoint(Yii::$app->user->id,$lat,$lon,$place_id,$adress))
            {
                return $this->redirect(['site/view','id'=>Yii::$app->user->id]);
            }
        }
        return $this->render('set_marker',['model'=>$model,
        'serch'=> $serch,'img_model' => $img_model]);
    }

    public function actionView($id)
    {
        $model = new Point();
        $point = Point::findOne($id);
        $contents = User_content::find()->where(['id_point'=> $id])->all();
        return $this->render('view',
        [
            'model' => $model,
            'point'=> $point,
            'contents' => $contents
        ]
    );
    }
    public function actionAdd($id_user,$id_point)
    {
        $contents = User_content::find()->where(['type'=> "фото"])->andWhere(['user_id' => $id_user])->all();
        $point = Point::findOne($id_point);
        return $this->render('add_content',
        [
            'point'=> $point,
            'contents' => $contents
        ]);
    }
    public function actionAddImg($id_content,$id_point,$img_content_name,$img_name_point)
    {
        Yii::$app->db->createCommand('UPDATE user_content SET id_point='.$id_point.' '.' WHERE id ='.$id_content)
        ->execute();
        if($img_name_point = "no-image.jpg")
        {
            Yii::$app->db->createCommand('UPDATE `point` SET img='.' "'.$img_content_name.'"'.' '.' WHERE id ='.$id_point)
            ->execute();
        }


    return $this->redirect(['index']);
    }

    public function actionViewPoints($id)
    {
        $points = Point::find($id_point)->all();
        return $this->render('own',
        [
            'points'=> $points,
        ]);
    }

    public function actionDeletePoint($id)
    {
        $point = Point::find()->where(['id'=>$id])->one();
        $point->delete();

        return $this->redirect(['map/view-points', 'id' => Yii::$app->user->id]);
    }


}
?>