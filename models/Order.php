<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Order extends ActiveRecord{
    public static function tableName()
    {
        return 'Order';
    }
    public function rules()
    {
        return [

        ];
    }
    public function getUser_fv()
    {
        return $this->hasOne(User_fv::className(), ['id' => 'user_check']);
    }

    public function getUser($id)
    {
        $user = User_fv::findOne($id);
        return $user;
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    public function saveOrder($user_check,$user_create,$product)
    {
        $order = new Order;
        $order->user_check = $user_check;
        $order->user_create =  $user_create;
        $order->id_product =  $product;
        $order->date = new Expression('NOW()');
        return $order->save(false);
    }

}

