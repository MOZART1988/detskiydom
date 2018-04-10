<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 2:24 PM
 */

namespace app\modules\histories\front\components\widgets;


use app\modules\histories\models\Histories;
use yii\base\Widget;

class BasepageHistoryWidget extends Widget
{
    public function run()
    {
        parent::run();

        $history = Histories::find()->where(['is_active' => 1])->orderBy('RAND ()')->one();

        if ($history === null) {
            echo 1;
            return false;
        }

        return $this->render('basepageHistoryWidget', ['history' => $history]);
    }
}