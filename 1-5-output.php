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
    <title>1-5</title>
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
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('delete from Specialties where specialty_id=?');
    if ($sql->execute([$_GET['id']])) {
        echo '<p style="color: red;">削除に成功しました。</p>';
    } else {
        echo '<p style="color: red;">削除に失敗しました。</p>';
    }
?>
<br><hr><br>
<table>
<tr>
        <th>特産物ID</th>
        <th>特産物</th>
        <th>生産地</th>
</tr>
        <?php
    foreach ($pdo->query('select * from Specialties') as $row) {
        echo '<tr>';
        echo '<td>', $row['specialty_id'], '</td>';
        echo '<td>', $row['specialty_name'], '</td>';
        echo '<td>', $row['production_location'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
<form action="1-5-input.php" method="post">
    <button type="submit">削除画面へ戻る</button>
    <a href="1-1.php"><button type="button" class="button is-primary">Specialties</button></a>
</form>
</body>
</html>
