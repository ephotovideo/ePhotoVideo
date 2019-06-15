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


class MapController extends Controller
{
    public function actionIndex()
    {
        $model = new SearchLocation();
        return $this->render('search_map',['model'=>$model]);
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


        }
        else if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            $lat =  $_SESSION['latitude'];
            $lon= $_SESSION['longitude'];
            unset($_SESSION['latitude']);
            unset($_SESSION['longitude']);

            if($model->savePoint(Yii::$app->user->id,$lat, $lon))
            {
                return $this->redirect(['view','id'=>Yii::$app->user->id]);
            }
        }
        return $this->render('set_marker',['model'=>$model,
        'serch'=> $serch]);
    }

}
?>