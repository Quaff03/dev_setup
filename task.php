<?php
    session_start();
    
    define("AUTH_REDIRECT", "Location: auth/auth.php");

    if(!isset($_SESSION["is_login"])){
        $_SESSION["is_login"] = 'false';
        header(AUTH_REDIRECT);
        exit();
    }
?>
<?php
    if($_SESSION["is_login"] == 'false') {
    header(AUTH_REDIRECT);
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>任务控制</title>
    <?php
        if($_SESSION["is_login"] == 'false') {
            header("Location: auth/auth.php");
            exit();
        }
    ?>
    <link rel="stylesheet" href="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="index.css" rel="stylesheet">
</head>
<body>
    <header class="head">
        <h1 style="">任务控制</h1>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="index.php" class="button">返回首页</a>
    </header>
</body>
