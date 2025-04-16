<?php
include "../database/database.php";

try {
    if (isset($_GET['id'])) {
        $student_id = $_GET['id']; 

        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $student_id); 

        if ($stmt->execute()) {
            header("Location: ../index.php?success=Student deleted successfully");
            exit;
        } else {
            echo "Deletion failed";
        }
    } else {
        echo "Invalid request. No ID provided.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
