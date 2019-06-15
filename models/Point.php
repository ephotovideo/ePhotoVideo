<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Point extends ActiveRecord{

  public static function tableName()
    {
        return 'point';
    }
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string'],
            [['place_id'], 'string'],
            [['adres'], 'string'],
            [['name'], 'string'],
            [['lat'], 'double'],
            [['lng'], 'double'],
            [['description'],'string']
        ];
    }
    

    public function savePoint($user_setter,$lat,$lng,$place_id,$address)
    {
        $point = new Point;
        $point->type =  $this->type;
        $point->name =  $this->name;
        $point->description =  $this->description;
        $point->lat =  $lat;
        $point->lng =  $lng;
        $point->place_id =  $place_id;
        $point->adres =  $address;
        $point->user_id = $user_setter;
        $point->date = new Expression('NOW()');
        return $point->save(false);
    }
    
    

}
?>