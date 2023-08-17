<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$duration_minutes = $_POST['duration_minutes'];
$list_type = $_POST['list_type'];
$prior = $_POST['prior'];

$sql = "UPDATE todos SET name=?, date=?, time=?, duration_minutes=?, list_type=?, prior=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssisss", $name, $date, $time, $duration_minutes, $list_type, $prior, $id);
$stmt->execute();
$conn->close();

header("Location: index.php"); // 重定向到主頁
?>
