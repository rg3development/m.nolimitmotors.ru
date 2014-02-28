<?
    $classSelected_0 = '';
    $classSelected_1 = '';
    $classSelected_2 = '';
    if(!empty($page_info))
    {
        switch ($page_info['url']) {
            case 'catalog': $classSelected_0 = 'class = "selected"';break;
            case 'buyers': $classSelected_1 = 'class = "selected"';break;
            case 'owners': $classSelected_2 = 'class = "selected"';break;
        }
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]--><!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]--><!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]--><!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?=!empty($page_info['keywords']) ? $page_info['keywords'] : $site_settings['keywords'];?>">
    <meta name="description" content="<?=!empty($page_info['description']) ? $page_info['description'] : $site_settings['description'];?>">
    <title><?=$site_settings['title'];?> - <?=$page_info['title'];?></title>
    <link rel="stylesheet" href="/www_site/css/style.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <script src="http://api-maps.yandex.ru/2.0/?load=package.standard,package.geoObjects,package.route&lang=ru-RU" type="text/javascript"></script>
    <script src="http://yandex.st/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script>
        ymaps.ready(init);

        function init() {
            // Данные о местоположении, определённом по IP
            var geolocation = ymaps.geolocation,
            // координаты
                coords = [geolocation.latitude, geolocation.longitude],
                myMap = new ymaps.Map('map', {
                    center: coords,
                    zoom: 4
                });

            myMap.geoObjects.add(
                new ymaps.Placemark(
                    coords,
                    {
                        // В балуне: страна, город, регион.
                        balloonContentHeader: geolocation.country,
                        balloonContent: geolocation.city,
                        balloonContentFooter: 'Ваше местоположение'
                    }
                )
            );

            var myPlacemark_0 = new ymaps.Placemark(
                [55.911314,37.782696],
                {
                    balloonContentHeader: 'Московский филиал No Limit Motors',
                    balloonContent: 'Московская область, г. Мытищи, Мытищинский район, Ярославское шоссе, 118кд',
                    balloonContentFooter: 'тел. +7(495) 788-20-10 <a style = "color: #00f;" href = "mailto:moskva@nolimitmotors.ru">moskva@nolimitmotors.ru</a>'
                }
            );

            var myPlacemark_1 = new ymaps.Placemark(
                [55.833528,49.194470],
                {
                    balloonContentHeader: 'Казанский филиал No Limit Motors',
                    balloonContent: 'Республика Татарстан, г. Казань, ул. Журналистов, 107',
                    balloonContentFooter: 'тел. +7 (843) 5-620-520 <a style = "color: #00f;" href = "mailto:kazan@nolimitmotors.ru">kazan@nolimitmotors.ru</a>'
                }
            );

            var myPlacemark_2 = new ymaps.Placemark(
                [54.955965,83.061926],
                {
                    balloonContentHeader: 'Новосибирский филиал No Limit Motors',
                    balloonContent: 'г. Новосибирск, Бердское шоссе, 63',
                    balloonContentFooter: 'тел. +7 (383) 2-300-400 <a style = "color: #00f;" href = "mailto:novosibirsk@nolimitmotors.ru">novosibirsk@nolimitmotors.ru</a>'
                }
            );

            var myPlacemark_3 = new ymaps.Placemark(
                [54.904119,52.269843],
                {
                    balloonContentHeader: 'Филиал No Limit Motors в г. Альметьевск',
                    balloonContent: 'Республика Татарстан, г. Альметьевск, пр-т Строителей, 10а',
                    balloonContentFooter: 'тел. +7 (8553) 44-15-15 <a style = "color: #00f;" href = "mailto:almetevsk@nolimitmotors.ru">almetevsk@nolimitmotors.ru</a>'
                }
            );

            var iteM = [['Москва', 'Московская область, г. Мытищи, Ярославское шоссе, д. 118, корпус Д', '+7(495) 788-20-10', 'moskva@nolimitmotors.ru'],
                        ['Казань', 'г. Казань, улица Журналистов 107', '+7 (843) 5-620-520', 'kazan@nolimitmotors.ru'],
                        ['Новосибирск', 'г. Новосибирск, Бердское шоссе, 63', '+7 (383) 2-300-400', 'novosibirsk@nolimitmotors.ru'],
                        ['Альметьевск', 'г. Альметьевск, пр-т Строителей, 10а', '+7(8553)44-15-15', 'almetevsk@nolimitmotors.ru']];

            var tmp = 0;
            var whatI = 0;
            var place = [[55.911314,37.782696], [55.833528,49.194470], [54.955965,83.061926], [54.904119,52.269843]];
            for(var i = 0; i < 4; i++)
            {
                coord = calculateDistance(coords[0], coords[1], place[i][0], place[i][1]);
                if(coord < tmp || tmp == 0)
                {
                    tmp = coord;
                    whatI = i;
                }
            }
            $('.city').html(iteM[whatI][0]);
            $('.tel').html(iteM[whatI][2]);

            /*myMap.geoObjects.add(myPlacemark_0);
            myMap.geoObjects.add(myPlacemark_1);
            myMap.geoObjects.add(myPlacemark_2);
            myMap.geoObjects.add(myPlacemark_3);*/

        }

        function calculateDistance(latA, longA, latB, longB) {
            var EARTH_RADIUS = 6372795;

            lat1 = latA * Math.PI / 180;
            lat2 = latB * Math.PI / 180;
            long1 = longA * Math.PI / 180;
            long2 = longB * Math.PI / 180;

            cl1 = Math.cos(lat1);
            cl2 = Math.cos(lat2);
            sl1 = Math.sin(lat1);
            sl2 = Math.sin(lat2);
            delta = long2 - long1;
            cdelta = Math.cos(delta);
            sdelta = Math.sin(delta);

            y = Math.sqrt(Math.pow(cl2 * sdelta, 2) + Math.pow(cl1 * sl2 - sl1 * cl2 * cdelta, 2));
            x = sl1 * sl2 + cl1 * cl2 * cdelta;

            ad = Math.atan2(y, x);
            dist = Math.ceil(ad * EARTH_RADIUS);

            return dist;
        }
    </script>
</head>

<body>
    <div style = 'display: none;' id="map"></div>
    <div id="wrap">
                
        <div class="page">
            <div class="overlay"></div>
            <header class="header">
                <div class="logo"><a href="/"><?=$site_settings['logo'] ? "<img alt='No Limit Motors' src={$site_settings['logo']} />" : '';?></a>сеть BRP центров по России</div>
                <a class="menu yellow_btn" href="#">Menu</a>
                <div class="salon row">
                    <span class="open_sans_font">Ближайший салон:</span><br/>
                    <div class="city"></div>
                    <a href="tel:+7(383)2-300-400" class="tel"></a>
                </div>
                <nav class="menu_sub yellow_btn menu_inner">
                    <ul>
                        <li <?=$classSelected_0;?>><a href="/<? if(!empty($widgets['site_menu'][0][2])) echo $widgets['site_menu'][0][2]->url; ?>"><? if(!empty($widgets['site_menu'][0][2])) echo $widgets['site_menu'][0][2]->title; ?></a></li>
                        <li <?=$classSelected_1;?>><a href="/<? if(!empty($widgets['site_menu'][1][2])) echo $widgets['site_menu'][1][2]->url; ?>"><? if(!empty($widgets['site_menu'][1][2])) echo $widgets['site_menu'][1][2]->title; ?></a></li>
                        <li <?=$classSelected_2;?>><a href="/<? if(!empty($widgets['site_menu'][1][7])) echo $widgets['site_menu'][1][7]->url; ?>"><? if(!empty($widgets['site_menu'][1][7])) echo $widgets['site_menu'][1][7]->title; ?></a></li>
                    </ul>
                </nav>
            </header>       