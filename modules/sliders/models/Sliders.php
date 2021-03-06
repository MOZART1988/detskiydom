<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 03.09.2017
 * Time: 21:37
 */

namespace app\modules\sliders\models;


use app\modules\sliders\models\SlidersQuery;
use mongosoft\file\UploadImageBehavior;
use mtemplate\mclasses\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * @property integer $id
 * @property integer $is_active
 *
 * @property string $image
 * @property string $create_date
 * @property string $update_date
 * @property string $text
 * @property string $title
*/

class Sliders extends ActiveRecord
{

    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['title'], 'required'],
            [['text'], 'string'],
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
                'path' => '@webroot/media/sliders/{id}',
                'url' => '@web/media/sliders/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 200, 'quality' => 100],
                ],
            ],
        ];
    }

    public static function find()
    {
        $query = new SlidersQuery(get_called_class());

        return $query;
    }
}