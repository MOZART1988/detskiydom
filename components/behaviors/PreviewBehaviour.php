<?php
/**
 * @var \yii\db\ActiveRecord $this->owner
 */

namespace app\components\behaviors;

use Imagine\Image\ManipulatorInterface;
use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Exception;

class PreviewBehaviour extends Behavior
{
    public $previews;
    public $attribute;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'createPreview',
            ActiveRecord::EVENT_AFTER_UPDATE => 'createPreview'
        ];
    }

    public function createPreview()
    {
        foreach ($this->previews as $sizes) {
            $suffix = '_' . $sizes[0] . 'x' . $sizes[1];
            if (!is_file($this->getDirectoryPath() . '/' . $suffix . '_' . $this->getImageName())) {
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
    }

    public function getFullImagePath()
    {
        return
            Yii::getAlias('@webroot') . '/media/' . $this->owner->tableName() . '/'.$this->owner->id.'/' . $this->owner->{$this->attribute};
    }

    public function getImageName()
    {
        if (is_file($this->getFullImagePath())) {
            return basename($this->getFullImagePath());
        }

        throw new Exception('File not found');
    }

    public function getDirectoryPath()
    {
        return Yii::getAlias('@webroot') . '/media/' . $this->owner->tableName() . '/' . $this->owner->id;
    }

    public static function getImageUrl($tablename, $imageName, $id, $suffix = false)
    {
        if ($suffix) {
            return '/media/' . $tablename . '/'.$id.'/' . $suffix . $imageName;
        }

        return '/media/' . $tablename . '/'.$id.'/' . $imageName;
    }
}