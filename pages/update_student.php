<?php
include '../database/database.php';

try {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        die("Student not found");
    }
    $stmt->close();
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Student</title>
    <link href="../bootstraps/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstraps/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-6">
            <div class="row">
                <p class="display-5 fw-bold">Edit Student</p>
            </div>
            <div class="row">
                <form class="form" action="../handlers/edit_student_handler.php" method="POST">
                    <input name="id" value="<?= $student['id'] ?>" hidden />

                    <div class="my-3">
                        <label>Student ID</label>
                        <input class="form-control" type="text" name="student_id" value="<?= $student['id'] ?>" required />
                    </div>

                    <div class="my-3">
                        <label>Student Name</label>
                        <input class="form-control" type="text" name="student_name" value="<?= $student['student_name'] ?>" required />
                    </div>

                    <div class="my-3">
                        <label>Student Email</label>
                        <input class="form-control" type="email" name="student_email" value="<?= $student['student_email'] ?>" required />
                    </div>

                    <div class="my-3">
                        <label>Student Batch</label>
                        <input class="form-control" type="text" name="student_batch" value="<?= $student['student_batch'] ?>" required />
                    </div>

                    <div class="my-3">
                        <button type="submit" class="btn btn-outline-dark">
                            Save Changes 💾
                        </button>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
