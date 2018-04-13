<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 11.04.18
 * Time: 4:35 PM
 */

namespace app\modules\pages\front\components\widgets;

use app\modules\pages\models\Pages;
use yii\base\Widget;

class InsideNewsWidget extends Widget
{
    public $id;

    public function run()
    {
        parent::run();

        $news = Pages::find()->where(['is_active' => 1, 'type_id' => Pages::TYPE_NEWS])
            ->andWhere(['<>', 'id', $this->id])->limit(6)->all();

        if (!$news) {
            return false;
        }

        return $this->render('insideNewsWidget', ['news' => $news]);
    }
}