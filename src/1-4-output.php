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
    <title>1-4-output</title>
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
            color: green;
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

if (empty($_POST['specialty_name'])) {
    echo '<p class="error">特産物をを入力してください</p>';
} elseif (empty($_POST['production_location'])) {
    echo '<p class="error">生産地を入力してください。</p>';
} else {
    $sql = $pdo->prepare('UPDATE Specialties SET specialty_name=?, production_location=? WHERE specialty_id=?');

    // バインドパラメータを設定
    $sql->bindParam(1, $_POST['specialty_name']);
    $sql->bindParam(2, $_POST['production_location']);
    $sql->bindParam(3, $_POST['id']);

    // SQLクエリを実行
    if ($sql->execute()) {
        echo '<p class="success">更新に成功しました。</p>';
    } else {
        echo '<p class="error">更新に失敗しました。</p>';
    }
}
?>

<hr>
<table>
<tr><th>特産物ID</th><th>特産物</th><th>生産地</th></tr>
    <?php
    foreach ($pdo->query('SELECT * FROM Specialties') as $row) {
        echo '<tr>';
        echo '<td>', $row['specialty_id'], '</td>';
        echo '<td>', $row['specialty_name'], '</td>';
        echo '<td>', $row['production_location'], '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
</table>
<button onclick="location.href='1-1.php'">Specialties</button>
<button onclick="location.href='1-4-input.php'">更新画面へ戻る</button>

</body>
</html>
