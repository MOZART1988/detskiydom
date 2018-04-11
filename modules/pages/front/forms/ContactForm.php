<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 11.04.18
 * Time: 2:51 PM
 */

namespace app\modules\pages\front\forms;


use yii\base\Model;
use yii\helpers\Html;

/**
 *
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $message
 */
class ContactForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $message;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email'], 'required'],
            [['email'], 'email'],
            [['name', 'phone', 'message'], 'safe']
        ];
    }

    public function sendMessage()
    {
        if ($this->validate()) {

            $body = Html::tag('p', 'Имя: ' . $this->name) .
                Html::tag('p' , 'Email: ' . $this->email) .
                Html::tag('p', 'Телефон: ' . $this->phone) .
                Html::tag('p', 'Предложение: '. $this->message);

            $mail = \Yii::$app->mailer->compose()
                ->setTo(\Yii::$app->params['adminEmail'])
                ->setFrom(\Yii::$app->params['fromEmail'])
                ->setSubject('Новое сообщение с сайта')
                ->setHtmlBody($body);

            $mail->send();
        }

        return true;
    }
}