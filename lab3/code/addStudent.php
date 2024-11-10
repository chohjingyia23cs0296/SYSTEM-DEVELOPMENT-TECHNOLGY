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
    <title>Student Information Registration System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Information Registration System</h2>
        <h3 class="mb-4">Registration Form</h3>

        <form action="addStudent.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course:</label>
                <input type="text" class="form-control" id="course" name="course" placeholder="Enter your course" required>
            </div>

            <div class="mb-3">
                <label for="registration_date" class="form-label">Registration date:</label>
                <input type="date" class="form-control" id="registration_date" name="registration_date" required>
            </div>

            <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary" name="submit">Register</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form>

        <?php
        include "db.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO students (name, gender, email, phone, course, registration_date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $name, $gender, $email, $phone, $course, $registration_date);

            // Retrieve form data
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $course = $_POST['course'];
            $registration_date = $_POST['registration_date'];

            // Execute the query
            if ($stmt->execute()) {
                echo "<div class='alert alert-success mt-3'>New record created successfully</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
            }

            // Close the statement
            $stmt->close();
        }
        ?>

        <br>
        
        <div class="mt-3 d-flex justify-content-center">
            <a href="StudentList.php" class="btn btn-info text-white">View Student List</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
