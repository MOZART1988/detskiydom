<?php

namespace app\modules\pages\models;

use app\components\behaviors\PreviewBehaviour;
use mtemplate\mclasses\ActiveRecord;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $sort
 * @property string $title
 * @property string $short_text
 * @property string $text
 * @property integer $is_active
 * @property string $create_date
 * @property string $update_date
 * @property string $image
 * @property string $sefname
 *
 * @property Pages $next
 */
class Pages extends ActiveRecord
{
    const TYPE_NEWS = 1;
    const TYPE_PROGRAMM = 2;
    const TYPE_FAQ = 3;

    const BACKGROUND_GREEN = 'green-prog';
    const BACKGROUND_BLUE = 'blue-prog';
    const BACKGROUND_ORANGE = 'orange-prog';
    const BACKGROUND_PINK = 'pink-prog';

    public static $types = [
        self::TYPE_NEWS => 'Новости',
        self::TYPE_PROGRAMM => 'Программы',
        self::TYPE_FAQ => 'Полезная информация'
    ];

    public static $backgroundColors = [
        self::BACKGROUND_BLUE, self::BACKGROUND_GREEN, self::BACKGROUND_ORANGE, self::BACKGROUND_PINK
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @return PagesQuery
     */
    public static function find()
    {
        return new PagesQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['title'], 'required'],
            [['sefname'], 'unique'],
            [
                [
                    'is_active',
                    'type_id',
                    'sort'
                ],
                'integer'
            ],
            [['short_text', 'text'], 'string'],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['create', 'update']],
            [
                [
                    'title',
                    'sefname',
                ],
                'string',
                'max' => 255
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pages', 'ID'),
            'lang_id' => Yii::t('pages', 'Язык'),
            'title' => Yii::t('pages', 'Заголовок'),
            'short_text' => Yii::t('pages', 'Краткое описание на главной'),
            'text' => Yii::t('pages', 'Текст'),
            'sefname' => Yii::t('pages', 'ЧПУ'),
            'is_active' => Yii::t('pages', 'Активность'),
            'image' => Yii::t('admin', 'Изображение'),
            'type_id' => Yii::t('admin', 'Тип статьи'),
            'sort' => Yii::t('admin', 'Сортировка')
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
                'path' => '@webroot/media/pages/{id}',
                'url' => '@web/media/pages/{id}',
            ],
            [
                'class' => PreviewBehaviour::class,
                'attribute' => 'image',
                'previews' => [
                    [398, 277],
                    [310, 216],
                    [261, 182],
                    [558, 389],
                    [436, 304]
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

    public function getNext()
    {
        return $this::find()->where(['is_active' => 1, 'type_id' => self::TYPE_NEWS])->andWhere(['>', 'id', $this->id])->one();
    }
}
