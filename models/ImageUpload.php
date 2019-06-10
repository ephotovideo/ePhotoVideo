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

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png'],
            ['crop_info', 'safe'],
        ];
    }

    public function afterSave(UploadedFile $file)
{


    // open image
    $this->image = $file;
    $image = Image::getImagine()->open($this->image->tempName);

    // rendering information about crop of ONE option 
    $cropInfo = Json::decode($this->crop_info)[0];
    $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
    $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
    $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
    $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y
    // Properties bolow we don't use in this example
    //$cropInfo['ratio'] = $cropInfo['ratio'] == 0 ? 1.0 : (float)$cropInfo['ratio']; //ratio image. 
    //$cropInfo['width'] = (int)$cropInfo['width']; //width of cropped image
    //$cropInfo['height'] = (int)$cropInfo['height']; //height of cropped image
    //$cropInfo['sWidth'] = (int)$cropInfo['sWidth']; //width of source image
    //$cropInfo['sHeight'] = (int)$cropInfo['sHeight']; //height of source image

    //delete old images
    // $oldImages = FileHelper::findFiles(Yii::getAlias('@path/to/save/image'), [
    //     'only' => [
    //         $this->id . '.*',
    //         'thumb_' . $this->id . '.*',
    //     ], 
    // ]);
    // for ($i = 0; $i != count($oldImages); $i++) {
    //     @unlink($oldImages[$i]);
    // }

    //saving thumbnail
    $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
    $cropSizeThumb = new Box(200, 200); //frame size of crop
    $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
    $pathThumbImage = Yii::getAlias('@web')
        . '/original' 
        . $this->id 
        . '.' 
        . $this->image->getExtension();  

    $image->resize($newSizeThumb)
        ->crop($cropPointThumb, $cropSizeThumb)
        ->save($pathThumbImage, ['quality' => 100]);

    //saving original
    $this->saveImage();
    // $this->image->saveAs(
    //     Yii::getAlias('@path/to/save/image') 
    //     . '/' 
    //     . $this->id 
    //     . '.' 
    //     . $this->image->getExtension()
    // );
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
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}