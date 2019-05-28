<?php
/**
 * Created by PhpStorm.
 * User: Krager
 * Date: 21.05.2019
 * Time: 13:44
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;

class UserLock extends ActiveRecord
{
    public static function tableName()
    {
        return 'UserLock';
    }
    public function rules()
    {
        return [
            [['reason'], 'required'],
            [['date_end'], 'datetime'],
            [['reason'],'string']
        ];
    }
    public function saveBan($id)
    {
        $ban = new UserLock;
        $ban->id_user = $id;
        $ban->reason = $this->reason;
        $ban->date_start = new Expression('NOW()');
        $ban->date_end= $this->date_end;
        return $ban->save(false);
    }
}