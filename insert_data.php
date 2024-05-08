<?php
// معلومات الاتصال بقاعدة البيانات على Azure SQL Database
$host = 'tcp:sqldatabaseajbas.database.windows.net,1433'; // استبدل 'your_server_name' باسم الخادم الخاص بك
$dbname = 'AJBAS'; // استبدل 'your_database_name' باسم قاعدة البيانات الخاصة بك
$username = 'sqladmin'; // استبدل 'your_username' بالمستخدم الخاص بك
$password = 'Sabja1122**'; // استبدل 'your_password' بكلمة المرور الخاصة بك

// إنشاء اتصال
$connection = odbc_connect("Driver={ODBC Driver 17 for SQL Server};Server=$host;Database=$dbname;", $username, $password);

// التحقق من نجاح الاتصال
if ($connection) {
    echo "تم الاتصال بنجاح!<br>";

        // التحقق من قدوم البيانات من النموذج
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // تأكد من أن المتغيرات معرفة
            $workerID = $_POST['worker'];
            $productID = $_POST['product'];
            $thickness = $_POST['thickness'];
            $length = $_POST['length'];
            $width = $_POST['width'];
            $weight = $_POST['weight'];
    
            // استعلام لجلب اسم العامل من جدول العمال
            $query_worker_name = "SELECT WorkerName FROM Workers WHERE WorkerID = $workerID";
            $result_worker_name = odbc_exec($connection, $query_worker_name);
            $workerName = odbc_result($result_worker_name, 'WorkerName');
    
            // تنفيذ استعلام SQL لإدخال البيانات إلى الجدول WorkeProductivity
            $sql_work_productivity = "INSERT INTO WorkeProductivity (WorkerID, ProductID, Thickness, Length, Width, Weight) VALUES ('$workerID', '$productID', '$thickness', '$length', '$width', '$weight')";
            $result_work_productivity = odbc_exec($connection, $sql_work_productivity);
            if ($result_work_productivity) {
                echo "تم إدخال البيانات بنجاح!";
            } else {
                echo "خطأ في إدخال البيانات: " . odbc_errormsg();
            }
        }
    
    } else {
        die("فشل الاتصال: " . odbc_errormsg());
    }
    
    // إغلاق الاتصال
    odbc_close($connection);
    ?>