<!DOCTYPE html>
<html>
<head>
<title>Student Information Registration System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

    
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Student Information Registration System</h2>
    <h3 class="mb-4">Registration Form</h3>

    <form action="form.php" method="POST">
        <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        </div>
    
        <div class="mb-3">
                <label class="form-label">Gender:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for ="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>

            <!-- Phone Number Field -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number:</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
            </div>

            <!-- Course Field -->
            <div class="mb-3">
                <label for="course" class="form-label">Course:</label>
                <input type="text" class="form-control" id="course" name="course" placeholder="Enter your course">
            </div>
        <div class="mb-3">
                <label for="registration_date" class="form-label">Registration date:</label>
                <input type="date" class="form-control" id="registration_date" name="registration_date">
            </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Register</button>
        
    </form>

<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $registration_date = $_POST['registration_date'];

    $sql = "INSERT INTO students (name, gender, email, phone, course, registration_date)
            VALUES ('$name', '$gender', '$email', '$phone', '$course', '$registration_date')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success mt-3'>New record created successfully</div>";
    } else {
    echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
    }
}
?>
    <br>
    <div class="mt-3">
        <a href="view.php" class="text-decoration-none">View a list of registered students.</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
