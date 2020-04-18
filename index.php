<h3>Содержимое базы...
    <h3>
        <?php
        /*
         * конфиг базы данных на хостинге
         */
        $db = [
            'host' => 'localhost',
            'user' => 'id10720167_tup',
            'password' => 'qwe123',
            'database' => 'id10720167_dbase'
        ];
        /*
         * конфиг базы данных на локальной машине
         */
        $db = [
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'dbase'
        ];

        $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
        $result = mysqli_query($link, 'SELECT * FROM users');
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        ?>
        <style>
            table {
                border: 1px solid black;
            }

            td {
                border: 1px solid black;
            }
        </style>
        <table>
            <?php foreach ($arr as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['login'] ?></td>
                    <td><?= $item['password'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
