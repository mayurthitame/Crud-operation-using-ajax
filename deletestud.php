  <?php
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
   $id = 0;
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to delete a record
        $sql = "DELETE FROM studentdetails WHERE sid=$id";
        $pdo=$conn->query($sql);
         // use exec() because no results are returned
         $conn->exec($sql);
        echo 1;
    }
    else
    {
        echo 0;
    }

   
?>
