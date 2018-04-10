<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 4:30 PM
 */

namespace app\modules\pages\front\components\widgets;


use app\modules\pages\models\Pages;
use yii\base\Widget;

class SidebarNewsWidget extends Widget
{
    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        $news = Pages::find()->where(['is_active' => 1])->limit(4)->orderBy('RAND()')->all();

        if (!$news) {
            return false;
        }

        return $this->render('sidebarNewsWidget', ['news' => $news]);
    }
}