<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 27.04.18
 * Time: 1:19 PM
 */

namespace app\modules\poll\front\components\widgets;


use app\modules\custom_variables\models\CustomVariables;
use app\modules\poll\models\Poll;
use yii\base\Widget;

class PollWidget extends Widget
{
    public function run()
    {
        parent::run();

        $pollName = CustomVariables::find()->where(['title' => 'poll'])->one();

        $model = new PollForm();

        if ($model === null) {

            return false;
        }

        if ($pollName === null) {

            return false;
        }

        $answers = Poll::find()->all();

        if (!$answers) {
            return false;
        }

        return $this->render('pollWidget', ['pollTitle' => $pollName, 'poll' => $answers, 'model' => $model]);
    }
}