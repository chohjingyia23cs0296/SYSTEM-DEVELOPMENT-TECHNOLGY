<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">User Registration</h2>
        </div>

        <div class="card p-4 shadow-lg">
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="text-center mt-3">
                <a href="login.php" class="text-decoration-none">Already have an account? Login here</a>
            </div>
        </div>
        
        <?php
            include "db.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $sql = "INSERT INTO users_reg (username, password) VALUES('$username', '$password')";
                if (mysqli_query($conn, $sql)) {
                    echo "<div class='alert alert-success text-center' role='alert'>New user created successfully</div>";
                } else {
                    echo "<div class='alert alert-danger text-center' role='alert'>Error: " . htmlspecialchars($sql) . "<br>" . mysqli_error($conn) . "</div>";
                }
            }
            ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>