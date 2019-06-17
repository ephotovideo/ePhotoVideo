<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

class Point extends ActiveRecord{

  public static function tableName()
    {
        return 'point';
    }
    public function rules()
    {
        return [
            [['type'], 'string'],
            [['place_id'], 'string'],
            [['adres'], 'string'],
            [['name'], 'string'],
            [['lat'], 'double'],
            [['lng'], 'double'],
            [['img'],'string'],
            [['description'],'string']
        ];
    }
    public function getImage_point()
    {
        return ($this->img) ? '/uploads/' . $this->img : '/uploads/no-image.jpg';
    }

public function getImage_point_($img_)
    {
        return ($img_) ? '/uploads/' . $img_ : '/uploads/no-image.jpg';
    }

    public function getSearch()
    {
         $sql = Point::find()->where(['type' => $this->type])->orFilterWhere(['like','adres', $this->adres])->orFilterWhere(['like','name',$this->name])->all();
         return $sql;
    }
    public function getUser_fv()
    {
        return $this->hasOne(User_fv::className(), ['id' => 'user_id']);
    } 
    

    public function getPoint_Content()
    {
        return $this->hasMany(User_content::className(), ['id_point' => 'id']);
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