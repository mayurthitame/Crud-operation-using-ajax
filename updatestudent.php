<?php
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
// echo "Connected Successfully";
// echo "<br>";
$studid=filter_input(INPUT_POST,'sid');
$studname=filter_input(INPUT_POST,'sname');
$studcollege=filter_input(INPUT_POST,'scollege');
$studpassword=filter_input(INPUT_POST,'saddres');


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="UPDATE studentdetails set sname='$studname' ,scollege='$studcollege' , saddres='$studpassword' where sid='$studid' ";

// $sql="UPDATE studentdetails set(sid,sname,scollege,saddres) values('$studid','$studname','$studcollege','$studpassword')";
// $pdo=$conn->query($sql);

if($conn->query($sql))
{
    echo "Record Updated Successfully";
}
else
{
    echo "Error:" .$sql."<br>".$conn->error;
    echo "Please provide proper student id";

}

?>

<?php
$cookie_name="sid";
$cookie_value =$_COOKIE[$cookie_name];



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student CRUD</title>
  </head>
  <body>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
  <script>

      $(document).ready(function () {
                            
      swal("Good job", "Saved Successfully", "success").then((value) => {
        
                                window.location="displaystud.php";
                                });

    });
  </script>
 
  </body>
</html>



