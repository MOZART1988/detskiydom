<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 9/19/14
 * Time: 16:43
 */

namespace app\modules\languages\front\components;


use app\modules\languages\models\Languages;
use yii\base\Widget;

class LanguageWidget extends Widget
{

    public function run()
    {
        $current = Languages::findOne(Languages::getCurrent()->id);

        if ($current !== null) {
            $models = Languages::find()->where(['is_active' => 1])->andWhere(['<>', 'id', $current->id])->all();
            return $this->render('languageWidget', ['models' => $models, 'current' => $current]);
        }

        return null;

    }
}
