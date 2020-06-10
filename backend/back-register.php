<?php

require '../connect.php';

if ($_POST) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')";
    $result = $conn->query($sql);

    if ($result) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['status'] = 'login';
        header('Location: ../index.php');
    } else {
        echo "Gagal register: " . $conn->error;
    }

} else {
    echo 'Tidak ada data';
}

?>