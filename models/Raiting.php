<?php
namespace app\models;
use yii\db\ActiveRecord;

class Raiting extends ActiveRecord{
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string'],
            [['username'],'string'],
            [['Filming_cities'], 'string']
        ];
    }
    public static function tableName()
    {
        return 'user';
    }
    
    public function getImage_raiting()
    {
        return ($this->img) ? '/uploads2/' . $this->img : '/uploads/no-image.jpg';
    }
    public function getSearch()
    {
       $sql = Raiting::find()->Where(['>', 'status', 0])->andwhere(['type' => $this->type])->andFilterWhere(['or', ['like', 'Filming_cities', 'Вся Україна'], ['like','Filming_cities', $this->Filming_cities]])->andFilterWhere(['like','username',$this->username])->orderBy(['mark' => SORT_DESC]);
        return $sql;
    }
    public function searchUserAdmin()
    {
        $sql = Raiting::find()->Where(['type' => $this->type])->orWhere(['username' =>$this->username]);
        return $sql;
    }

}
?>