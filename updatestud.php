
<?php
$cookie_name="sid";
$cookie_value =$_COOKIE[$cookie_name];
?>

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

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql= $conn->query("SELECT * from studentdetails where sid='$cookie_value'");
// $pdo=$conn->query($sql);
$sql->setFetchMode(PDO:: FETCH_ASSOC);

$row = $sql->fetch();
    $sid=$row['sid'];
    $sname=$row['sname'];
    $scollege=$row['scollege'];  
    $saddress=$row['saddres'];  

  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

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

<div class="container mt-4" style="width: 50%;">
  <h2 class="text-center" style="font-family: 'Courier New', Courier, monospace;">Update Student Details here</h2>
    <form method="POST" action="updatestudent.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Student Id</label>
          <input type="text" class="form-control" name="sid" id="exampleInputEmail1" value="<?php global $cookie_value; echo $cookie_value?>" aria-describedby="emailHelp" placeholder="Enter Student Id">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label>Student Name</label>
          <label for="exampleInputPassword1"></label>
          <input type="text" class="form-control" name="sname"  placeholder="name" value="<?php global $cookie_value; echo $sname?>">
        </div>
        <div class="form-group">
          <label>Student College</label>
            <label for="exampleInputPassword1"></label>
            <input type="text" class="form-control" name="scollege"  placeholder="College" value="<?php global $cookie_value; echo $scollege?>">
          </div>
        <div class="form-group">
          <label>Student address</label>
            <label for="exampleInputPassword1"></label>
            <input type="text" class="form-control" name="saddres" placeholder="Address" value="<?php global $cookie_value; echo $saddress?>">
          </div>
       <div class="text-center">
        <button type="submit" onclick='myclick()' value="submit" class="btn btn-primary">Update</button>
       </div>
      </form>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
