<?php

require '../connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM blogs WHERE id = '$id'";
$result = $conn->query($sql);

if ($result) {
    header('Location: ../admin/index.php');
} else {
    echo "Gagal menghapus: " . $conn->error;
}

?>