<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 14.06.18
 * Time: 17:32
 */

namespace app\modules\slides\models;


use app\modules\languages\models\Languages;
use yii\db\ActiveQuery;

class SlidesQuery extends ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['is_active' => 1]);
    }

    /**
     * @inheritdoc
     * @return Slides[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Slides|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function setLanguage()
    {
        $langId = \Yii::$app->request->get('lang_id');

        if (!empty($langId)) {
            $this->andWhere(['slides.lang_id' => Languages::getCurrent()->id]);
        } else {
            $this->andWhere(['slides.lang_id' => Languages::getAdminCurrent()->id]);
        }

        return $this;
    }
}