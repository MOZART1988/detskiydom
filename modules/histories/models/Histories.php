<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 12:44 PM
 */

namespace app\modules\histories\models;


use app\components\behaviors\PreviewBehaviour;
use mongosoft\file\UploadImageBehavior;
use mtemplate\mclasses\ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * @property integer $id
 * @property integer $is_active
 *
 * @property string $create_date
 * @property string $update_date
 * @property string $sefname
 * @property string $title
 * @property string $short_text
 * @property string $text
 * @property string $image
 * @property string $user_image
 * @property string $user_fio
 */

class Histories extends ActiveRecord
{
    public $files;

    public static function tableName()
    {
        return 'histories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['title', 'sefname'], 'required'],
            [['sefname', 'title', 'text', 'short_text', 'user_fio'], 'string'],
            [['sefname'], 'unique'],
            [['create_date', 'update_date'], 'safe'],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['create', 'update']],
            ['user_image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['create', 'update']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование',
            'sefname' => 'ЧПУ',
            'is_active' => 'Активность',
            'create_date' => 'Дата создания',
            'update_date' => 'Дата обновления',
            'image' => 'Фото',
            'user_image' => 'Фото рассказчика',
            'short_text' => 'Короткое описание',
            'user_fio' => 'Герой истории'
        ];
    }

    public function behaviors()
    {
        return [
            'Timestamp' => [
                'class' => TimestampBehavior::className(),
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
                'path' => '@webroot/media/histories/{id}',
                'url' => '@web/media/histories/{id}',
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'user_image',
                'scenarios' => ['create', 'update'],
                'path' => '@webroot/media/histories/{id}',
                'url' => '@web/media/histories/{id}',
            ],
            [
                'class' => PreviewBehaviour::class,
                'attribute' => 'image',
                'previews' => [
                    [558, 558],
                    [436, 304],
                    [425, 296]
                ]
            ],
            [
                'class' => PreviewBehaviour::class,
                'attribute' => 'user_image',
                'previews' => [
                    [50, 50],
                ]
            ],
            'Sluggable' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'sefname',
                'immutable' => true
            ],
        ];
    }
}