<?php
session_start();
if(!isset($_SESSION['username'])){//if session is not set then redirect to login page
    header("Location:login.php");//redirecting to log in page
    exit();//stop script
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Information Registration System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="StudentList.php">Student List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addStudent.php">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 class="text-center mb-4">Update User</h2>

    <?php 
    include "db.php"; // Include the database connection

    // Check if the id parameter is available in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // Get the id parameter value

        // Use prepared statement to select user data based on id
        $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id); // Bind the parameter as an integer
        $stmt->execute(); // Execute the statement
        $result = $stmt->get_result(); // Get the result set

        // Fetch the result set into an associative array
        if ($row = $result->fetch_assoc()) {
    ?>

    <form action="update.php?id=<?php echo $row['id']; ?>" method="POST" class="p-4 border rounded">
    <br>
    <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>>
                    <label class="form-check-label">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <input type="text" id="course" name="course" class="form-control" value="<?php echo htmlspecialchars($row['course']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="registration_date" class="form-label">Registration Date</label>
                <input type="date" id="registration_date" name="registration_date" class="form-control" value="<?php echo htmlspecialchars($row['registration_date']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update User</button>
    </form>

    <?php 
        } else {
            echo "<p>User not found.</p>";
        }
        $stmt->close(); // Close the prepared statement
    } else {
        echo "<p>No ID specified.</p>";
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone =$_POST['phone'];
        $course =$_POST['course'];
        $registration_date =$_POST['registration_date'];

        $stmt = $conn->prepare("UPDATE students SET name=?, gender=?, email=?, phone=?, course=?, registration_date=? WHERE id=?");
        $stmt->bind_param("ssssssi", $name, $gender,$email, $phone, $course,$registration_date, $id); // Bind parameters

        // Execute the statement
        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-3'>User updated successfully</div>";
        } else {
            "<div class='alert alert-success mt-3'>Error: </div>".$stmt->error; 
        
        }

        $stmt->close(); 
    }
    ?>
    <div class="mt-3 d-flex justify-content-center">
    <a href="StudentList.php" class="text-decoration-none">Back to View List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
