<?php

namespace app\modules\poll\models;

use app\components\behaviors\PreviewBehaviour;
use mtemplate\mclasses\ActiveRecord;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "poll".
 *
 * @property integer $id
 * @property integer $count
 * @property string $answer
 * @property string $create_date
 * @property string $update_date
 */
class Poll extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poll';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['answer'], 'required'],
            [['answer'], 'string'],
            [['count'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pages', 'ID'),
            'answer' => \Yii::t('front', 'Ответ'),
            'count' => \Yii::t('front', 'Количество')
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_date', 'update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_date']
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getPrecentAnswer()
    {
        $count = 0;

        foreach (self::find()->all() as $item) {
            $count += $item->count;
        }

        if ($count !== 0) {
            return (int)((100 * $this->count) / $count);
        }

        return 0;

    }

    public static function getAllAnswers()
    {
        $result = [];

        foreach(self::find()->all() as $answer) {
            $result[$answer->id] = $answer->answer;
        }

        return $result;
    }
}
