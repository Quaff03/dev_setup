<?php
session_start();
if (!isset($_SESSION["is_login"])) {
    setcookie("is_login", "false", );
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工作站控制向导</title>
    <link rel="stylesheet" href="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <header>
        <a href='auth/logout.php'><button onclick="console.log('LogOut!')" class="logout-button">注销</button></a>
    </header>
    <?php

    $title = "<h1>欢迎使用工作站控制向导</h1><br>";
    $description = "本向导将帮助您配置工作站。";
    $root_option1 = [
        'name' => 'PC配置',
        'icon' => 'fa fa-cog',
        'url' => 'pc.php',
        'description' => '配置您的PC以将其变得适宜开发。',
    ];
    $root_option2 = [
        'name' => '移动设备配置',
        'icon' => 'fa fa-download',
        'url' => 'phone.php',
        'description' => '使您的移动设备适合便携开发。',
    ];

    $root_option3 = [
        'name' => '我已经配置完毕了，使用任务控制系统继续',
        'icon' => 'fa fa-server',
        'url' => 'task.php',
        'description' => '未提供描述', // 修复了 'no' 的问题
    ];

    echo $title;
    echo "<h2>$description</h2>";



    echo '<div class="options">';
    echo "<a href='{$root_option1['url']}'>
                <i class='{$root_option1['icon']}'></i>
                <strong>{$root_option1['name']}</strong>
                <p>{$root_option1['description']}</p>
            </a>";
    echo '</div>';

    echo '<div class="options">';
    echo "<a href='{$root_option2['url']}'>
                <i class='{$root_option2['icon']}'></i>
                <strong>{$root_option2['name']}</strong>
                <p>{$root_option2['description']}</p>
            </a>";
    echo '</div>';

    echo '<div class="options">';
    echo "<a href='{$root_option3['url']}'>
            <i class='{$root_option3['icon']}'></i>
            <strong>{$root_option3['name']}</strong>
            <!-- <p>{$root_option3['description']}</p> -->
        </a>";
    echo '</div>';

    ?>
    <link href="index.css" rel="stylesheet">
</body>

</html>
