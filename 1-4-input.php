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
    <link rel="stylesheet" href="style.css">
    <title>1-4-input</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .table-container {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        .table-row {
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 5px;
        }
        .table-header, .td0, .td1, .td2 {
            padding: 10px;
            text-align: left;
        }
        .th0 {
            flex-basis: 20%;
            background-color: #f2f2f2;
        }
        .th1 {
            flex-basis: 40%;
            background-color: #f2f2f2;
        }
        .td0, .td1 {
            flex-basis: 40%;
        }
        .td2 {
            flex-basis: 20%;
        }
        input[type="text"] {
            width: 100%;
            box-sizing: border-box;
            padding: 5px;
        }
        button {
            padding: 10px;
            margin-top: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>特産物更新</h1>
    <div class="table-container">
        <div class="table-row table-header">
            <div class="th0">特産物ID</div>
            <div class="th1">特産物</div>
            <div class="th1">生産地</div>
            <div class="td2"></div>
        </div>

        <?php
        $pdo = new PDO($connect, USER, PASS);

        foreach ($pdo->query('SELECT * FROM Specialties') as $row) {
            echo '<form action="1-4-output.php" method="post" class="table-row">';
            echo '<input type="hidden" name="id" value="', $row['specialty_id'], '">';
            echo '<div class="td0">', $row['specialty_id'], '</div>';
            echo '<div class="td1"><input type="text" name="specialty_name" value="', $row['specialty_name'], '"></div>';
            echo '<div class="td1"><input type="text" name="production_location" value="', $row['production_location'], '"></div>';
            echo '<div class="td2"><input type="submit" value="更新"></div>';
            echo '</form>';
            echo "\n";
        }
        ?>
    </div>
    <button onclick="location.href='1-1.php'">Specialties</button>
</body>
</html>
