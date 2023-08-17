<?php
include 'db.php'; // 包含資料庫連接文件

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $list_type = $_POST['list_type'];
    $prior = $_POST['prior'];
    $duration_minutes = $_POST['duration_minutes'];

    $sql = "INSERT INTO todos (name, date, time, list_type, prior, duration_minutes) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $date, $time, $list_type, $prior, $duration_minutes);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php"); // 回到主頁
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增待辦事項</title>
    <link rel="stylesheet" href="scss/createTodo.css"> <!-- 引入CSS樣式 -->
</head>
<body class="dark-theme">
    <div id="create-todo-container">
        <form action="createTodo.php" method="post">
            <label for="name">項目名稱:</label>
            <input type="text" id="name" name="name" required>
            <label for="date">日期:</label>
            <input type="date" id="date" name="date" required>
            <label for="time">時間:</label>
            <input type="time" id="time" name="time" required>
            <label for="duration_minutes">耗時分鐘數:</label>
            <input type="number" id="duration_minutes" name="duration_minutes" required>
            <label for="list_type">清單類型:</label>
            <input type="text" id="list_type" name="list_type" required>
            <label for="prior">優先度:</label>
            <select id="prior" name="prior" required>
                <option value="low">低</option>
                <option value="medium">中</option>
                <option value="high">高</option>
            </select>
            <button type="submit">新增</button>
        </form>
    </div>
</body>
</html>
