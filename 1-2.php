<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>一覧</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h3 {
            color: #333;
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
    </style>
</head>

<body>
    <h3>一覧</h3>
    <table>
        <tr>
            <th>特産物ID</th>
            <th>特産物</th>
            <th>生産地</th>
        </tr>
        <?php
        $pdo = new PDO('mysql:host=mysql217.phy.lolipop.lan;dbname=LAA1518128-11122;charset=utf8', 'LAA1518128', 'Pass0726');
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
    <p><a href="1-1.php">Specialties</a></p>
</body>

</html>
