<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->

<!-- <html lang="ru-RU"> -->
<head>
	<meta charset="UTF-8">
	<title>Сокращатель ссылок</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/CSS/style_about.css">
  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>
        <div class="wrapper">
          <div class="intro">
            <div class="intro-container">
              <div class="intro_block">
                <div class="intro_empty"></div>
                  <div class="intro_textblock">
                      <div class="intro_textmain"><p>Сократитель ссылок</p></div>
                      <div class="intro_textname"><p>Введите URL-адрес для сокращения</p></div>
                  </div>
                  <div class="intro_empty"></div>
                </div>
                <div class="intro_button_block">
                    <form action="" metod="post">
                        <input name="url" class="intro_text" type="url"  required placeholder="Введите ссылку..." >
                        <input type="submit" name="submit" value="Сократить" class="intro_button" id="submit">
                    </form>
                </div>
                
                <?php
                    $h = "QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890"; //Выбираем символы, из которых будет состоять наш рандом
                    $rand = substr(str_shuffle($h), 0, 5); //создаём ранд. Цифра 5 обозначает длину ранда
                    $site = ""; //Адрес вашего сайта. Слэш обязателен!
                    $url = $_REQUEST['url'];
                    //echo $url;
                    if ($_REQUEST['submit']) {
                        echo "<div class='intro_save' id='box' > <div class='intro_textsave'>Вот сокращенная ссылка <a href='$site/a/$rand.php' target='_blank' class='intro_cut'>$site/a/$rand</a><a href='/' class='intro_button_two'>ОК</a></div></div>"; //выводим пользователю ссылку, в виде ссылки
                        $f = fopen("a/$rand.php", "w"); //Создаём файл с именем ранда. Я решил скидывать файлы в каталог a, поэтому не забудьте его создать!
                        fwrite($f, "<?php header('Location: $url') ?>"); //И записываем в код редиректа, с ссылкой которую ввёл пользователь
                        fclose($f); //Закрываем файл
                        $fh = fopen(".htaccess", "a"); //Открываем файл .htaccess с дозаписью на последний байт
                        fwrite($fh, "
                        RewriteRule ^$rand$ /a/$rand.php"); //Записываем ссылку на файл в каталоге a и её сокращённый вариант, который был дан пользователю. !ВНИМАНИЕ! Перенос сделан специально, иначе всё будет писаться в плотную и вызовет 500 ошибку!
                        fclose($fh); //Закрываем файл 
                    }
                ?>
               <script>
                    $('#submit').on('click', function(){
                    $.ajax({
                      url: 'index.php',
                      success: function(data) {
                      //alert('Success')
                      }
                    });
                    });
              </script>
            </div>
            </div>
          </div>  
        </div>
        
</body>
</html>

