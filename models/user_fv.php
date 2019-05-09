<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User_fv extends ActiveRecord implements \yii\web\IdentityInterface{

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
            [['email'], 'unique', 'targetClass'=>'app\models\User_fv', 'targetAttribute'=>'email']
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


    public function saveImage($filename)
    {
        $this->img = $filename;
        return $this->save(false);
    }
    public function getImage()
    {
        return ($this->img) ? '/uploads/' . $this->img : '/uploads/no-image.jpg';
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
    public function getComment_()
    {
        return $this->hasMany(Coment::className(), ['id_user' => 'id']);
    }


    // public function afterDelete()
    // {
    //     Vacansy::deleteAll(['id_user' => $this->primaryKey]);
    //     return parent::afterDelete();
    // }
    
}