<?php
include 'db.php'; // เรียกใช้ไฟล์ db.php เพื่อเชื่อมต่อฐานข้อมูล
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ป้องกัน SQL Injection เบื้องต้น
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // ดึงข้อมูลตรวจสอบ
    $sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['login_user'] = $username;
        echo "<h3 style='color:green;'>ยินดีด้วย! คุณเข้าสู่ระบบสำเร็จ</h3>";
    } else {
        echo "<h3 style='color:red;'>Username หรือ Password ไม่ถูกต้อง</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Login With Laragon</title>
</head>
<body>
    <h2>เข้าสู่ระบบ (Laragon)</h2>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value=" Login ">
    </form>
</body>
</html>
