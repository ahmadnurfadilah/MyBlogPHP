<?php

require '../connect.php';

session_start();
$email = null;
if ($_SESSION['status'] == 'login') {
    $email = $_SESSION['email'];
}

$sqlgetUser = "SELECT * FROM users WHERE email = '$email'";
$resultGetUser = $conn->query($sqlgetUser);
$rowUser = $resultGetUser->fetch_assoc();
$userId = $rowUser['id'];


if ($_POST) {
    $image = NULL;
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (isset($_FILES['image'])) {
        $namaFile = $_FILES['image']['name'];
        $namaSementara = $_FILES['image']['tmp_name'];

        $dirUpload = '../thumbnail/';

        $uploading = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

        if ($uploading == true) {
            // berhasil upload
            $image = $namaFile;
        } else {
            // gagal upload
            die('gagal upload gambar');
        }
    }

    $sql = "INSERT INTO blogs (user_id, title, content, image) VALUES ('$userId', '$title', '$content', '$image')";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: ../admin/index.php');
    } else {
        echo "Gagal menambahkan: " . $conn->error;
    }

} else {
    echo 'Tidak ada data';
}

?>