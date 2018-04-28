<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 28.04.18
 * Time: 12:45 PM
 */

namespace app\components;


use dosamigos\ckeditor\CKEditor;

use Yii;
use iutbay\yii2kcfinder\KCFinderAsset;
use yii\helpers\ArrayHelper;

class CustomCkeditor extends CKEditor
{
    public $enableKCFinder = true;

    /**
     * Registers CKEditor plugin
     */
    protected function registerPlugin()
    {
        if ($this->enableKCFinder)
        {
            $this->registerKCFinder();
        }

        parent::registerPlugin();
    }

    protected function registerKCFinder()
    {

        $_SESSION['KCFINDER'] = [

            'disabled' => false,
            'uploadURL'=>'/upload',
            'uploadDir'=>Yii::getAlias('@media/upload')

        ];

        $register = KCFinderAsset::register($this->view);
        $kcfinderUrl = $register->baseUrl;

        $browseOptions = [
            'filebrowserBrowseUrl' => $kcfinderUrl . '/browse.php?opener=ckeditor&type=files',
            'filebrowserUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=files',
            'filebrowserImageBrowseUrl' => $kcfinderUrl . '/browse.php?opener=ckeditor&type=images',
            'filebrowserImageUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=images',
        ];

        $this->clientOptions = ArrayHelper::merge($browseOptions, $this->clientOptions);
    }
}