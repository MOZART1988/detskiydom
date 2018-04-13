<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 12:18 PM
 */

namespace app\modules\pages\front\components\widgets;


use app\modules\pages\models\Pages;
use yii\base\Widget;

class BasepageNewsWidget extends Widget
{
    public function run()
    {
        parent::run();

        $news = Pages::find()->where(['is_active' => 1, 'type_id' => Pages::TYPE_NEWS])->orderBy('RAND()')->limit(8)->all();

        if (!$news) {
            return false;
        }

        return $this->render('basepageNewsWidget', ['news' => $news]);
    }
}