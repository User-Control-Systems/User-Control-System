<?php
include 'config.php';

// Silinecek kullanıcının ID'sini al
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Silme sorgusunu hazırla ve uygula
    $sql = "DELETE FROM musteri WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Kullanıcı başarıyla silindi.";
        header("Location: list.html");
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Geçersiz kullanıcı ID.";
}

$conn->close();
?>
