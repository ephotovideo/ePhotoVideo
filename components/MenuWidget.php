<?php
namespace app\components;
use yii\base\Widget;
use app\models\user_fv;



class MenuWidget extends Widget{

    public $tpl;
public $data;
public $tree;
public $menuHtml;
    public function init(){
        parent::init();
        if($this->tpl === null){
            $this->tpl =='menu';
        }
        $this->tpl .= '.php';
    }
    public function run(){
        $this->data = User_fv::find()->asArray()->all();
        debug($this->data);
        return $this->data;
    }
}
?>