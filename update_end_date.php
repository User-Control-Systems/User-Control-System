<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Üye ID ve yeni bitiş tarihi parametrelerini al
    $memberId = $_GET["id"];
    $newEndDate = $_GET["enddate"];

    // Yeni bitiş tarihini veritabanında güncelle
    $updateSql = "UPDATE musteri SET enddate='$newEndDate' WHERE id=$memberId";

    if ($conn->query($updateSql) === TRUE) {
        echo "Üye son günü başarıyla güncellendi.";
    } else {
        echo "Hata oluştu: " . $conn->error;
    }
} else {
    echo "Geçersiz istek.";
}

$conn->close();
?>
