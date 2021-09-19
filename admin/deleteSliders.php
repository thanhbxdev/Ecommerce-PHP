<?php

require_once "..//function.php";
$id = $_GET['id'];
$sql = "DELETE FROM sliders WHERE id=$id";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header("location: slide.php");
   
} else {
    header("Location: slide.php");
}