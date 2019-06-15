<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Point extends ActiveRecord{
    public $longitude;
    public $latitude;
  public static function tableName()
    {
        return 'point';
    }
    public function rules()
    {
        return [
            [['region','type'], 'required'],
            [['type'], 'string'],
            [['lat'], 'double'],
            [['lng'], 'double'],
            [['region'],'string'],
            [['description'],'string']
        ];
    }
    

    public function savePoint($user_setter,$lat,$lng)
    {
        $point = new Point;
        $point->region = $this->region;
        $point->type =  $this->type;
        $point->lat =  $lat;
        $point->lng =  $lng;
        $point->user_id = $user_setter;
        $point->date = new Expression('NOW()');
        return $point->save(false);
    }
    
    

}
?>