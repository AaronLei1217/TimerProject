<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM todos WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$conn->close();
header("Location: index.php"); // 重定向到主頁
?>
