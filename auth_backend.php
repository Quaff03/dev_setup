<?php
if ( $_POST['username'] == "" || $_POST['passwd'] == "" ) {
    // 如果上传的文件有错误，或者文件类型不是纯文本，或者用户名为空
    echo "用户名或密码错误。<br>";

} else {
    $passwd = $_POST["passwd"];
    $username = $_POST["username"];

    // 使用 mysqli 替代 mysql_connect
    $servername = "localhost:8082"; // 数据库服务器地址
    $db_user = "root";              // 数据库用户名
    $db_password = '';              // 数据库密码
    $dbname = "webauth";            // 数据库名称

    // 创建连接
    $conn = new mysqli($servername, $db_user, $db_password, $dbname);

    // 检查连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    echo "数据库连接成功！";

    // 查询用户名和密码
    $sql = "SELECT username, password FROM quaff03 WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $trueusername = $row['username'];
        $passwdhashed = $row['password'];

        // 验证密码
        if (password_verify($passwd, $passwdhashed)) {
            echo "登录成功！<br>";
            setcookie("is_login", "true", time() + 1 * 365 * 24 * 60 * 60);
            session_start();
            $_SESSION["is_login"] = 'true';
            $_SESSION["username"] = $trueusername;
            header("Location: index.php");
            $conn->close();
            exit();
        } else {
            echo "用户名或密码错误。<br><a href='auth.php'>返回登录页面</a>";
            // 设置登录状态为 false
            setcookie("is_login", "false", time() + 1 * 365 * 24 * 60 * 60);
            session_start();
            $_SESSION["is_login"] = 'false';
            $conn->close();
        }
    } else {
        echo "用户名不存在。<br>";
        setcookie("is_login", "false", time() + 1 * 365 * 24 * 60 * 60);
        session_start();
        $_SESSION["is_login"] = 'false';
        $conn->close();
        exit();
    }
}
