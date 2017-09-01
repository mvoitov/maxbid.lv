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
$name_test_server = 'github';
$isDev = strpos($_SERVER['HTTP_HOST'], $name_test_server) !== false;

if  ($isDev === true) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 5);
}

require('./../../common/lib/vendor/autoload.php');
require('./../../common/lib/vendor/yiisoft/yii/framework/yii.php');
require('./../../common/lib/global.php');

Yii::setPathOfAlias('Yiinitializr', './../../common/lib/Yiinitializr');

use Yiinitializr\Helpers\Initializer;

Initializer::create('./../', 'frontend', [
    __DIR__ . '/../../common/config/main.php',
    __DIR__ . '/../../common/config/env.php',
    __DIR__ . '/../../common/config/local.php',
    'main',
    'env',
    'local',
])->run();
?>
<!--    <!DOCTYPE html>-->
<!--<html lang="ru">-->
<!--<head>-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
<!--    <meta http-equiv="Content-Language" content="ru">-->
<!--</head>-->
<!--    <body>-->
<?php
//function auto_translate($text)
//{
//    $key = 'trnsl.1.1.20170901T085332Z.6c3b05e192d0d0a1.f0edb873c622a27173cf3effdb0bebb4c8113822';
//    $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$key.'&text='.urlencode($text).'&lang=ru-en';
//    $data = file_get_contents($url);
//    $result = json_decode($data,true);
//    return $result['text'][0];
//}
//function cleanString($text) {
//    $utf8 = array(
//        '/[áàâãªä]/u'   =>   'a',
//        '/[ÁÀÂÃÄ]/u'    =>   'A',
//        '/[ÍÌÎÏ]/u'     =>   'I',
//        '/[íìîï]/u'     =>   'i',
//        '/[éèêë]/u'     =>   'e',
//        '/[ÉÈÊË]/u'     =>   'E',
//        '/[óòôõºö]/u'   =>   'o',
//        '/[ÓÒÔÕÖ]/u'    =>   'O',
//        '/[úùûü]/u'     =>   'u',
//        '/[ÚÙÛÜ]/u'     =>   'U',
//        '/ç/'           =>   'c',
//        '/Ç/'           =>   'C',
//        '/ñ/'           =>   'n',
//        '/Ñ/'           =>   'N',
//        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
//        '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
//        '/[“”«»„]/u'    =>   ' ', // Double quote
//        '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
//    );
//    return quotemeta(preg_replace(array_keys($utf8), array_values($utf8), $text));
//}
//$servername = "localhost";
//$username = "root";
//$password = "zxcasdqwe123!";
//$dbname = "maxbid";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//$conn->query("SET NAMES 'utf8'");
//$conn->query("SET CHARACTER SET 'utf8'");
//$conn->query("SET SESSION collation_connection = 'utf8_general_ci'");
//$array;
////echo "Connected successfully";
//$sql = "SELECT `id_city`,`name` FROM `city`";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
////        echo "id: " . $row["id_city"]. " - Name: " . auto_translate($row["name"]). "<br>";
//
//        $array[$row["id_city"]] = auto_translate($row["name"]);
//    }
//} else {
//    echo "0 results";
//}
//reset($array);
//$first_key = key($array);
//echo $first_key;
//for($i=$first_key;$i<sizeof($array);$i++){
//    echo $array[$i]."<br>";
//    $sql = "UPDATE `city` SET `name`='".cleanString($array[$i])."' WHERE `id_city`=".$i.";";
//
//    if ($conn->query($sql) === TRUE) {
////        echo "Record updated successfully";
//    } else {
//        echo "Error updating record: " . $conn->error."<br>";
//    }
//}
//
//?>
<!--    </body>-->
<!--</html>-->
