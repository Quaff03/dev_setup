<?php
session_start();
if ($_SESSION["is_login"] == 'true') {
    header("Location: index.php");
    exit();
} else {
    setcookie("is_login", "false", time() + 1 * 365 * 24 * 60 * 60);
}
$_SESSION["is_login"] = $_COOKIE["is_login"];

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <main>
        <div>
            <h1>登录</h1>
            <form action="auth_backend.php" method="post" enctype="multipart/form-data">
                <label for="username">用户名：</label>
                <input type="text" name="username" id="username" required><br>
                <label for="file">请输入密码：</label>
                <input type="password" name="passwd" id="passwd"><br>
                <input type="submit" name="submit" value="提交">
            </form>


        </div>
    </main>
</body>

</html>
