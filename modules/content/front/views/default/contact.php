<div class="container">
    <div class="content">
        <h1 class="yellow-title"><?=\Yii::t('front', 'Контакты')?></h1>
        <div class="map-block">
            <div id="map"></div>
            <script>
                function initMap()
                {
                    // Styles a map in night mode.
                    var map = new google.maps.Map(document.getElementById('map'),
                        {
                            center:
                                {
                                    lat: 43.244765,
                                    lng: 76.9423854
                                },
                            zoom: 14,
                        }),
                        image = {
                            url: '/images/marker.png',
                            // This marker is 20 pixels wide by 32 pixels high.
                            scaledSize: new google.maps.Size(97, 132), // scaled size
                        },
                        marker = new google.maps.Marker(
                            {
                                position:
                                    {
                                        lat: 43.244765,
                                        lng: 76.9423854
                                    },
                                map: map,
                                icon: image
                            });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm-ZPzgEG3fHT03nU0uM-KAlz46d-Ou5w&callback=initMap" async defer></script>
        </div>
        <div class="contacts-list">
            <div class="contact-item">
                <span><?=\Yii::t('front', 'Адрес:')?></span>
                <p><?=\Yii::t('front', 'г. Алматы, ул. Кабдолова, 26, здание МЦ "Авиценна", вход слеваг. Алматы, ул. Кабдолова, 26, здание МЦ "Авиценна", вход слева')?></p>
            </div>
            <div class="contact-item">
                <span><?=\Yii::t('front', 'Телефоны:')?></span>
                <p>+7(701) 794-12-95</p>
                <p>+7(777) 591-00-77</p>
                <p>+7(777) 888-80-98</p>
            </div>
            <div class="contact-item">
                <span><?=\Yii::t('front', 'Электронная почта:')?></span>
                <p>e-mail:kunbala.fund@gmail.com</p>
            </div>
        </div>
        <div class="contact-form">
            <div class="form-text"> <?=\Yii::t('front', 'Обратная связь:')?> </div>
            <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'sidebar-contact-widget', 'action' => \yii\helpers\Url::to(['/pages/default/send-form/'])]); ?>
                <?= $form->field($model, 'name')->textInput(['placeholder' => \Yii::t('front', 'Имя')])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => \Yii::t('front', 'Электронная почта')])->label(false) ?>
                <?= $form->field($model, 'message')->textarea([
                'placeholder' => \Yii::t('front', 'Ваши предложения'),
                'rows' => 7
                ])->label(false) ?>
                <button type="submit" class="btn btn--form"><?=\Yii::t('front', 'ОТПРАВИТЬ')?></button>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>
</div>