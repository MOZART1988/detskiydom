<?php

namespace app\modules\pages\models;

use Imagine\Image\ManipulatorInterface;
use mtemplate\mclasses\ActiveRecord;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Exception;
use yii\db\Expression;
use mtemplate\mclasses\LanguageActiveRecord;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $short_text
 * @property string $text
 * @property integer $is_active
 * @property string $create_date
 * @property string $update_date
 * @property string $image
 * @property string $sefname
 */
class Pages extends ActiveRecord
{
    const TYPE_NEWS = 1;
    const TYPE_PROGRAMM = 2;
    const TYPE_FAQ = 3;

    const BACKGROUND_GREEN = 'green_prog';
    const BACKGROUND_BLUE = 'blue_prog';
    const BACKGROUND_ORANGE = 'orange_prog';
    const BACKGROUND_PINK = 'pink_prog';

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
                    'type_id'
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
            'user_id' => Yii::t('pages', 'Пользователь'),
            'lang_id' => Yii::t('pages', 'Язык'),
            'title' => Yii::t('pages', 'Заголовок'),
            'short_text' => Yii::t('pages', 'Краткое описание на главной'),
            'text' => Yii::t('pages', 'Текст'),
            'sefname' => Yii::t('pages', 'ЧПУ'),
            'is_active' => Yii::t('pages', 'Активность'),
            'image' => Yii::t('admin', 'Изображение'),
            'type_id' => Yii::t('admin', 'Тип статьи')
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
            'Sluggable' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'sefname',
                'immutable' => true
            ],
        ];
    }

    public function getFullImagePath()
    {
        return
            Yii::getAlias('@webroot') . '/media/pages/' . $this->id . '/' . $this->image;
    }

    public function getDirectoryPath()
    {
        return Yii::getAlias('@webroot') . '/media/pages/' . $this->id;
    }

    public function getImageName()
    {
        if (is_file($this->getFullImagePath())) {
            return basename($this->getFullImagePath());
        }

        throw new Exception('File not found');
    }

    public function createPreview()
    {
        foreach (\Yii::$app->params['previews']['pages'] as $sizes) {
            $suffix = '_' . $sizes[0] . 'x' . $sizes[1];
            try {
                \yii\imagine\Image::thumbnail($this->getFullImagePath(),
                    $sizes[0], $sizes[1], ManipulatorInterface::THUMBNAIL_INSET
                )->save($this->getDirectoryPath() . '/' . $suffix . '_' . $this->getImageName(), ['quality' => 100]);
            } catch (\Exception $e) {
                print_r($e->getMessage());
                exit;
            }
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $this->createPreview();
        }

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
