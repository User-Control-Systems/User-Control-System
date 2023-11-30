<?php
session_start();
include('configure1.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adı ve şifre kontrolü - Bu kısım güvenliği artırmak için daha fazla kontrol içermelidir.
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Giriş başarılı, kullanıcı oturumunu başlat
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id']; // Örnek olarak bir kullanıcı kimliği
        $_SESSION['username'] = $user['username'];

        // Oturumu taşı ve index1.html sayfasına yönlendir
        header('Location: index1.html');
        exit;
    } else {
        echo 'Geçersiz kullanıcı adı veya şifre.';
    }
}
?>
