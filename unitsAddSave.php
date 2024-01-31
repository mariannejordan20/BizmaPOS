<?php
session_start();
include('connection.php');

if (isset($_POST['unit_name'])) {
    $unitname = $_POST['unit_name'];

    $query = $conn->prepare("SELECT * FROM units WHERE unit_name = ?");
    $query->bind_param("s", $unitname);
    $query->execute();
    $query_result = $query->get_result();

    if ($query_result->num_rows > 0) {
        $_SESSION['status'] = "Unit already exists!";
        $_SESSION['status_code'] = "error";
        header("location: units.php");
        exit;
    }

    $insert_query = $conn->prepare("INSERT INTO units (unit_name) VALUES (?)");
    $insert_query->bind_param("s", $unitname);
    $insert_result = $insert_query->execute();

    if ($insert_result) {
        // Insert unit into the recentunit table
        $sqlRecent = "INSERT INTO recentunit (unit_name, created_at) VALUES (?, NOW())";
        $stmt = $conn->prepare($sqlRecent);
        $stmt->bind_param("s", $unitname);
        $stmt->execute();

        // Check the number of records in recentunit
        $countQuery = "SELECT COUNT(*) AS count FROM recentunit";
        $result = $conn->query($countQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $recordCount = $row["count"];

            // Delete the oldest record if the count exceeds 5
            if ($recordCount > 5) {
                $sqlDeleteOldest = "DELETE FROM recentunit ORDER BY created_at ASC LIMIT 1";
                $conn->query($sqlDeleteOldest);
            }
        }

        $_SESSION['status'] = "Unit Information Saved";
        $_SESSION['status_code'] = "success";
        header("location: units.php");
        exit;
    }
} else {
    // Handle the case where 'unit_name' is not set.
    $_SESSION['status'] = "Invalid data!";
    $_SESSION['status_code'] = "error";
    header("location: units.php");
    exit;
}
?>
