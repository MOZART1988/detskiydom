<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 12.07.18
 * Time: 18:01
 */

namespace app\components\widgets;


use app\modules\languages\models\Languages;
use yii\base\Widget;

class LanguagesWidget extends Widget
{
    public function run()
    {
        parent::run();

        $languages = Languages::find()->where(['is_active' => 1])->andWhere([
            '<>', 'id', Languages::getCurrent()->id
        ])->all();

        if (!$languages) {
            return false;
        }

        return $this->render('languagesWidget', ['languages' => $languages]);
    }
}