<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'karaoke';
$username = 'root'; // Ganti sesuai username database
$password = ''; // Ganti sesuai password database

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Proses form booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $room_type = $_POST['room_type'] ?? '';

    // Validasi data kosong
    if (empty($name) || empty($phone) || empty($date) || empty($time) || empty($duration) || empty($room_type)) {
        echo "<script>alert('Semua kolom wajib diisi.'); window.history.back();</script>";
        exit();
    }

    try {
        // Query untuk menyimpan booking ke database
        $stmt = $conn->prepare("
            INSERT INTO bookings (name, phone, date, time, duration, room_type)
            VALUES (:name, :phone, :date, :time, :duration, :room_type)
        ");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':room_type', $room_type);

        $stmt->execute();

        // Redirect dengan notifikasi sukses
        echo "<script>
            alert('Booking berhasil! Terima kasih telah memesan.');
            window.location.href = 'index.php#booking';
        </script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Metode request tidak valid.";
}
?>
