<h3>Содержимое базы...</h3>
<?php

include $_SERVER['DOCUMENT_ROOT'] .
    '/services/Autoload.php';
spl_autoload_register(
    [new Autoload(),
        'loadClass']
);

\App\main\App::call()->run();

//$config = require_once $_SERVER['DOCUMENT_ROOT'] . '/main/config.php';
//$db = $config['db'];
//
//$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
//$result = mysqli_query($link, 'SELECT * FROM users');
//while ($row = mysqli_fetch_assoc($result)) {
//    $arr[] = $row;
//}
//
//
//?>
<!--<style>-->
<!--    table {-->
<!--        border: 1px solid black;-->
<!--    }-->
<!---->
<!--    td {-->
<!--        border: 1px solid black;-->
<!--    }-->
<!--</style>-->
<!---->
<!--<table>-->
<!--    --><?php //foreach ($arr as $item): ?>
<!--        <tr>-->
<!--            <td>--><?//= $item['id'] ?><!--</td>-->
<!--            <td>--><?//= $item['login'] ?><!--</td>-->
<!--            <td>--><?//= $item['password'] ?><!--</td>-->
<!--        </tr>-->
<!--    --><?php //endforeach ?>
<!--</table>-->
