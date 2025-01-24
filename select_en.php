<?php
$conn = new mysqli("dbsrv.idcsingapore.internal", "user1", "qwe123", "sqlDB");

if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

$sql = "SELECT userID, name, mobile, birthYear, email FROM userTBL";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 600px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Membership inquiry</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>NAME</th><th>MobilePhone</th><th>Birthday</th><th>email</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["userID"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td>";
            echo "<td>" . $row["birthYear"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>등록된 회원이 없습니다.</p>";
    }
    $conn->close();
    ?>
    <div class="info">hyzzangg@nate.com / BlueJasmine CORP.</div>
</div>
</body>
</html>
