<?php
/**
 * @var \app\modules\poll\models\Poll[] $poll
 * @var \app\modules\custom_variables\models\CustomVariables $pollTitle
 * @var \app\modules\poll\front\components\widgets\PollForm $model
*/
use yii\widgets\ActiveForm;
?>


<div class="modal fade" tabindex="-1" id="quiz-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <h2 class="yellow-title">Опрос</h2>
            </div>
            <div class="modal-body">
                <div class="quiz-block">
                    <p><?=$pollTitle->value?></p>
                    <?php if (\Yii::$app->session->get('voted', 0) !== 'yes') : ?>
                        <?php $form = ActiveForm::begin(['id' => 'poll-form', 'action' => \yii\helpers\Url::to(['/poll/default/send-poll'])]); ?>
                        <?= $form->field($model, 'answerId')->radioList(\app\modules\poll\models\Poll::getAllAnswers(),
                            [
                                'item' => function($index, $label, $name, $checked, $value) {
                                    return '
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="'.$name.'" id="optionsRadios" value="'.$value.'" '.$checked.'>
                                            '.$label.'
                                    </label>
                                </div>';
                                }
                            ])->label(false); ?>

                        <button type="submit" class="btn btn--orangelight">Проголосовать</button>
                        <?php ActiveForm::end()?>
                    <?php endif; ?>
                    <div class="quiz-results">
                        <?php foreach ($poll as $answer) : ?>
                            <div class="quiz-rezult">
                                <div class="quiz-answer"><?=$answer->answer?></div>
                                <div class="quiz-answer--value">
                                    <span><?=$answer->getPrecentAnswer()?>%</span>
                                    <div class="quiz-answer--progress">
                                        <div class="progress-filled first" style="width: <?=$answer->getPrecentAnswer()?>%"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                    </div>
                </div>
            </div>
        </div><!-- end .modal-content -->
    </div><!-- end .modal-dialog -->
</div><!-- end .modal -->
