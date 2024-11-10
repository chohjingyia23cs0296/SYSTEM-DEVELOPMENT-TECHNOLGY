<html>
    <head>
    <title>View Student</title>
    </head>

    <body>
        <h2>Registered student</h2>
    <table border="1">
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Course</th>
        <th>Registration date</th>
        <th>Edit</th>
        <th>Delete</th>
    
<?php 
    include "db.php";
    $sql="SELECT * FROM students";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo"<td>". $row['name'] . "</td>";          
            echo"<td>". $row['gender'] . "</td>"; 
            echo"<td>". $row['email'] . "</td>";   
            echo"<td>". $row['phone'] . "</td>"; 
            echo"<td>". $row['course'] . "</td>"; 
            echo"<td>". $row['registration_date'] . "</td>"; 
            echo "<td> <a href='update.php?id=" . $row['id']." '>Update </a> </td>";
            echo "<td> <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
            echo"</tr>";
           
        }
    }else{
        echo "<tr><td colspan='8'>No data found</td></tr>";
    }
    ?>
    </table>
    <br>
    <a href="register.php">Back to Registration</a>
    </body>
    </html>