<script src="//yandex.st/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(function () {
        var myMap;
        ymaps.geolocation.get().then(function (res) {
            var mapContainer = $('#map'),
                bounds = res.geoObjects.get(0).properties.get('boundedBy'),
            // Рассчитываем видимую область для текущей положения пользователя.
                mapState = ymaps.util.bounds.getCenterAndZoom(
                    bounds,
                    [mapContainer.width(), mapContainer.height()]
                );
            createMap(mapState);
        }, function (e) {
            // Если место положение невозможно получить, то просто создаем карту.
            createMap({
                center: [55.751574, 83],
                zoom: 12,
                controls: ['zoomControl','geolocationControl']
            });
        });

        function createMap (state) {
            state.zoom = 12;
            //определяем контроллеры на карте
            state.controls = ['zoomControl','geolocationControl'];
            //создание карты с параметрами пользователя
            myMap = new ymaps.Map('map', state);
            //добавление метки для примера
            myMap.geoObjects.add(new ymaps.Placemark([55,83], {
                balloonText: 'lol'
            },
                {
                    //Свое изображение на метке
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#image',
                    // Своё изображение иконки метки.
                    iconImageHref: '/freelens.us/images/myIcon.png',
                    // Размеры метки.
                    iconImageSize: [25, 32],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-12.5, -32]

            }));


        //запрашиваем все данные по меткам из БД
        $.getJSON("<?php echo Yii::app()->urlManager->createUrl('map/getmap'); ?>",
            function(json){
               for (i = 0; i < json.markers.length; i++) {
                    var myPlacemark = new ymaps.Placemark([json.markers[i].lat,json.markers[i].lon], {
                        // Свойства
                        balloonContentBody: json.markers[i].balloonText
                    }, {
                        // Опции
                        preset: json.markers[i].stylePlacemark
                    }
                    );

                    // Добавляем метку на карту
                    myMap.geoObjects.add(myPlacemark);

                }
            });

}


    });







</script>

<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<h1>Welcome!</h1>
<!--<p>Этот сервис предназначен для поиска фотографов и интересных мест для съемки.-->
<!--    На карте вы можете выбрать интересные места и заказать съемку именно в этом месте. Также можете указать свое место, где бы вы хотели пофотографироваться. </p>-->

<div id="map"></div>
<a href="/freelens.us/images/myIcon.png"> lol </a>
















<!--<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ru/maps?ie=UTF8&amp;ll=55.031638,82.921715&amp;spn=0.024276,0.063643&amp;t=m&amp;z=15&amp;output=embed"></iframe><br />-->



