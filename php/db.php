<?php
$host = "127.0.0.1"; // หรือใช้ "localhost" ก็ได้เช่นกัน
$user = "root";      // ตามที่ปรากฏใน HeidiSQL
$password = "";      // ปล่อยว่างไว้ตามค่าเริ่มต้น
$database = "login_db"; // ชื่อฐานข้อมูลที่เราเพิ่งสร้างด้านบน

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
