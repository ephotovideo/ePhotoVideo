<?php
namespace app\models;
use yii\db\ActiveRecord;

class Point extends ActiveRecord{

  public static function tableName()
    {
        return 'point';
    }
    public function rules()
    {
        return [
            [['region','type'], 'required'],
            [['type'], 'string'],
            [['region'],'string'],
            [['description'],'string']

        ];
    }
    

    public function savePoint($user_setter)
    {
        $point = new Point;
        $point->region = $this->region;
        $point->type =  $this->type;
        $point->lat =  $this->$lat;
        $point->lng =  $this->$lng;
        $point->user_id = $user_setter;
        $point->date = new Expression('NOW()');
        return $point->save(false);
    }
    
    

}
?>