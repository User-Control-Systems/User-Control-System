<?php
include 'config.php';

// Veritabanından verileri çek
$sql = "SELECT id, name, surname, enddate, type FROM musteri";
$result = $conn->query($sql);

// Veri varsa, liste oluştur
if ($result->num_rows > 0) {
    echo "<h2>Spor Salonu Üyelik Listesi</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Üyelik Numarası</th><th>Üye Adı</th><th>Üye Soyadı</th><th>Üyelik Bitiş Tarihi</th><th>Üyelik Türü</th><th>Kalan Süre</th><th>Üye İşlemleri</th></tr>";

    // Toplam fiyatı ve aylık geliri saklamak için değişkenleri tanımla
    $totalPrice = 0;
    $monthlyIncome = 0;

    // Verileri ekrana yazdır ve üyelik tipi ve son gün seçimini ekle
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['surname'] . "</td>";
        echo "<td><input type='date' name='enddate' value='" . $row['enddate'] . "' onchange='changeEndDate(this.value, " . $row['id'] . ")'></td>";

        // Üyelik tipini değiştirilebilir hale getir
        echo "<td><select name='type' onchange='changeMembershipType(this.value, " . $row['id'] . ")'>
              <option value='Standart Üyelik' " . ($row['type'] == 'Standart Üyelik' ? 'selected' : '') . ">Standart Üyelik 750₺</option>
              <option value='Premium Üyelik' " . ($row['type'] == 'Premium Üyelik' ? 'selected' : '') . ">Premium Üyelik 1300₺</option>
              <option value='Gold Üyelik' " . ($row['type'] == 'Gold Üyelik' ? 'selected' : '') . ">Gold Üyelik 1800₺</option>
              </select></td>";

        // Kalan günü hesapla
        $today = new DateTime();
        $enddate = new DateTime($row['enddate']);
        $remainingDays = $today->diff($enddate)->format('%r%a');

        // Kalan gün durumuna göre metni yazdır
        if ($remainingDays > 0) {
            echo "<td>Kalan Gün: $remainingDays</td>";
        } elseif ($remainingDays == 0) {
            echo "<td>Son Gün</td>";
        } else {
            echo "<td>Üyelik Bitmiştir</td>";
        }

        echo "<td><a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Bu kullanıcıyı silmek istediğinizden emin misiniz?\")'>Sil</a></td>";
        echo "</tr>";

        // Toplam fiyatı güncelle
        $totalPrice += getPriceForMembershipType($row['type']);

        // Aylık geliri güncelle (sadece 30 günü aşan üyelikler)
        if ($remainingDays >= 30) {
            $monthlyIncome += getPriceForMembershipType($row['type']);
        }
    }

    echo "</table>";

    // Toplam fiyatı ve aylık geliri ekrana yazdır
    echo "<p>Aylık Toplam Gelir: $totalPrice ₺</p>";
    echo "<p>Aylık Gelir (30 günü aşan üyelikler): $monthlyIncome ₺</p>";

} else {
    echo "Spor Salonunuzda üye Yoktur.";
}

$conn->close();

// PHP fonksiyonu, üyelik tipine göre fiyatı döndürür
function getPriceForMembershipType($membershipType) {
    switch ($membershipType) {
        case 'Standart Üyelik':
            return 750;
        case 'Premium Üyelik':
            return 1300;
        case 'Gold Üyelik':
            return 1800;
        default:
            return 0;
    }
}
?>
<script>
    // JavaScript fonksiyonu, üyelik tipini değiştirdiğimizde çalışacak
    function changeMembershipType(newType, memberId) {
        // AJAX kullanarak yeni üyelik tipini güncelle
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Başarılı güncelleme sonrasında yapılacak işlemler
                console.log("Üyelik tipi güncellendi: " + newType);
            }
            location.reload();
        };
        xmlhttp.open("GET", "update_membership_type.php?id=" + memberId + "&type=" + newType, true);
        xmlhttp.send();
    }

    // JavaScript fonksiyonu, son günü değiştirdiğimizde çalışacak
    function changeEndDate(newEndDate, memberId) {
        // AJAX kullanarak yeni son günü güncelle
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Başarılı güncelleme sonrasında sayfayı yenile
                console.log("Son gün güncellendi: " + newEndDate);
                location.reload();
            }
        };
        xmlhttp.open("GET", "update_end_date.php?id=" + memberId + "&enddate=" + newEndDate, true);
        xmlhttp.send();
    }
</script>
