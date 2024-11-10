<?php

include "db.php";
    if(isset($_GET['id'])){
        $id=$_GET["id"];
        $sql="DELETE FROM students WHERE id='$id'";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('User Deleted successully'); window.location='addStudent.php'</script>";
    
        }else{
            echo "<script>alert('User not Deleted'); window.location='addStudent.php'</scipt>";
        }
    }
?>