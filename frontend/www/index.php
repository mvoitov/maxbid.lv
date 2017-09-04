<?php
/**
 *
 * Bootstrap index file
 *
 * @author    Antonio Ramirez <amigo.cobos@gmail.com>
 * @link      http://www.ramirezcobos.com/
 * @link      http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

// part of url, for working with Debug mode
//$name_test_server = 'github';
//$isDev = strpos($_SERVER['HTTP_HOST'], $name_test_server) !== false;
//
//if  ($isDev === true) {
//    defined('YII_DEBUG') or define('YII_DEBUG', true);
//    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 5);
//}
//
//require('./../../common/lib/vendor/autoload.php');
//require('./../../common/lib/vendor/yiisoft/yii/framework/yii.php');
//require('./../../common/lib/global.php');
//
//Yii::setPathOfAlias('Yiinitializr', './../../common/lib/Yiinitializr');
//
//use Yiinitializr\Helpers\Initializer;
//
//Initializer::create('./../', 'frontend', [
//    __DIR__ . '/../../common/config/main.php',
//    __DIR__ . '/../../common/config/env.php',
//    __DIR__ . '/../../common/config/local.php',
//    'main',
//    'env',
//    'local',
//])->run();
?>
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="ru">
<!--    <script>-->
<!--        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){-->
<!--            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),-->
<!--            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)-->
<!--        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');-->
<!---->
<!--        ga('create', 'UA-105780054-1', 'auto');-->
<!--        ga('send', 'pageview');-->
<!---->
<!--    </script>-->
</head>
    <body>
<?php
function auto_translate($text)
{
    $key = 'trnsl.1.1.20170901T085332Z.6c3b05e192d0d0a1.f0edb873c622a27173cf3effdb0bebb4c8113822';
    $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$key.'&text='.urlencode($text).'&lang=ru-en';
    $data = file_get_contents($url);
    $result = json_decode($data,true);
    return $result['text'][0];
}
$servername = "localhost";
$username = "root";
$password = "zxcasdqwe123!";
$dbname = "maxbid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
$conn->query("SET CHARACTER SET 'utf8'");
$conn->query("SET SESSION collation_connection = 'utf8_general_ci'");
$array;
//echo "Connected successfully";
$from = $_GET['from'];
$to = $_GET['to'];
echo $from." -> ".$to;
$sql = "SELECT `id_city`,`name` FROM `city` WHERE  `id_city` >".$from." AND `id_city` < ".$to.";";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id_city"]. " - Name: " . auto_translate($row["name"]). "<br>";

        $array[$row["id_city"]] = auto_translate($row["name"]);
    }
} else {
    echo "0 results";
}
reset($array);
$first_key = key($array);
echo $first_key;
for($i=$first_key;$i<$first_key+sizeof($array);$i++){
    echo $array[$i]."<br>";
    $sql = "UPDATE `city` SET `name`='".$array[$i]."' WHERE `id_city`=".$i.";";

    if ($conn->query($sql) === TRUE) {
//        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error."<br>";
    }
}

?>
    </body>
</html>
