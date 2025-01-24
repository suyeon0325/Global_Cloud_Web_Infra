<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 조회</title>
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

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
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

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .info {
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>회원 조회</h1>
        <?php
        // 데이터베이스 연결
        $conn = new mysqli("dbsrv.idcseoul.internal", "user1", "qwe123", "sqlDB");

        // 연결 오류 확인
        if ($conn->connect_error) {
            die("데이터베이스 연결 실패: " . $conn->connect_error);
        }

        // 회원 데이터 가져오기
        $sql = "SELECT userID, name, birthYear, addr, mobile1 FROM members";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>아이디</th><th>이름</th><th>생년월일</th><th>이메일</th><th>전화번호</th></tr>";
            // 데이터 출력
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["userID"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["birthYear"] . "</td>";
                echo "<td>" . $row["addr"] . "</td>";
                echo "<td>" . $row["mobile1"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>등록된 회원이 없습니다.</p>";
        }

        // 연결 종료
        $conn->close();
        ?>
        <div class="info">문의: hyzzangg@nate.com / BlueJasmine CORP.</div>
    </div>
</body>
</html>
