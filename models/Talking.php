<?php
namespace app\models;
use yii\db\ActiveRecord;

class Talking extends ActiveRecord{
    public static function tableName()
    {
        return 'Talking';
    }
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
            [['text'],'string']
        ];
    }
    public function getUser_fv()
    {
        return $this->hasOne(User_fv::className(), ['id' => 'user_create']);
    }  
    
    public function getComment()
    {
        return $this->hasMany(Coment::className(), ['talking_id' => 'id']);
    }  
    public function saveTalking($id)
    {
        if($this->validate())
        {
        $talk = new Talking;
        $talk->user_create = $id;
        $talk->title =  $this->title;
        $talk->text = $this->text;
        return $talk->save(false);
        }
    }
}

