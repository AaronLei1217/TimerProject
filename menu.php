<?php
include 'db.php'; // 包含資料庫連接檔案

// 查詢待辦事項，並按日期和時間排序
$sql = "SELECT id, name, date, time, list_type, prior, duration_minutes FROM todos
        WHERE isComplete = FALSE 
        ORDER BY date, time";
$result = $conn->query($sql);
?>

<div id="menu" class="menu-closed">
    
    <?php
    $previousDate = null;
    while ($row = mysqli_fetch_assoc($result)) {
        $date = $row['date'];
        $time = $row['time'];
        $time = substr($time, 0, 5); // todo-item只取時和分
        $name = $row['name'];
        $prior = $row['prior']; // 取得優先度
        $duration = $row['duration_minutes'];

        // 如果日期有變化，則顯示新日期
        if ($date != $previousDate) {
            echo "<div class='date'>$date</div>";
            $previousDate = $date;
        }
    
        // 顯示待辦事項名稱和時間，並添加優先度類
        $id = $row['id']; // 取得待辦事項的ID 
        // <span class='duration_minutes'>$duration min</span>
        echo "
                <a href='todoItem.php?id=$id' class='todo-item-link' style='text-decoration: none; '>
                    <div class='todo-item $prior'>
                        <span class='time'>$time</span> 
                        <span class='name'>$name</span>
                        
                        <span class='priority-dot'></span>
                    </div>
                </a>";
    }
    ?>
    <!-- 新增按鈕 -->
    <a href="createTodo.php" style='text-decoration: none; '>
        <div class="add-todo-button">新增</div>
    </a>
    
</div>

<?php
$conn->close(); // 關閉連接
?>
