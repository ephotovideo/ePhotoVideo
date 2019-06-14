<?php
namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;
class SearchLocation extends Model
{
 
    public $address;
    public $longitude;
    public $latitude;

    

    public function check()
    {
      
        echo ("<pre>");
        print_r($longitude);
        echo ("</pre>");
    }
}
?>