<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 03.09.2017
 * Time: 21:37
 */

namespace app\modules\content\models;

use app\components\behaviors\PreviewBehaviour;
use app\modules\languages\models\Languages;
use mongosoft\file\UploadImageBehavior;
use mtemplate\mclasses\ActiveRecord;
use mtemplate\mclasses\LanguageActiveRecord;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * @property integer $id
 * @property integer $is_active
 * @property integer $lang_id
 *
 * @property string $image
 * @property string $create_date
 * @property string $update_date
 * @property string $text
 * @property string $title
 * @property string $sefname
 * @property string $quote
 * @property string $goals
*/

class Content extends LanguageActiveRecord
{

    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'lang_id'], 'integer'],
            [['title', 'sefname', 'lang_id'], 'required'],
            [['text', 'sefname', 'quote', 'goals'], 'string'],
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
            'text' => 'Текст',
            'title' => 'Заголовок',
            'is_active' => 'Активность',
            'image' => 'Картинка',
            'sefname' => 'ЧПУ',
            'goals' => 'Цели (каждую строчку писать с новой строки)',
            'quote' => 'Цитата',
            'is_programm' => 'Программа фонда',
            'lang_id' => 'Язык'
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
                'path' => '@webroot/media/content/{id}',
                'url' => '@web/media/content/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 200, 'quality' => 100],
                ],
            ],
            [
                'class' => PreviewBehaviour::class,
                'attribute' => 'image',
                'previews' => [
                    [885, 292],
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

    public static function find()
    {
        $query = new ContentQuery(get_called_class());

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

    /**
     * @inheritdoc
     * @return bool
     */
    public function copy($langId)
    {
        $element =  new self(
            [
                'is_active' => $this->is_active,
                'title' => $this->title,
                'text' => $this->text,
                'quote' => $this->quote,
                'goals' => $this->goals,
                'lang_id' => $langId
            ]
        );


        if ($element->save()) {

            return $this->copyImage($element->id);
        }

        return false;

    }

    /**
     * @inheritdoc
     * @param int $newId
     * @return bool;
     */
    public function copyImage($newId)
    {
        $newElement = self::find()->where(['id' => $newId])->one();

        if ($newElement === null) {
            return false;
        }

        if (!$this->image) {

            return false;
        }

        $newImageName = $newId . '-copied-' . $this->getImageName();

        if (!is_dir(\Yii::getAlias('@media') . '/content/')) {
            mkdir(\Yii::getAlias('@media') . '/content/');
        }

        if (!is_dir(\Yii::getAlias('@media') . '/content/' . $newId)) {
            mkdir(\Yii::getAlias('@media') . '/content/' . $newId);
        }

        if (!empty($this->image) && is_file($this->getFullImagePath())) {
            copy($this->getFullImagePath(), \Yii::getAlias('@media') . '/content/' . $newId . '/' . $newImageName);
            copy($this->getFullImagePathThumb(), \Yii::getAlias('@media') . '/content/' . $newId . '/' . 'thumb-'.$newImageName);
        }

        $newElement->image = $newImageName;

        return $newElement->save();
    }
}