<?php
    $server = "37.230.162.205:27015";
    $ip = explode(":", $server);
    $fp = @fsockopen("udp://$ip[0]", $ip[1], $errno, $errstr);
    @stream_set_timeout($fp, 1, 0);
    @stream_set_blocking($fp, true);
    
    $server_name = "unknown";
    $server_online = "<font style=\"color: red;\">Выкл.</font>";
    $server_player = "??";
    $server_maxplayer = "??";
    $server_mapname = "unknown";
    $player = 0;
	$maxplayer = 0;
    if($fp)
    {
        fwrite($fp, "\xFF\xFF\xFF\xFFTSource Engine Query\x00");
        $buffer = fread($fp, 4096);
        fclose($fp);
        
        if($buffer)
        {
            $tmp = explode("\x00", $buffer);
            $place = strlen($tmp[0].$tmp[1].$tmp[2].$tmp[3].$tmp[4]) + 5;
            
            $server_name = $tmp[1];
            $server_online = "<font style=\"color: green;\">Вкл.</font>";
            $player += $server_player = ord($buffer[$place + 1]);
            $maxplayer += $server_maxplayer = ord($buffer[$place]);
            $server_mapname = $tmp[2];
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title>LasPegas</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" href="img/favicon/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
	<!-- Template Basic Images End -->
	
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->

	<link rel="stylesheet" href="css/main.min.css">

</head>

<body>
    <header>
        <nav>
            <div id="brand">
                <img class="logo" src="img/cb3sa-6qme6.svg" width="100" alt="">
                <span id="word-mark" class="logo_title">LasPegas</span>
            </div>
            <div id="menu">
                <div id="menu-toggle">
                    <div id="menu-icon">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <ul style="margin: 0">
                    <li><a class="nav-link" href="#desc">Лор</a></li>
                    <li><a class="nav-link" href="#support">Помощь</a></li>
                    <li><a class="nav-link" href="#donate">Донат</a></li>
                    <li><a class="nav-link" href="#info">Информация</a></li>
                </ul>
            </div>
        </nav>
             
        <div id="hero-section" class="d-flex">
            <div class="welcome">
                <div id="text"></div>
                <div id="mb-text" class="h1 text-center">LasPegas</div>
                <h2 class="text-center"ы>LasPegas - русский DarkRP проект для брони!</h2>
                <p class="h4 text-center welcome_online">Сейчас играет - <?php echo $player ?> <b class="slash">/</b> <?php echo $maxplayer ?></p>
                <a href="#" class="btn-1 welcome_connect">Подключайся!</a>
            </div>
        </div>
    </header>

        <section id="desc" class="bg-prime d-flex align-items-center">
            
            <div class="container">
                    <h2>Лор</h2>
                    <p>
                            Принцесса Твайлайт в очередной раз проводила эксперименты с магией, в итоге у нее получилась настолько сильная магия, что всех пони в Понивиле отправило в человеческий мир.
    В итоге: пони оказавшиеся на планете людской рассы, создали союз между людьми и пони, и основали город Лас-Пегас.
    По началу все было отлично, все дружили и веселились. Но потом несколько пони основали группу против людей, горожане их прозвали “Святые с третьей улицы”. В итоге Лас-Пегас стал самым криминальным городом в Штате Невада…
                        </p>
                
            </div>
        </section>
            
        <section id="support" class="d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="link col-md-8 col-lg-4">
                        <h3 class="">Связь</h3>
                        <div class="sup">
                            <div class="item">
                                <a class="" target="_blank" href="https://vk.com/gkravtsov2000">Григорий Кравцов</a>
                                -
                                <p class="d-inline-block">Основатель</p>
                            </div>
                            <div class="item">
                                <a class="" target="_blank" href="https://vk.com/id518479236">Роман Климов</a>
                                -
                                <p class="d-inline-block">Куратор</p>
                            </div>
                            <div class="item">
                                <a class="" target="_blank" href="https://vk.com/jacorb">Максим Мезенцев</a>
                                -
                                <p class="d-inline-block">Помошник</p>
                            </div>
                        </div>

                    </div>
                    <div class="img col-md-4 col-lg-2">
                        <div class="img-cont">
                            <img src="img/donate-right.jpg" width="200" alt="">
                        </div>
                    </div>
                </div>
                <div class="jobs">
                    <h3 class="text-center">Вакансии</h3>
                    <div class="row jobs-list">
                        
                        <div class="col-md-4 text-center"><i class="fas fa-map"></i><h5>Маппер</h5><p>Создание, доработка карт. Владение - Hammer Editor.</p></div>
                        <div class="col-md-4 text-center"><i class="fas fa-baby"></i><h5>Модельер</h5><p>Создание, доработка моделей, анимаций.</p></div>
                        <div class="col-md-4 text-center"><i class="fas fa-code"></i><h5>Скриптер</h5><p>Создание lua скриптов для сервера, с нуля.</p></div>
                        <div class="col-md-4 text-center"><i class="fas fa-palette"></i><h5>Художник</h5><p>Умение рисовать, владение Photoshop и Illustrator.</p></div>
                        <div class="col-md-4 text-center"><i class="fas fa-vial"></i><h5>Тестер</h5><p>Желательно иметь при себе запас крупнокалиберных читов.</p></div>
                        <div class="col-md-4 text-center"><i class="fas fa-coins"></i><h5>Спонсор</h5><p>Готовность помочь серверу.</p></div>

                    </div>
                </div>
            </div>
        </section>

        <section id="donate" class="prime-bg d-flex align-items-center">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-7 d-flex justify-content-center donate-img">
                        <div class="img-cont">
                            <img src="img/donate-left.jpeg" width="600" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-5">  
                        <h3 class="donate">Донат</h3>
                        <div class="donate-list">
                            <div class="row donate-item">
                                <div class="col-md-6 name">
                                    <p class="text-center">Собственная модель для PointShop</p>
                                </div>
                                <div class="col-md-6 price">
                                    <p class="text-center">200р.</p>
                                </div>
                            </div>
                            <div class="row donate-item">
                                <div class="col-md-6 name">
                                    <p class="text-center">VIP</p>
                                </div>
                                <div class="col-md-6 price">
                                    <p class="text-center">Цена договорная</p>
                                </div>
                            </div>
                            <div class="row donate-item">
                                <div class="col-md-6 name">
                                    <p class="text-center">Валюта</p>
                                </div>
                                <div class="col-md-6 price">
                                    <p class="text-center">1р. = 1000$</p>
                                </div>
                            </div>
                        </div>
                        <p class="link">По поводу доната писать - <a class="" target="_blank" href="https://vk.com/gkravtsov2000">Григорий Кравцов</a></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="info" class="d-flex align-items-center">
                <div class="container">
                    <h2>Информация</h2>
                    <div class="row">
                        <a href="https://vk.com/laspegasdarkrp" class="col-md-4 bor-r">Группа ВК</a>
                        <a href="https://discordapp.com/invite/AZzPn8Z" class="col-md-4 bor-l bor-r">Сервер Дискорд</a>
                        <a href="https://discord.gg/r4ZacDH" class="col-md-4 bor-l">Форум</a>
                        <a href="https://steamcommunity.com/groups/LasPegasProject" class="col-md-6 bor-r">Сообщество Steam</a>
                        <a href="https://steamcommunity.com/sharedfiles/filedetails/?id=1620768104" class="col-md-6 bor-l">Контент сервера</a>
                        <p class="col-md-12">IP сервера - 37.230.162.205:27015</p>
                    </div>
                </div>
        </section>
    <script src="js/scripts.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
