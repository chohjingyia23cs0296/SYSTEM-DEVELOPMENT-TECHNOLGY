<!DOCTYPE html>
<html>
<head>
    <title>Student Information Registration System</title>
</head>
<body>
    <h2>Student Information Registration System</h2>
    <h2>Registration Form</h2>

    <form action="" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female<br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Phone number:</label>
        <input type="text" name="phone" required><br><br>

        <label>Course:</label>
        <input type="text" name="course" required><br><br>
        <label>Registration date:</label>
        <input type="date" name="registration_date"><br><br>
        
        <button type="submit" name="submit">Register</button>
        
    </form>

    <?php
    include "db.php";

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone =$_POST['phone'];
        $course =$_POST['course'];
        $registration_date =$_POST['registration_date'];

        // Insert the data into the users table
        $sql = "INSERT INTO students (name, gender, email, phone, course, registration_date) VALUES ('$name', '$gender','$email', '$phone', '$course','$registration_date')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Student registered successfully!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
    <br>
    <a href="view.php"> View a list of registered students.</a>
</body>
</html>
