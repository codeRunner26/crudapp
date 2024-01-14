<?php
include("connfile.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the delete operation
    $sql = "DELETE FROM `crudoperation` WHERE sno = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Deletion successful
        header("Location: formdata.php"); // Redirect back to the index.php page or any other page you prefer
        exit();
    } else {
        // Deletion failed
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. Please provide an ID to delete.";
}
?>
