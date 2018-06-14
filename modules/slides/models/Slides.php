<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 23.04.18
 * Time: 10:45 AM
 */

namespace app\modules\slides\models;


use app\components\behaviors\PreviewBehaviour;
use app\modules\languages\models\Languages;
use mongosoft\file\UploadImageBehavior;
use mtemplate\mclasses\ActiveRecord;
use mtemplate\mclasses\LanguageActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * @property integer $id
 * @property integer $is_active
 *
 * @property integer $lang_id
 *
 * @property string $create_date
 * @property string $update_date
 * @property string $title
 * @property string $text
 * @property string $image
 * @property string $link
 *
 * @property Languages $language
 */
class Slides extends LanguageActiveRecord
{
    public static function tableName()
    {
        return 'slides';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['title'], 'required'],
            [['link', 'title', 'text'], 'string'],
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
            'title' => 'Заголовок',
            'is_active' => 'Активность',
            'create_date' => 'Дата создания',
            'update_date' => 'Дата обновления',
            'image' => 'Фото',
            'text' => 'Текст',
            'link' => 'Ссылка',
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
                'path' => '@webroot/media/slides/{id}',
                'url' => '@web/media/slides/{id}',
            ],
            [
                'class' => PreviewBehaviour::class,
                'attribute' => 'image',
                'previews' => [
                    [660, 450],
                ]
            ],
        ];
    }

    public static function find()
    {
        $query = new SlidesQuery(get_called_class());

        return $query->setLanguage();
    }

    /**
     * @inheritdoc
     * @return ActiveQuery
    */
    public function getLanguage()
    {
        return $this->hasOne(Languages::class, ['id' => 'lang_id']);
    }
}