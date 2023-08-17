function toggleTheme() {
    document.body.classList.toggle('dark-theme');
}

function updateDateTime() {
    const now = new Date();
    const date = now.toLocaleDateString('zh-TW', { year: 'numeric', month: 'long', day: 'numeric' });

    // now.setHours(0); // 設置小時為0進行測試
    let hours = now.getHours();
    // console.log("原始小時：", hours); // 查看原始小時值
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
    
    // 如果是半夜0點，將小時設為00
    if (hours === 0) {
        hours = '00';
    } else if (hours < 10) {
        hours = '0' + hours; // 如果小時小於10，則在前面添加0
    }

    // 如果分鐘或秒小於10，則在前面添加0
    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    const time = hours + ':' + minutes + ':' + seconds; // 組合時、分、秒

    document.getElementById('date').innerText = date;
    document.getElementById('time').innerText = time;
}

document.addEventListener('mousemove', function (e) {
    const menu = document.getElementById('menu');
    if (e.clientX <= 300) {
        menu.classList.add('menu-open');
    } else {
        menu.classList.remove('menu-open');
    }
});

setInterval(updateDateTime, 1000);
