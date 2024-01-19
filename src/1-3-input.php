<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>追加</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: calc(100% - 16px);
            box-sizing: border-box;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            display: block;
            box-sizing: border-box;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>追加</h1>
    <form action="1-3-output.php" method="post">
        <label for="specialty_name">特産物</label>
        <input type="text" id="specialty_name" name="specialty_name" required>
        <label for="production_location">生産地</label>
        <input type="text" id="production_location" name="production_location" required>
        <button type="submit">追加</button>
        <button onclick="location.href='1-1.php'">Specialties</button>
    </form>
</body>

</html>
