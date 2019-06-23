<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


class Product extends ActiveRecord{
    public $image;
    public $image_name;
    public $folder;
    public static function tableName()
    {
        return 'Products';
    }
    public function rules()
    {
        return [
            [['name_product', 'price_product','city'], 'required'],
            [['name_product'], 'string'],
            [['price_product'],'string'],
            [['city'],'string'],
            [['img'],'string'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }
    // return [
    //     [['image'], 'required'],
    //     [['image'], 'file', 'extensions' => 'jpg,png'],
    //     ['crop_info', 'safe'],
    // ];
    public function getUser_fv()
    {
        return $this->hasOne(User_fv::className(), ['id' => 'id_user']);
    }  
    public function getUser($id)
    {
        $user = User_fv::findOne($id);
        return $user;
    } 
    public function getOrder()  
    {
        return $this->hasMany(Order::className(), ['id_product' => 'id']);
    } 
     
    public function getImage_Product()
    {
        return ($this->img) ? '/uploads2/' . $this->img : '/uploads2/no-image.jpg';
    }

    public function saveProduct($id)
    {
        // print_r($this->)
        $product = new Product;
        $product->id_user = $id;
        $product->name_product  =  $this->name_product;
        $product->city  =  $this->city;
        $product->price_product  = $this->price_product;
        $product->img = $this->saveImage();
        $product->status = 0;

        return $product->save(false);
    }
    public function getSearch()
    {
       $sql = Product::find()->FilterWhere(['like','city', $this->city]);
        return $sql;
    }

    public function countOrder($user,$product)
    {
        $count = Order::find()->Where(['=', 'status', 0])->andwhere(['user_check' => $user])->andwhere(['id_product' => $product])->count();
        return $count;
    }
    public function uploadFile() //$currentImage
    {
      //  $this->image = $file;
       
       
       if($this->validate())
       {
         return $this->saveImage();
       }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFilename($baseName)
    {
        return strtolower(md5(uniqid($baseName)) . '.' . 'jpg');
    }
    public function saveImage()
    {
        // $image_array_1 = explode(";", $this->image);
        // $image_array_2 = explode(",", $image_array_1[1]);

        $image_array = explode(",", $this->image);
        // ob_start();
        $data = base64_decode($image_array[1]);

        // print_r($data);

        // return ob_get_clean();

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
       //
       //file_put_contents($path, $data);
      // chmod($path, 0777);
        return $filename;
    }
}

