<?php
namespace app\models;
use yii\db\ActiveRecord;

class User_content extends ActiveRecord{
    public $image;
    public $image_name;
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['user_id'],'string'],
            [['type'], 'string'],
            [['image'], 'file', 'extensions' => 'jpg,png']
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
    public function getPoint()
    {
        return $this->hasOne(Point::className(), ['id' => 'id_point']);
    }  
    public function getImage_content()
    {
        return ($this->content) ? '/uploads2/' . $this->content : '/uploads/no-image.jpg';
    }
    public function getUser($id)
    {
        $user = User_fv::findOne($id);
        return $user;
    } 
    public function saveImage_content($type,$user_id)
    {
        $this->content = $this->saveContent();
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



    public function uploadFile() //$currentImage
    {
      //  $this->image = $file;
       
       
       if($this->validate())
       {
         return $this->saveImage();
       }
    }

    private function generateFilename($baseName)
    {
        return strtolower(md5(uniqid($baseName)) . '.' . 'jpg');
    }
    public function saveContent()
    {

        $image_array = explode(",", $this->image);
        $data = base64_decode($image_array[1]);


        $expl = explode(".", $this->image_name);
        $baseName = $expl[0];
        $filename = $this->generateFilename($baseName);
        $path = $_SERVER['DOCUMENT_ROOT'] . '/uploads2';
        $target = $path . '/' . $filename;

       if(!file_exists($path))
            mkdir($path, 0777, true);

       
        @chmod($target, 0777);

        $stream = fopen( $target, 'w+');
       
        fwrite($stream, $data);

        fclose($stream);
        return $filename;
    }




}