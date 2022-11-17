
<?php
function OpenCon()
{
   $servername = "localhost:3306";
   $username = "myuser";
   $password = "Mayur@1410";
   
   try {
     $conn = new PDO("mysql:host=$servername;dbname=student", $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Connected successfully";
   } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
   }
}

?>
