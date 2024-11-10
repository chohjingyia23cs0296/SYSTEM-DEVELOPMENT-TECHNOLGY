<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Database Connection Status</h2>
        </div>

        <div class="card p-4 shadow-lg">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "student_registration";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);

            // Check connection
            if (!$conn) {
                echo "<div class='alert alert-danger text-center' role='alert'>Connection failed: " . mysqli_connect_error() . "</div>";
            } else {
                echo "<div class='alert alert-success text-center' role='alert'>Connected successfully to the database.</div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
