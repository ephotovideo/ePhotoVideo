<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\imagine\Image;


class ImageUpload extends Model{
    
    public $image;
    public $image_name;
    public $crop_info;
    public $folder;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png'],
            ['crop_info', 'safe'],
        ];
    }


    public function uploadFile($file) //$currentImage
    {
        $this->image = $file;
       
       
       if($this->validate())
       {
         return $this->saveImage();
       }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    // private function generateFilename()
    // {
    //     $expl = explode(".", $this->image_name);
    //     $baseName = $expl[0];
    //     return strtolower(md5(uniqid($this->$baseName)) . '.' . 'jpg');
    // }

    private function generateFilename()
    {
        //return strtolower(md5(uniqid( $baseName)) . '.' . 'jpg');
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }
    public function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $this->folder . $filename);
        return $filename;
    }

    // public function saveImage()
    // {
    //     $image_array_1 = explode(";", $this->image);
    //         $image_array_2 = explode(",", $image_array_1[1]);
    //         $data = base64_decode($image_array_2[1]);

    //         $expl = explode(".", $this->image_name);
    //         $baseName = $expl[0];
    //     $filename = $this->generateFilename($baseName);


    //     $path = Yii::getAlias('@web') . '/web/uploads/crop';
    //     $target = $path . '/' . $filename;

    //     if(!file_exists($path))
    //         mkdir($path, 0777, true);

    //     $stream = fopen($target, 'w+');

    //     fwrite($stream, $data);

    //     fclose($stream);
    //     // file_put_contents($target);

        

    //     // $data->saveAs($this->getFolder() . $filename);

    //     return $filename;
    // }
}