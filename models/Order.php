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
        return $this->hasOne(User_fv::className(), ['id' => 'id_user']);
    }

    public function saveOrder($id)
    {
        $vacan = new Vacancy;
        $vacan->id_user = $id;
        $vacan->location  =  $this->location;
        $vacan->desciption  = $this->desciption;
        $vacan->price  = $this->price;
        $vacan->title  = $this->title;
        return $vacan->save(false);
    }
    public function getCity()
    {
       $sql = Vacancy::find()->andwhere(['location' => $this->location]);
        return $sql;
    }
}

