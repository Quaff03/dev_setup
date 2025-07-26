<?php
    session_start();
    session_destroy();
    echo "注销完成，再见。";
    header("Location: /index.php");
