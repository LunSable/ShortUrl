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