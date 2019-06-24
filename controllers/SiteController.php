<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SetingsForm;
use app\models\ImageUpload;
use app\models\ContactForm;
use app\models\Raiting;
use app\models\User_fv;
use app\models\Vacancy;
use app\models\Talking;
use app\models\Coment;
use app\models\User_content;
use app\models\Product;
use app\models\Order;
use app\models\Complaint;
use app\models\RatingStar;
use yii\data\Pagination;
use yii\web\UploadedFile;
use app\models\UserLock;
use yii\db\Expression;


class SiteController extends Controller
{
     
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */


    /**
     * Displays about page.
     *
     * @return string
     */
    // public function actionAbout()
    // {
    //     return $this->render('about');
    // }

    public function actionView($id)
    {
       $this->isBlock();
       $count = User_fv::getCountAllOrders($id);
       $user_one = User_fv::findOne($id);
       $contents = User_content::find()->where(['user_id'=> $id])->all();
       $vacancies = Vacancy::find()->where(['id_user'=> $id])->all();
       $products = Product::find()->where(['id_user'=> $id])->all();
       $mark = RatingStar::getMark($id);
        return $this->render('view',
        [
            'user_one'=>$user_one,
            'contents' => $contents,
            'vacancies' => $vacancies,
            'products' => $products,
            'count' => $count,
           'mark' =>$mark
        ]
    );
    }

    public function actionSetMark($id_user_set,$id_user_get)
    {

        $mark_set = new RatingStar();
        if(Yii::$app->request->isAjax)
        {
            session_start();
            $_SESSION['count']=$_POST['count'];
            $mark = $_SESSION['count'];
            unset($_SESSION['count']);
            
            
            if($mark_set->setMark($id_user_set,$id_user_get, $mark))
            {
                die;
            }
        }
        
        return $this->redirect(['map/index', 'id'=>$id_user_get]);
        
    }

    public function actionOrder($id)
    {
        $products = Product::find()->where(['id_user'=> $id])->all();
        $orders = Order::find()->where(['user_check'=> $id])->andWhere(['=', 'status', 0])->all();
        //$count = Yii::$app->db->createCommand('SELECT count(*) FROM `Order` where user_check = 1  '.$id);
        return $this->render('order',
        [
            'products' => $products,
            'orders' => $orders
        ]);
    }

    public function actionSetOrder($user_check,$user_create,$product)
    {
        Order::saveOrder($user_check,$user_create,$product);
        return $this->redirect(['site/view/','id'=>$user_check]);
    } 
    
    public function actionDeleteOrder($id)
    {
        Yii::$app->db->createCommand('UPDATE `Order` SET `status` =1 WHERE id ='.$id)->execute();
        return $this->redirect(['site/order/','id'=>Yii::$app->user->id]);
    } 

    public function actionSettings($id)
    {
        $user_one = User_fv::findOne($id);
        if(!$user_one)
            throw new \yii\web\NotFoundHttpException("Користувач не знайдений");

        if(Yii::$app->request->isPost)
        {
            $user_one->load(Yii::$app->request->post());
            if($user_one->setings_update())
            {
                return $this->redirect(['site/view/','id'=>$id]);
            }
        }
        if($id != Yii::$app->user->identity->id || $user_one->isAdmin != 1)
            throw new \yii\web\ForbiddenHttpException("У вас немає прав для редагування даного користувача");


        return $this->render('settings',
        [
            'user_one'=>$user_one
        ]
    );
    }

    //old
    // public function actionSetImage($id)
    // {
    //     $model = new ImageUpload;
    //     if (Yii::$app->request->isPost)
    //     {
    //         $user = User_fv::findOne($id);
    //         $file = UploadedFile::getInstance($model, 'image');

    //         if($user->saveImage($model->uploadFile($file, $user->img)))
    //         {
    //             return $this->redirect(['site/settings', 'id'=>$user->id]);
    //         }
    //     }
    //     return $this->render('upload_avatar', ['model'=>$model]);
    // }

    //new
      public function actionSetImage($id)
    {
        $user = new User_fv;
        if (Yii::$app->request->isPost)
        {
            
            $user->image = $_POST['image'];
            $user->image_name = $_POST['image_name'];

            if($user->saveImage_($id))
            {
                return $this->redirect(['site/settings', 'id'=>$user->id]);
            }
        }
        return $this->render('upload_avatar', ['user'=>$user]);
    }

    public function actionSetContent($id)
    {
        $model = new ImageUpload;
        if (Yii::$app->request->isPost)
        {
            $user = new User_content;
            $file = UploadedFile::getInstance($model, 'image');

            if($user->saveImage_content($model->uploadFile($file),"фото",$id))
            {
                return $this->redirect(['site/view', 'id'=>$id]);
            }
        }
        
        return $this->render('upload_avatar', ['model'=>$model]);
    }

    public function actionSetVideo()
    {     
        $model = new User_content();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveVideo(Yii::$app->user->id))
            {
                return $this->redirect(['view','id'=>Yii::$app->user->id]);
            }
        }
        return $this->render('insert_video', ['model'=>$model]);
    }

    public function actionSetVacancy()
    {     
        $model = new Vacancy();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveVacancy(Yii::$app->user->id))
            {
                return $this->redirect(['view','id'=>Yii::$app->user->id]);
            }
        }
        return $this->render('insert_vacancy', ['model'=>$model]);
    }





    public function actionField()
    {
        return $this->render('field');
    }

    public function actionLock()
    {
         Yii::$app->db->createCommand('UPDATE user SET status=0 WHERE id=1')->execute();
        return $this->redirect(['raiting']);
    }

    public function actionRaiting()
    {
        $model = new Raiting;
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $query=$model->getSearch();
        }
        else{
            $query = Raiting::find()->Where(['>', 'status', 0])->orderBy(['mark' => SORT_DESC]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>4]);
        $users = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('raiting',[
            'users'=>$users,
            'pagination'=>$pagination,
            'model' => $model
            ]);
    }

    public function actionProductSerch()
    {
        $model = new Product;
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $query=$model->getSearch();
        }
        else{
            $query = Product::find()->Where([ 'city' => 'Вся Україна']);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>6]);
        $products = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('products',[
            'products'=>$products,
            'pagination'=>$pagination,
            'model' => $model
            ]);
    }
//new
    public function actionSetProduct()
    {
        $model = new Product();
        if(Yii::$app->request->isAjax)
        {
            
            $modelData = [];
            parse_str(Yii::$app->request->post('productData'), $modelData);
            $model->load($modelData);

            $model->image = $_POST['image'];
            $model->image_name = $_POST['image_name'];


            // echo "<pre>";
            // print_r(Yii::$app->request->post());
            // echo "</pre>";
            // die;

            if($model->saveProduct(Yii::$app->user->id))
            {
                return $this->redirect(['view','id'=>Yii::$app->user->id]);
            }
        }        
        return $this->render('create_product', ['model'=>$model]);
    }


    //old

    //   public function actionSetProduct()
    // {
    //     $model = new Product();
    //     $img_model = new ImageUpload;
    //     if(Yii::$app->request->isPost)
    //     {
    //         $model->load(Yii::$app->request->post());
    //         $file = UploadedFile::getInstance($img_model, 'image');
    //         $filename = $img_model->uploadFile($file);
    //         if($model->saveProduct(Yii::$app->user->id,$filename))
    //         {
    //             return $this->redirect(['view','id'=>Yii::$app->user->id]);
    //         }
    //     }
    //     return $this->render('create_product', ['model'=>$model,
    //     'img_model' => $img_model
    //     ]);
    // }

    public function actionVacancy()
    {
        $model = new Vacancy;
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $query=$model->getCity();
        }
        else{
            $query = Vacancy::find();
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>3]);
        $vacancies = $query->offset($pagination->offset)->limit($pagination->limit)->all();     
        return $this->render('list_vacancy',[
            'vacancies'=>$vacancies,
            'pagination'=>$pagination,
            'model' => $model
            ]);
    }



    public function actionDeleteContent($id)
    {
        $content = User_content::find()->where(['id'=>$id])->one();
        $content->delete();

        return $this->redirect(['view', 'id'=>Yii::$app->user->id]);
    }
    public function actionDeleteVacancy($id)
    {
        $content = Vacancy::find()->where(['id'=>$id])->one();
        $content->delete();

        return $this->redirect(['view', 'id'=>Yii::$app->user->id]);
    }

    public function actionDeleteProduct($id)
    {
        $prod = Product::find()->where(['id'=>$id])->one();
        Order::deleteAll(['id_product' => $id]);
        $prod->delete();

        return $this->redirect(['view', 'id'=>Yii::$app->user->id]);
    }



    public function actionTalking()
    {
        $query = Talking::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>3]);
        $talkings = $query->offset($pagination->offset)->limit($pagination->limit)->all();     
        return $this->render('list_talking',[
            'pagination'=>$pagination,
            'talkings' => $talkings,
            ]);
    }

    public function actionComplaint($user_setter,$user_getter,$content,$vacancy,$talk,$coment,$product,$reason,$url)
    {
        $model = new Complaint();
        $model->setCompl($user_setter,$user_getter,$content,$vacancy,$talk,$coment,$product,$reason);
        return $this->redirect([$url]);

    }
    public function actionViewTalking($id)
    {
       $model = new Coment();
       $talking = Talking::findOne($id);
       $compl = new Complaint();
       $coments = Coment::find()->where(['talking_id'=> $id])->all();
       if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComent(Yii::$app->user->id, $id))
            {
                return $this->redirect(['talking']);
            }
        }
        return $this->render('view_talking',
        [
            'talking' => $talking,
            'coments' => $coments,
            'model' => $model,
            'compl' => $compl
        ]
    );
    }
    public function actionPolisy()
    {
        return $this->render('polisy');
    }
    public function actionSetTalking()
    {     
        $model = new Talking();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveTalking(Yii::$app->user->id))
            {
                return $this->redirect(['talking']);
            }
        }
        return $this->render('insert_talking', ['model'=>$model]);
    }
    public function actionMyTalking()
    {     
        $query = Talking::find()->where(['user_create'=>Yii::$app->user->id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>4]);
        $talkings = $query->offset($pagination->offset)->limit($pagination->limit)->all();     
        return $this->render('list_talking',[
            'pagination'=>$pagination,
            'talkings' => $talkings,
            ]);
    }

    public function isBlock()
    {
        $user_one = User_fv::findOne(Yii::$app->user->id);
        if($user_one->status === 0)
        {
            // echo "<pre>";
            // print_r("you blocked");
            // echo "</pre>";
            // die;
            throw new \yii\web\ForbiddenHttpException("У вас немає прав для редагування даного користувача");
        }
    }

    

}
