<?php

require '../connect.php';

if ($_POST) {
    $image = null;
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] != 4) {
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

    $sql = "UPDATE blogs SET title = '$title', content = '$content', image = '$image' WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: ../admin/index.php');
    } else {
        echo "Gagal mengedut blog: " . $conn->error;
    }

}

?>