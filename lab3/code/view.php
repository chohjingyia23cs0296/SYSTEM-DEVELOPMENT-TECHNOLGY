<?php
session_start();
if(!isset($_SESSION['username'])){//if session is not set then redirect to login page
    header("Location:login.php");//redirecting to log in page
    exit();//stop script
}
?>


<html>
    <head>
    <title>View Student</title>
    <a href="logout.php">Log out</a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registered Students</h2>
        
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Registration Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "db.php";
                    $sql = "SELECT * FROM students";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";          
                            echo "<td>" . htmlspecialchars($row['gender']) . "</td>"; 
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";   
                            echo "<td>" . htmlspecialchars($row['phone']) . "</td>"; 
                            echo "<td>" . htmlspecialchars($row['course']) . "</td>"; 
                            echo "<td>" . htmlspecialchars($row['registration_date']) . "</td>"; 
                            echo "<td><a href='update.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Update</a></td>";
                            echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        
        <a href="form.php" class="btn btn-secondary mt-3">Back to Registration</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>