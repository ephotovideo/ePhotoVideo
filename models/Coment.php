<?php
namespace app\models;
use yii\db\ActiveRecord;

class Coment extends ActiveRecord{
    public static function tableName()
    {
        return 'Comments';
    }
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string']
        ];
    }
    public function getTalking()
    {
        return $this->hasOne(Talking::className(), ['id' => 'talking_id']);
    }  
    public function getUser($id)
    {
        $user = User_fv::findOne($id);
        return $user;
    }  
    public function getUser___()
    {
        return $this->hasOne(User_fv::className(), ['id' => 'id_user']);
    }  
    public function saveComent($user_id,$talk_id)
    {
        if($this->validate())
        {
        $coment = new Coment;
        $coment->talking_id = $talk_id;
        $coment->id_user =  $user_id;
        $coment->text = $this->text;
        return $coment->save(false);
        }
    }
}