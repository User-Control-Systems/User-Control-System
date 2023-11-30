<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $enddate = $_POST['enddate'];
    $type = $_POST['type'];

    $sql = "INSERT INTO musteri (id, name, surname, enddate, type) VALUES ('$id', '$name', '$surname', '$enddate', '$type')";

    if ($conn->query($sql) === TRUE) {
        // Veri başarıyla kaydedildiyse index.html'e yönlendir
        header("Location: index1.html");
        exit(); // İşlemi sonlandır
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
