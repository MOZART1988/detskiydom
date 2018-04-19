<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 19.04.18
 * Time: 1:45 PM
 */

namespace app\modules\videos\models;


use app\components\behaviors\PreviewBehaviour;
use mongosoft\file\UploadImageBehavior;
use mtemplate\mclasses\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * @property integer $id
 * @property integer $is_active
 *
 * @property string $image
 * @property string $create_date
 * @property string $update_date
 * @property string $description
 * @property string $youtube_video
 */
class Videos extends ActiveRecord
{
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['image', 'youtube_video'], 'required'],
            [['youtube_video', 'description'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['create', 'update']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Описание',
            'image' => 'Превью видео',
            'is_active' => 'Активность',
            'youtube_video' => 'Ютуб видео'
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
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'image',
                'scenarios' => ['create', 'update'],
                'path' => '@webroot/media/videos/{id}',
                'url' => '@web/media/videos/{id}',
            ],
            [
                'class' => PreviewBehaviour::class,
                'attribute' => 'image',
                'previews' => [
                    [660, 357],
                    [305, 250]
                ]
            ]
        ];
    }
}