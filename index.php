<?php
include 'database/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Records</title>
  <link href="bootstraps/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstraps/js/bootstrap.js"></script>
  <script src="bootstraps/js/bootstrap.bundle.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <div class="col-6">
      <div class="row">
        <p class="display-5 fw-bold">Student Record</p>
      </div>
      <div class="row">
        <a href="pages/add_student.php" class="btn btn-outline-dark btn-sm">Add Student ➕</a>
      </div>
      <?php
      $res = $conn->query("SELECT * FROM students");
      ?>
      <?php if ($res->num_rows > 0): ?>
        <?php while ($row = $res->fetch_assoc()): ?>
          <div class="row border rounded p-3 my-3">
            <div>
              <div class="row">
                <div class="col">
                  <h5 class="fw-bold"><?= $row['student_name']; ?></h5>
                </div>
                <div class="col text-end">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a href="pages/update_student.php?id=<?= $row['id']; ?>" class="btn">Edit</a>
                      </li>
                      <li>
                        <a href="handlers\delete_student_handler.php?id=<?= $row['id']; ?>" 
                           class="btn" 
                           onclick="return confirm('Are you sure you want to delete this student?');">
                           Delete
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <p class="text-secondary"><?= $row['student_email']; ?></p>
              <p class="text-secondary">Batch: <?= $row['student_batch']; ?></p>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="row border rounded p-3 my-3 text-center">
          <div class="col mt-3">
            <p class="text-muted">No Records Added.</p>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>
