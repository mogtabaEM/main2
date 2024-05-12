<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدخال بيانات جديدة</title>
    <style>
        body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .header {
            padding: 40px; /* زيادة الهوامش الداخلية للعنصر */
            text-align: center;
            color: #000; /* تغيير لون النص إلى اللون الأسود */
            margin: 0; /* إزالة هوامش العنصر */
            position: absolute; /* تحديد موقع مطلق */
            top: 5%; /* تحديد الموقع إلى النصف العلوي من الصفحة */
            left: 50%; /* تحديد الموقع إلى النصف الأيسر من الصفحة */
            transform: translate(-50%, -50%); /* تعديل الموقع ليكون في وسط الصفحة */
    }

    .container {
        width: 50%;
        margin: auto;
        padding: 20px;
        background-color: #fafafa;
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

    select,
    input[type="submit"] {
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

    .message {
        text-align: center;
        color: green;
        margin-top: 10px;
    }

    /* يتم لصق المؤثرات البصرية هنا */
    body {
        font-family: Arial, sans-serif;
        background-image: url("OIP.jpeg");
        background-size: auto;
        background-position: left top;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error-message {
        color: #ff0000;
        text-align: center;
        margin-top: 10px;
    }
    </style>
</head>
<body>
    <div class="header">
        <h1>مصنع اجباس</h1>
    </div>
    <div class="container">
        <h2>إدخال بيانات جديدة</h2>
        <form id="dataForm" action="insert_data.php" method="post" onsubmit="return validateForm()">
            <label for="product">اسم المنتج:</label><br>
            <select name="product">
                <option value=""> </option>
                <!-- قائمة الخيارات -->
                <option value="Angle(24*24) / 3 mtr">Angle(24*24) / 3 mtr</option>
                <option value="Angle (22*22) / 3mtr(m)">Angle (22*22) / 3mtr(m)</option>
                <option value="C.channel / 3mtr">C.channel / 3mtr</option>
                <option value="Omega(38) / 3mtr">Omega(38) / 3mtr</option>
                <option value="Omega(33) / 3mtr (M)">Omega(33) / 3mtr (M)</option>
                <option value="Stud 41 / 3mtr">Stud 41 / 3mtr</option>
                <option value="Stud 48 / 3mtr">Stud 48 / 3mtr</option>
                <option value="Stud 75 / 3mtr">Stud 75 / 3mtr</option>
                <option value="Stud 100/ 3mtr">Stud 100/ 3mtr</option>
                <option value="Runner 41 / 3mtr">Runner 41 / 3mtr</option>
                <option value="Runner 48 / 3mtr">Runner 48 / 3mtr</option>
                <option value="Runner 75 /3mtr">Runner 75 /3mtr</option>
                <option value="Runner 100 /3mtr">Runner 100 /3mtr</option>
                <option value="Angle (20*20*20*20) W / 3mtr">Angle (20*20*20*20) W / 3mtr</option>
                <option value="Angle (24*24*24*24) W / 3mtr">Angle (24*24*24*24) W / 3mtr</option>
            </select><br>
            <label for="thickness">السماكة</label><br>
            <select name="thickness">
                <option value=""> </option>
                <!-- قائمة الخيارات -->
                <option value="0.35">0.35</option>
                <option value="0.38">0.38</option>
                <option value="0.4">0.4</option>
                <option value="0.45">0.45</option>
                <option value="0.5">0.5</option>
                <option value="0.6">0.6</option>
                <option value="0.8">0.8</option>
            </select><br>
            <label for="width">العرض:</label><br>
            <select name="width">
                <option value=""> </option>
                <!-- قائمة الخيارات -->
                <option value="46">46</option>
                <option value="44">44</option>
                <option value="57">57</option>
                <option value="106">106</option>
                <option value="101">101</option>
                <option value="105">105</option>
                <option value="113">113</option>
                <option value="141">141</option>
                <option value="166">166</option>
                <option value="84">84</option>
                <option value="93">93</option>
                <option value="120">120</option>
                <option value="145">145</option>
                <option value="84">84</option>
                <option value="102">102</option>
            </select><br>
            <label for="length">الطول:</label><br>
            <select name="length">
                <option value=""> </option>
                <!-- قائمة الخيارات -->
                <option value="3002">3002</option>
            </select><br>
            <label for="weight">الوزن:</label><br>
            <select name="weight">
                <option value=""> </option>
                <!-- قائمة الخيارات -->
                <option value="0.8">0.8</option>
            </select><br><br>
            <input type="submit" value="إرسال">
        </form>
        <div id="message" class="message"></div>
    </div>

    <script>
        function validateForm() {
            var productID = document.getElementById("product").value;
            var thicknessID = document.getElementById("thickness").value;
            var width = document.getElementById("width").value;
            var length = document.getElementById("length").value;
            var weight = document.getElementById("weight").value;

            if (productID === "" || thicknessID === "" || width === "" || length === "" || weight === "") {
                document.getElementById("message").innerHTML = "عفوًا، يرجى اكمال جميع المدخلات";
                return false; // منع الإرسال إذا كانت أحد الحقول فارغة
            }

            // يمكنك هنا استدعاء الدالة postData() لإرسال البيانات

            return true;
        }

        // إذا كنت بحاجة إلى استدعاء الدالة postData()، قم بتعريفها هنا
    </script>
</body>
</html>