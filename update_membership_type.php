<?php
include 'config.php';

// AJAX ile gelen verileri al
$memberId = $_GET['id'];
$newType = $_GET['type'];

// Veritabanında üyelik tipini güncelle
$updateSql = "UPDATE musteri SET type = '$newType' WHERE id = $memberId";

if ($conn->query($updateSql) === TRUE) {
    echo "Üyelik tipi başarıyla güncellendi.";
} else {
    echo "Hata oluştu: " . $conn->error;
}

$conn->close();
?>
