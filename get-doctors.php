<?php
include("includes/db.php");

if (isset($_GET['dept'])) {
    $dept = $_GET['dept'];
    $doctors = mysqli_query($con, "SELECT * FROM doctors WHERE departmentID = '$dept'");
    $result = [];

    while ($row = mysqli_fetch_assoc($doctors)) {
        $result[] = $row;
    }

    echo json_encode($result);
}
?>
