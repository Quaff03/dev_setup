<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工作站控制向导 - PC配置</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="index.css" rel="stylesheet">
</head>
<?php
    $title = "<h1>PC配置向导</h1><br>";
    $description = "本向导将帮助您配置您的PC以适合开发。";
    $root_option1 = [
        'name' => '安装开发工具',
        'icon' => 'fa fa-tools',
        'url' => '/pc/install_tools.php',
        'description' => '安装必要的开发工具和软件。',
    ];
    $root_option2 = [
        'name' => '配置环境变量',
        'icon' => 'fa fa-cogs',
        'url' => '/pc/configure_env.php',
        'description' => '设置环境变量以便于开发。',
    ];
    $root_option3 = [
        'name' => '检查系统更新',
        'icon' => 'fa fa-sync-alt',
        'url' => '/pc/check_updates.php',
        'description' => '确保您的系统是最新的。',
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
                <p>{$root_option3['description']}</p>
            </a>";
    echo '</div>';
