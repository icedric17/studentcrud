<?php

include "../database/database.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $student_email = $_POST['student_email'];
        $student_batch = $_POST['student_batch'];

        $stmt = $conn->prepare("INSERT INTO students (id, student_name, student_email, student_batch) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $student_id, $student_name, $student_email, $student_batch);

        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Operation failed";
        }
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
