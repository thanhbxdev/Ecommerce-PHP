<?php
$host = 'localhost';
$db = 'fptshop';
$user = 'root';
$pass = '';
global $conn;
$conn = null;
try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}
function search($sql){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $number = $stmt->fetchColumn();
}
function action($sql)
{
    global $conn;
    $conn->exec($sql);
}
// Thực thi câu lệnh thêm sửa xóa
function selectDb($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
// Truy vấn đến bảng 
function total($sql){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
   }
// Hàm đếm 