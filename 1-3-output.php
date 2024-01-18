<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>1-3-output</title>
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
            background-color: #45a049; /* 緑色に変更 */
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
            background-color: #4caf50; /* ホバー時の色を変更 */
            color: white;
        }

        /* エラーメッセージを左寄せにするスタイル */
        .error-message {
            text-align: left;
            color: red;
        }
    </style>
</head>

<body style="text-align: center;">
    <?php
    const SERVER = 'mysql217.phy.lolipop.lan';
    const DBNAME = 'LAA1518128-11122';
    const USER = 'LAA1518128';
    const PASS = 'Pass0726';
    $connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
    $pdo = new PDO($connect, USER, PASS);

    // Prepare the SQL statement without specifying musicde_id
    $sql = $pdo->prepare('INSERT INTO Specialties(specialty_name, production_location) VALUES (?, ?)');

    if (empty($_POST['specialty_name'])) {
        echo '<div class="error-message">特産物を入力してください。</div>';
    } elseif (empty($_POST['production_location'])) {
        echo '<div class="error-message">生産地を入力してください。</div>';
    } else {
        // Execute the SQL statement with specialty_name and production_location
        $sql = "INSERT INTO Specialties (specialty_name, production_location) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$_POST['specialty_name'], $_POST['production_location']])) {
            echo '<div class="error-message" style="color: red;">追加に成功しました。</div>';
        } else {
            echo '<div class="error-message" style="color: red;">追加に失敗しました。</div>';
        }
    }
    ?>
    <br><hr><br>
    <table style="margin: 0 auto;">
        <tr>
            <th>特産物ID</th>
            <th>特産物</th>
            <th>生産地</th>
        </tr>
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
    <form action="1-1.php" method="post">
        <button type="submit">Specialties</button>
    </form>
</body>

</html>
