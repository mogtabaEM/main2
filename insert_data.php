<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Insert Data</title>
</head>
<?php
// معلومات الاتصال بقاعدة البيانات
$host = 'tcp:sqldatabaseajbas.database.windows.net,1433';
$dbname = 'AJBAS';
$username = 'NewLogin';
$password = 'Surnar321*';

// إنشاء اتصال
$connection = odbc_connect("Driver={ODBC Driver 17 for SQL Server};Server=$host;Database=$dbname;", $username, $password);

// التحقق من نجاح الاتصال
if ($connection) {
    // التحقق من قدوم البيانات من النموذج
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // استلام البيانات من النموذج
        $product = isset($_POST['product']) ? $_POST['product'] : '';
        $thickness = isset($_POST['thickness']) ? $_POST['thickness'] : '';
        $width = isset($_POST['width']) ? $_POST['width'] : '';
        $length = isset($_POST['length']) ? $_POST['length'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';

        // التحقق من أن جميع الحقول ليست فارغة
        if (!empty($product) && !empty($thickness) && !empty($width) && !empty($length) && !empty($weight)) {
            // توليد قيمة فريدة لحقل Id
            $id = uniqid();

            // تنفيذ الاستعلام لإدخال البيانات
            $sql = "INSERT INTO WorkeProductivity (Id, product, Thickness, Width, length, Weight) VALUES ('$id', '$product', '$thickness', '$width', '$length', '$weight')";
            $result = odbc_exec($connection, $sql);
            if ($result) {
                echo "تم إدخال البيانات بنجاح!";
                // استعلام SQL لاسترداد آخر 3 إضافات
$sql_last_3 = "SELECT TOP 3 * FROM WorkeProductivity ORDER BY Id DESC"; // افترض أن Id هو الرقم التسلسلي للإضافات

// تنفيذ الاستعلام
$result_last_3 = odbc_exec($connection, $sql_last_3);

// عرض البيانات في DataGridView
echo "<h2>آخر 3 إضافات:</h2>";
echo "<table border='1'>";
echo "<tr><th>Id</th><th>Product</th><th>Thickness</th><th>Width</th><th>Length</th><th>Weight</th></tr>";

// حلق عبر النتائج وعرض كل سجل في DataGridView
while ($row = odbc_fetch_array($result_last_3)) {
    echo "<tr><td>".$row['Id']."</td><td>".$row['product']."</td><td>".number_format($row['Thickness'], 4)."</td><td>".$row['Width']."</td><td>".$row['length']."</td><td>".number_format($row['Weight'], 4)."</td></tr>";
}

echo "</table>";
            } else {
                echo "حدث خطأ أثناء إدخال البيانات: " . odbc_errormsg();
            }
        } else {
            echo "يرجى ملء جميع الحقول!";
        }
    }
} else {
    die("فشل الاتصال: " . odbc_errormsg());
}
if ($result) {
    echo "تم إدخال البيانات بنجاح!";
    // إضافة زر "رجوع إلى صفحة الإدخال"
    echo "<form action='index.php'><input type='submit' value='رجوع إلى صفحة الإدخال'></form>";
    // باقي الكود ...
}
else {
    echo "حدث خطأ أثناء إدخال البيانات: " . odbc_errormsg();
    // إضافة زر "رجوع إلى صفحة الإدخال"
    echo "<form action='index.php'><input type='submit' value='رجوع إلى صفحة الإدخال'></form>";
}
// إغلاق الاتصال
odbc_close($connection);
?>