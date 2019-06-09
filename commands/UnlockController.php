<?php


namespace app\commands;
use yii\console\Controller;
use yii\db\Expression;
use app\models\UserLock;
use Yii;
class UnlockController extends Controller {

    public function actionIndex()
    {
        echo "hello console";
    }
    public function actionCheck()
    {
        $date = date("Y-m-d H:i:s");
        //$date_now = datе("Y-m-d H:i:s");
        $model_lock = UserLock::find()->all();
         foreach($model_lock as $lock)
         {
            if($lock->date_end <= $date)
            {
                Yii::$app->db->createCommand('UPDATE user SET status=1 WHERE id ='.$lock->id_user)
                    ->execute();
                Yii::$app->db->createCommand('DELETE FROM `userlock`  WHERE id_user ='.$lock->id_user)
                    ->execute(); 

            }
         }
         
        
    }

}
?>