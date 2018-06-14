<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 4:30 PM
 */

namespace app\modules\pages\front\components\widgets;


use app\modules\languages\models\Languages;
use app\modules\pages\models\Pages;
use yii\base\Widget;

class SidebarNewsWidget extends Widget
{
    public $isProgramm = false;

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        $query = Pages::find()->where(['is_active' => 1, 'lang_id' => Languages::getCurrent()->id])->limit(3)->orderBy('RAND()');

        if ($this->isProgramm) {
            $query->andWhere(['type_id' => Pages::TYPE_PROGRAMM]);
        } else {
            $query->andWhere(['type_id' => Pages::TYPE_NEWS]);
        }

        $news = $query->all();

        if (!$news) {
            return false;
        }

        return $this->render('sidebarNewsWidget', ['news' => $news, 'isProgramm' => $this->isProgramm]);
    }
}