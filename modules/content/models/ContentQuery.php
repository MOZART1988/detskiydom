<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 19.09.2017
 * Time: 21:57
 */

namespace app\modules\content\models;


use app\modules\languages\models\Languages;
use yii\db\ActiveQuery;

class ContentQuery extends ActiveQuery
{
    public function setLanguage()
    {
        if (\Yii::$app->params['yiiEnd'] === 'admin') {
            $this->andWhere(['content.lang_id' => Languages::getAdminCurrent()->id]);
        } else {
            $this->andWhere(['content.lang_id' => Languages::getCurrent()->id]);
        }

        return $this;
    }
}