<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدخال بيانات جديدة</title>
    <style>
        body {
            background-image: url('Desktop/OIP.jpg');
            background-repeat: repeat;
            background-position: top right;
            background-size: auto;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: yellow;
            padding: 10px;
            text-align: center;
            color: black;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #3498db;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: yellow;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
        }

        input[type="text"], input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .blue-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #3498db;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>مصنع اجباس</h1>
    </div>
    <div class="container">
        <h2>إدخال بيانات جديدة</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="workID">رقم العمل:</label><br>
            <input type="text" id="workID" name="workID"><br>
            <label for="thickness">السمك:</label><br>
            <input type="text" id="thickness" name="thickness"><br>
            <label for="description">الوصف:</label><br>
            <input type="text" id="description" name="description"><br>
            <label for="length">الطول:</label><br>
            <input type="text" id="length" name="length"><br>
            <label for="width">العرض:</label><br>
            <input type="text" id="width" name="width"><br>
            <label for="weight">الوزن:</label><br>
            <input type="text" id="weight" name="weight"><br>
            <label for="count">العدد:</label><br>
            <input type="text" id="count" name="count"><br><br>
            <input type="submit" value="إرسال">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // معلومات اتصال بقاعدة البيانات
        $serverName = "sqldatabaseajbas.database.windows.net";
        $connectionOptions = array(
            "Database" => "AJBAS",
            "Uid" => "sqladmin",
            "PWD" => "Sabja1122**"
        );

        // إنشاء الاتصال
        $conn = sqlsrv_connect($serverName, $connectionOptions);

        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // استخراج البيانات من النموذج
        $workID = $_POST['workID'];
        $thickness = $_POST['thickness'];
        $description = $_POST['description'];
        $length = $_POST['length'];
        $width = $_POST['width'];
        $weight = $_POST['weight'];
        $count = $_POST['count'];
        $isActive = 1; // يمكنك تعيينها بشكل ثابت للحقل "IsActive" هنا
        $insertedBy = 1; // يمكنك تعيينها بشكل ثابت للحقل "InsertedBy" هنا
        $insertedDate = date('Y-m-d H:i:s'); // التاريخ والوقت الحالي

        // تنفيذ استعلام SQL لإدراج البيانات
        $sql = "INSERT INTO WorkeProductivity (workID, Thickness, Description, length, Width, Weight, count, IsActive, InsertedBy, InsertedDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($workID, $thickness, $description, $length, $width, $weight, $count, $isActive, $insertedBy, $insertedDate);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        echo "تم إدخال البيانات بنجاح.";

        sqlsrv_close($conn);
    }
    ?>

    </div>
</body>
</html>