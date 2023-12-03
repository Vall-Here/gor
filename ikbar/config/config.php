<?php
session_start();
require "../../config/connection.php";
require "../../function.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $user = $_SESSION['id'];

    $existingRecord = query("SELECT * FROM fav WHERE id_fields = $id AND id_user = $user");

    if (!$existingRecord) {
        // If the record does not exist, insert it
        $sql = "INSERT INTO fav (id_fields, id_user) VALUES ($id, $user)";
        $hasil = mysqli_query($conn, $sql);

        if ($hasil) {
            header("Location: ../../fields.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // If the record already exists, delete it
        $deleteSql = "DELETE FROM fav WHERE id_fields = $id AND id_user = $user";
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            header("Location: ../../fields.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    // Handle the case when 'id' is not set in the POST data
    echo "Invalid request.";
}
?>
