<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM todos WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$todo = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>待辦事項詳細</title>
    <link rel="stylesheet" href="scss/todoItem.css">
</head>
<body class="dark-theme">
    <div id="todo-item-container">
        <form action="editTodo.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">名稱:</label>
            <input type="text" id="name" name="name" value="<?php echo $todo['name']; ?>" required>
            <label for="date">日期:</label>
            <input type="date" id="date" name="date" value="<?php echo $todo['date']; ?>" required>
            <label for="time">時間:</label>
            <input type="time" id="time" name="time" value="<?php echo $todo['time']; ?>" required>
            <label for="duration_minutes">耗時分鐘數:</label>
            <input type="number" id="duration_minutes" name="duration_minutes" value="<?php echo $todo['duration_minutes']; ?>" required>
            <label for="list_type">清單類型:</label>
            <input type="text" id="list_type" name="list_type" value="<?php echo $todo['list_type']; ?>"required>
            <label for="prior">優先度:</label>
            <select id="prior" name="prior" value="<?php echo $todo['prior']; ?>" required>
                <option value="low">低</option>
                <option value="medium">中</option>
                <option value="high">高</option>
            </select>
            <input type="submit" value="修改">
        </form>
        <a href="deleteTodo.php?id=<?php echo $id; ?>">刪除</a>
    </div>
</body>
</html>

