<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['no']) && !empty($_POST['no'])) {
        $no = $_POST['no'];
        $pin = $_POST['pin1'] . $_POST['pin2'] . $_POST['pin3'] . $_POST['pin4'] . $_POST['pin5'] . $_POST['pin6'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dana";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Menyiapkan pernyataan SQL
        $stmt = $conn->prepare("INSERT INTO user (no, pin) VALUES (?, ?)");
        $stmt->bind_param("ss", $no, $pin);

        // Menetapkan parameter dan mengeksekusi
        $stmt->execute();

        echo "New records created successfully";

        $stmt->close();
        $conn->close();
    } else {
        echo "Nomor belum dimasukkan.";
    }
}
?>
