<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 27.04.18
 * Time: 3:34 PM
 */

namespace app\modules\poll\front\components\widgets;


use app\modules\poll\models\Poll;
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

    public function increasePoll()
    {
        $answer = Poll::find()->where(['id' => $this->answerId])->one();

        if ($answer === null) {
            return false;
        }

        $answer->count++;
        $answer->save();
        \Yii::$app->session->set('voted' , 'yes');

        return true;
    }
}