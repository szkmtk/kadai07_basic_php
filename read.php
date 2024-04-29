<!DOCTYPE html>
<html>
<head>
    <title>アンケート結果</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f9;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
    </style>
</head>
<body>
    <h1>アンケート結果一覧</h1>
    <table>
        <tr>
            <th>名前</th>
            <th>Email</th>
            <th>好きな本</th>
            <th>理由</th>
        </tr>
        <?php
        $filename = 'data/data.txt';
        if (file_exists($filename)) {
            $file = fopen($filename, 'r');
            while ($line = fgets($file)) {
                list($name, $email, $book, $reason) = explode('|', trim($line));
                echo "<tr><td>{$name}</td><td>{$email}</td><td>{$book}</td><td>{$reason}</td></tr>";
            }
            fclose($file);
        }
        ?>
    </table>
</body>
</html>
