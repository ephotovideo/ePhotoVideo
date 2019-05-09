<?php
namespace app\models;
use yii\db\ActiveRecord;

class User_content extends ActiveRecord{
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['user_id'],'string'],
            [['type'], 'string']
        ];
    }
    public static function tableName()
    {
        return 'User_content';
    }
    public function getUser_()
    {
        return $this->hasOne(User_one::className(), ['id' => 'user_id']);
    }  
    public function getImage_content()
    {
        return ($this->content) ? '/uploads/' . $this->content : '/uploads/no-image.jpg';
    }
    public function saveImage_content($filename,$type,$user_id)
    {
        $this->content = $filename;
        $this->user_id = $user_id;
        $this->type = $type;
        return $this->save(false);
    }
    public function saveVideo($id)
    {
        $user_content = new User_content;
        $user_content->user_id  = $id;
        $user_content->type  = "відео";
        $user_content->content  = $this->content;
        return $user_content->save(false);
    }




}