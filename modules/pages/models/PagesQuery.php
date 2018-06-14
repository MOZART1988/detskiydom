<?php
/**
 * Created by PhpStorm.
 * User: yevgeniy
 * Date: 11/4/14
 * Time: 5:05 PM
 */

namespace app\modules\pages\models;

use app\modules\languages\models\Languages;
use yii\db\ActiveQuery;

class PagesQuery extends ActiveQuery
{

    public function active()
    {
        return $this->andWhere(['is_active' => 1]);
    }

    /**
     * @inheritdoc
     * @return Pages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pages|array|null
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
