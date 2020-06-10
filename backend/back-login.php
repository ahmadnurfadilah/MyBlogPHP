<?php

require '../connect.php';

if ($_POST) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['status'] = 'login';
            header('Location: ../index.php');
        } else {
            echo "Gagal login: Email atau password salah";
        }
    } else {
        echo "Gagal login: " . $conn->error;
    }

} else {
    echo 'Tidak ada data';
}

?>