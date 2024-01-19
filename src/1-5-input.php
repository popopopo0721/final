<?php
const SERVER = 'mysql217.phy.lolipop.lan';
const DBNAME = 'LAA1518128-11122';
const USER = 'LAA1518128';
const PASS = 'Pass0726';
$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>1-5-input</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            color: #45a049;
        }

        .button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #45a049;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>特産物ID</th>
            <th>特産物</th>
            <th>生産地</th>
            <th>操作</th>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        foreach ($pdo->query('SELECT * FROM Specialties') as $row) {
            echo '<tr>';
            echo '<td>', $row['specialty_id'], '</td>';
            echo '<td>', $row['specialty_name'], '</td>';
            echo '<td>', $row['production_location'], '</td>';
            echo '<td>';
            echo '<a href="1-5-output.php?id=', $row['specialty_id'], '" class="button">削除</a>';
            echo '</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <p><a href="1-1.php"><button type="button" class="button">Specialties</button></a></p>
</body>

</html>
