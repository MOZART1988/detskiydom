<?php

namespace app\modules\pages\models;

use mtemplate\mclasses\ActiveRecord;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use mtemplate\mclasses\LanguageActiveRecord;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property integer $is_programm
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
        $query = new PagesQuery(get_called_class());
        return $query;
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
                    'is_programm'
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
            'is_programm' => Yii::t('admin', 'Программа фонда')
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
                'thumbs' => [
                    'thumb' => ['width' => 200, 'quality' => 100],
                    'news_thumb' => ['width' => 261, 'quality' => 100],
                    'news_sidebar' => ['width' => 320, 'quality' => 100]
                ],
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
