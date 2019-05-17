<?php
namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord{
    public static function tableName()
    {
        return 'Products';
    }
    public function rules()
    {
        return [
            [['name_product', 'price_product'], 'required'],
            [['name_product'], 'string'],
            [['price_product'],'string']
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
    
    public function saveProduct($id)
    {
        $product = new Product;
        $product->id_user = $id;
        $product->name_product  =  $this->name_product;
        $product->price_product  = $this->price_product;
        return $product->save(false);
    }
     
}

