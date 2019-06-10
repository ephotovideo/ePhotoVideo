<?php
/**
 * Created by PhpStorm.
 * User: Krager
 * Date: 09.06.2019
 * Time: 22:26
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Complaint extends ActiveRecord
{
    public static function tableName()
    {
        return 'complaints';
    }
    public function setCompl($user_setter,$user_getter,$content,$vacancy,$talk,$coment,$product,$reason)
    {
        $compl = new Complaint;
        $compl->id_user = $user_setter;
        $compl->id_accused = $user_getter;
        $compl->reason = $reason;
        $compl->content = $content;
        $compl->vacancy = $vacancy;
        $compl->talking = $talk;
        $compl->comments = $coment;
        $compl->products = $product;
        $compl->date = new Expression('NOW()');
        return $compl->save(false);
    }


}