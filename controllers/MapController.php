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
        $serch = new SearchLocation();
        $model = new Point();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            // if($model->savePoint(Yii::$app->user->id))
            // {
            //     return $this->redirect('search_map');
            // }
            $serch->check();
        }        
        return $this->render('set_marker',['model'=>$model,
        'serch'=> $serch]);
    }

}
?>