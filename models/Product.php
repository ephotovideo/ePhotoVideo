<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Product extends ActiveRecord{
    public static function tableName()
    {
        return 'Products';
    }
    public function rules()
    {
        return [
            [['name_product', 'price_product','image'], 'required'],
            [['name_product'], 'string'],
            [['price_product'],'string'],
            [['img'],'string'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }
    public function getUser_fv()
    {
        return $this->hasOne(User_fv::className(), ['id' => 'id_user']);
    }  

    public function getOrder()
    {
        return $this->hasMany(Order::className(), ['id_product' => 'id']);
    } 
     
    public function getImage_Product()
    {
        return ($this->img) ? '/uploads/' . $this->img : '/uploads/no-image.jpg';
    }

    public function saveProduct($id,$img)
    {
        $product = new Product;
        $product->id_user = $id;
        $product->name_product  =  $this->name_product;
        $product->price_product  = $this->price_product;
        $product->img = $img;
        return $product->save(false);
    }
}

