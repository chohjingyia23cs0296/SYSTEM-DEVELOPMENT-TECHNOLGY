<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
    
</head>
<body>
    <?php
         $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "student_registration";
        $conn = mysqli_connect($servername, $username, $password, $database);
    ?>
       
</body>
</html>
