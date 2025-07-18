<?php
if ($_FILES["file"]["error"] > 0 || $_FILES["file"]["type"] != "text/plain"  || $_POST['username'] == "") {
    // 如果上传的文件有错误，或者文件类型不是纯文本，或者用户名为空
    echo "上传文件错误或文件类型不正确。请上传一个合法的密钥文件。<br>";
    switch ($_FILES["file"]["error"]) {
        case 1:
            echo "上传的文件过大，显然不是密钥文件。<br>";
            break;
        case 2:
            echo "上传的文件过大，显然不是密钥文件。<br>";
            break;
        case 3:
            echo "文件只有部分被上传，检查网络后重试。<br>";
            break;
        case 4:
            echo "没有文件被上传。<br>";
            echo "<a href='auth.php'>返回</a>重新上传。<br>";
            break;

        default:
            break;
    }
    echo "错误：" . $_FILES["file"]["error"] . "<br>";

} else {
    echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
    echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
    $passwd = base64_encode(file_get_contents($_FILES["file"]["tmp_name"]));
    $username = $_POST["username"];

    // 使用 mysqli 替代 mysql_connect
    $servername = "localhost:8082"; // 数据库服务器地址
    $password = null;            // 数据库密码
    $dbname = "webauth"; // 数据库名称

    // 创建连接
    $conn = new mysqli(hostname: $servername, username: $username, database: $dbname);

    // 检查连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    echo "数据库连接成功！";

    // 在此处执行数据库操作
    // 示例：$conn->query("YOUR SQL QUERY");
    $db_selected = mysqli_select_db($conn, $dbname);
    if (!$db_selected) {
        die("数据库选择失败: " . $conn->error);
    }else{
        $trueusername = $conn->query("SELECT username FROM quaff03;");
        $passwdhashed = $conn->query("SELECT password FROM quaff03;");
        if (!$passwdhashed || !$username) {
            die("查询失败: " . $conn->error);
        }elseif(password_verify($password, $passwdhashed)) {
            echo "登录成功！<br>";
            setcookie("is_login", "true", time() + 1 * 365 * 24 * 60 * 60);
            session_start();
            $_SESSION["is_login"] = 'true';
            $_SESSION["username"] = $username;
            header("Location: index.php");
            $conn->close();
            exit();
        } else {
            echo "用户名或密码错误。<br>";
            setcookie("is_login", "false", time() + 1 * 365 * 24 * 60 * 60);
            session_start();
            $_SESSION["is_login"] = 'false';
            header("Location: auth.php");
            $conn->close();
            exit();

        }
    }
    
}
