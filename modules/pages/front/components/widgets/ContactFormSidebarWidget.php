<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 11.04.18
 * Time: 3:00 PM
 */

namespace app\modules\pages\front\components\widgets;


use app\modules\pages\front\forms\ContactForm;
use yii\base\Widget;

class ContactFormSidebarWidget extends Widget
{
    public function run()
    {
        parent::run();

        $model = new ContactForm();

        return $this->render('contactFormWidget', ['model' => $model]);
    }
}