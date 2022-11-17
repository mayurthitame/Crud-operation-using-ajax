
<?php
try{
 
// Start the session
// session_start();



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

// $username=filter_input(INPUT_POST,'username');
// $password=filter_input(INPUT_POST,'password');

if(isset($_POST['usname'])){
    $usern=$_POST['usname'];
   
}

// $_SESSION[$username] =$password;

// print_r($_SESSION);


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql= $conn->query("SELECT * from form");
// $pdo=$conn->query($sql);
$sql->setFetchMode(PDO:: FETCH_ASSOC);


while ($row = $sql->fetch()) {
    $username=$row['username'];
    $pass=$row['password'];  
}

// echo $usern;
// echo $pass; 
if($usern==$username)
{
    // echo "New Record Inserted Successfully";
    echo 1;
    // header("Location: studentform.html");
}
else
{
    echo 0;
    // $_SESSION["err"] ="Please provide proper username or pasword!";
    // // session_destroy();
    // header("Location: index.html");
    // print_r($_SESSION);
    // echo "Error:" .$sql."<br>".$conn->error;
    // echo "Please provide proper credentials";    

}
           
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
