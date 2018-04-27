<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 27.04.18
 * Time: 3:34 PM
 */

namespace app\modules\poll\front\components\widgets;


use yii\base\Model;

class PollForm extends Model
{
    public $answerId;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answerId'], 'required'],
            [['answerId'], 'integer']
        ];
    }
}