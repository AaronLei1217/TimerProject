<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/style.css">
    <title>Timer</title>
</head>
<body>
    <button id="theme-toggle" onclick="toggleTheme()">
        <span id="sun-icon">☀️</span><span id="moon-icon">🌙</span> 切換主題
    </button>
    
    <div id="date-time-container">
        <div id="date"></div>
        <div id="time"></div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
