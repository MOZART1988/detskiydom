<?php
/**
 * Created by PhpStorm.
 * User: yevgeniy
 * Date: 11/4/14
 * Time: 5:05 PM
 */

namespace app\modules\pages\models;

use yii\db\ActiveQuery;

class PagesQuery extends ActiveQuery
{

    public function isActive()
    {
        $this->andWhere(['pages.is_active' => 1]);

        return $this;
    }

    public function orderDate()
    {
        $this->addOrderBy(['create_date' => SORT_DESC]);

        return $this;
    }
}
