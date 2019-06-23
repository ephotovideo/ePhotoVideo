<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

class RatingStar extends ActiveRecord{
    public function rules()
    {
        return [
            [['mark'], 'double'],
            [['id_user_set'],'integer'],
            [['id_user_get'], 'integer']
        ];
    }
    public static function tableName()
    {
        return 'rating';
    }

    public function getMark($id_user_get)
    {
      $mark = Yii::$app->db->createCommand('SELECT AVG(mark) as `avg` FROM rating WHERE id_user_get='.$id_user_get)->queryOne();
    //  echo "<pre>";
    //  print_r($mark['avg']);
    //  echo "</pre>";
    //  die;
        return $mark['avg'];
    }
    

    public function setMark($id_user_set,$id_user_get,$mark_)
    {
        $mark = new RatingStar;
        $user_one = User_fv::findOne($id_user_get);
        

        $mark->id_user_set = $id_user_set;
        $mark->id_user_get = $id_user_get;
        $mark->mark = $mark_;
        if($mark->save(false))
        {
           $user_one->mark = $this->getMark($id_user_get);
           $user_one->save();
        }
        return true;
    }
}
?>