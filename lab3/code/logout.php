<?php 
session_start();//starting session
session_unset();//unset the session
session_destroy();//destroy the session
header("Location:login.php");//redirect to the login page
exit();//stop script
?>