<?php
session_start();


$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

session_unset();


session_destroy();


if ($name) {
    echo "<script>
        alert('LOGOUT SUCCESSFUL!!! $name');
        window.location.href = 'login.php';
    </script>";
} else {
    echo "<script>
    //  alert('LOGOUT SUCCESSFUL!!!');
        window.location.href = 'login.php';
    </script>";
}
?>
