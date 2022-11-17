<?php
try{

    $servername = "localhost:3306";
   $username = "myuser";
   $password = "Mayur@1410";
   
   try {
     $conn = new PDO("mysql:host=$servername;dbname=student", $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
   }

$studid=filter_input(INPUT_POST,'sid');
$studname=filter_input(INPUT_POST,'sname');
$studcollege=filter_input(INPUT_POST,'scollege');
$studpassword=filter_input(INPUT_POST,'saddres');


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="INSERT INTO studentdetails(sid,sname,scollege,saddres) values('$studid','$studname','$studcollege','$studpassword')";
// $pdo=$conn->query($sql);

if($conn->query($sql))
{
    echo "New Record Inserted Successfully";
    header("Location: displaystud.php");
}
else
{
  header("Location: studentform.html");

    // echo "Error:" .$sql."<br>".$conn->error;
    // echo "Please provide proper student id";

}
}
catch(PDOException $e) {
  // sleep(3);

  echo "Error: " . $e->getMessage();

  
  header("Location: studentform.html");

}

?>
