<?php
namespace app\models;
use yii\db\ActiveRecord;

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

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    public function saveComent($user_check,$user_create)
    {

        $order = new Order;
        $order->user_check = $user_check;
        $coment->user_create =  $user_create;
        //$coment->text = $this->text;
        return $coment->save(false);
    }

}

