<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>

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

    <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
    <br>
        <label>Name: </label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br><br>

        <label>Gender: </label>
        <input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>> Male
        <input type="radio" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>> Female<br><br>
        
        <label>Email: </label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br><br>

        <label>Phone: </label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required><br><br>

        <label>Course: </label>
        <input type="text" name="course" value="<?php echo htmlspecialchars($row['course']); ?>" required><br><br>

        <label>Registration date: </label>
        <input type="date" name="registration_date" value="<?php echo htmlspecialchars($row['registration_date']); ?>" required><br><br>

        <button type="submit">Update User</button><br>
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
        // Retrieve form data
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone =$_POST['phone'];
        $course =$_POST['course'];
        $registration_date =$_POST['registration_date'];

        // Prepare the SQL update statement
        $stmt = $conn->prepare("UPDATE students SET name=?, gender=?, email=?, phone=?, course=?, registration_date=? WHERE id=?");
        $stmt->bind_param("ssssssi", $name, $gender,$email, $phone, $course,$registration_date, $id); // Bind parameters

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record updated successfully <br>";
        } else {
            echo "Error: " . $stmt->error; // Show error if update fails
        }

        $stmt->close(); // Close the prepared statement
    }
    ?>

    <a href="view.php">Back to View List</a>
</body>
</html>
