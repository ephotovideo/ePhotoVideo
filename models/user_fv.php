<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;
use yii\db\Query;

class User_fv extends ActiveRecord implements \yii\web\IdentityInterface{

    public $image;
    public $image_name;
    public static function tableName(){
        return 'user';
    }  
    public function rules()
    {
        return [
            [['username','email','type','phone'], 'required'],
            [['username'], 'string'],
            [['email'], 'email'],
            [['price'], 'integer'],
            [['type'], 'string'],
            [['City'], 'string'],
            [['Filming_cities'], 'string'],
            [['phone'], 'string'],
            [['telegram'], 'string'],
            [['viber'], 'string'],
            [['facebook'], 'string'],
            [['instagram'], 'string'],
            [['description'], 'string'],
            [['email'], 'unique', 'targetClass'=>'app\models\User_fv', 'targetAttribute'=>'email'],
            [['img'],'string'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Name',
            'email' => 'Email',
            'password' => 'Password'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return User_fv::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
  

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
      
    }

    //* {@inheritdoc}
    // /**
    //  */
    public function validateAuthKey($authKey)
    {
     
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
    * @return bool if password provided is valid for current user
     */
    public static function findByUsername($username)
    {
        return User_fv::find()->where(['username'=>$username])->one();
    }
    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false; 
    }
    public function setings_update()
    {
        $user = User_fv::findOne($this->id);
        if($this->validate())
        {
            $user->username = $this->username;
            $user->email = $this->email;
            $user->type = $this->type;
            $user->City = $this->City;
            $user->type = $this->type;
            $user->price = $this->price;
            $user->Filming_cities = $this->Filming_cities;
            $user->phone = $this->phone;
            $user->telegram = $this->telegram;
            $user->viber = $this->viber;
            $user->facebook = $this->facebook;
            $user->instagram = $this->instagram;
            $user->description = $this->description;
            if($user->type == "Користувач")
            {
                $user->status = 0;
            }
            else
            {
                $user->status = 1;
            }
            
            return $user->save();
        }
    }

    public function create()
    {
        return $this->save(false);
    }
    public function getRating()
    {
        return $this->save(false);
    }
    // public function getRatingStar($id)
    // {
    //     $mark = Yii::$app->db->createCommand('SELECT AVG(mark) FROM rating WHERE id_user_get ='.$id)->execute();
    //     return $mark;
    // }

    public function saveImage()
    {
        $this->img = $filename;
        return $this->save(false);
    }
    public function getImage()
    {
        return ($this->img) ? '/uploads2/' . $this->img : '/uploads/no-image.jpg';
    }

    public function getContent()
    {
        return $this->hasMany(User_content::className(), ['user_id' => 'id']);
    }
    public function getVacancy()
    {
        return $this->hasMany(Vacansy::className(), ['id_user' => 'id']);
    }
    public function getProduct()
    {
        return $this->hasMany(Product::className(), ['id_user' => 'id']);
    }
    public function getOrder()
    {
        return $this->hasMany(Order::className(), ['user_check' => 'id']);
    } 
    public function getComment_()
    {
        return $this->hasMany(Coment::className(), ['id_user' => 'id']);
    }

    public function getPoint_Map()
    {
        return $this->hasMany(Point::className(), ['user_id' => 'id']);
    }

    public function getCountAllOrders($user)
    {
        $count = Order::find()->Where(['user_check' => $user])->count();
        return $count;
    }
    // public function afterDelete()
    // {
    //     Vacansy::deleteAll(['id_user' => $this->primaryKey]);
    //     return parent::afterDelete();
    //
    //
    // }


    public function uploadFile() //$currentImage
    {
      //  $this->image = $file;
       
       
       if($this->validate())
       {
         return $this->saveImage();
       }
    }

    private function generateFilename($baseName)
    {
        return strtolower(md5(uniqid($baseName)) . '.' . 'jpg');
    }
    public function saveImage_()
    {

        $image_array = explode(",", $this->image);
        $data = base64_decode($image_array[1]);


        $expl = explode(".", $this->image_name);
        $baseName = $expl[0];
        $filename = $this->generateFilename($baseName);
        $path = $_SERVER['DOCUMENT_ROOT'] . '/uploads2';
        $target = $path . '/' . $filename;

       if(!file_exists($path))
            mkdir($path, 0777, true);

       
        @chmod($target, 0777);

        $stream = fopen( $target, 'w+');
       
        fwrite($stream, $data);

        fclose($stream);
        return $filename;
    }
    public function saveAvatar($id)
    {
        $user = User_fv::findOne($id);
        $user->img = $this->saveImage_();

        return $user->save(false);
    }
    
}