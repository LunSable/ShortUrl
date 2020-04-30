<?php
    $h = "QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890"; 
    $rand = substr(str_shuffle($h), 0, 5); 
    $site = ""; 
    $url = $_REQUEST['url'];
    //echo $url;
    if ($_REQUEST['submit']) {
        echo "<div class='intro_save' id='box' > <div class='intro_textsave'>Вот сокращенная ссылка <a href='$site/a/$rand.php' target='_blank' class='intro_cut'>$site/a/$rand</a><a href='/' class='intro_button_two'>ОК</a></div></div>"; 
        $f = fopen("a/$rand.php", "w"); 
        fwrite($f, "<?php header('Location: $url') ?>"); 
        fclose($f); 
        $fh = fopen(".htaccess", "a"); 
        fwrite($fh, "
        RewriteRule ^$rand$ /a/$rand.php"); 
        fclose($fh); 
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
