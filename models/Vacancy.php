<?php
namespace app\models;
use yii\db\ActiveRecord;

class Vacancy extends ActiveRecord{
    public static function tableName()
    {
        return 'Vacncy';
    }
    public function rules()
    {
        return [
            [['titlle', 'price'], 'required'],
            [['title'], 'string'],
            [['desciption'],'string'],
            [['price'],'string'],
            [['location'], 'string']
        ];
    }
    public function getUser_fv()
    {
        return $this->hasOne(User_fv::className(), ['id' => 'id_user']);
    }  
    public function saveVacancy($id)
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

