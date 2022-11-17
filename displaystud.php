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
<?php
// include 'db_connection.php';
try{
     $servername = "localhost:3306";
   $username = "myuser";
   $password = "Mayur@1410";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=student", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    // $conn = OpenCon();
$pdo = $conn->query("SELECT * FROM studentdetails");
// echo $pdo;

$pdo->setFetchMode(PDO:: FETCH_ASSOC);

echo "<div class='container mt-4'>
<table class='table'>
    <tr>
        <td><h3 style='color:blue;'>sid</h3></td>
        <td><h3 style='color:blue;'>Name</h3></td>
        <td><h3 style='color:blue;'>College</h3></td>
        <td><h3 style='color:blue;'>Address</h3></td>
        <td><h3 style='color:blue;'>operation</h3></td>
    </tr>";

while ($row = $pdo->fetch()) {
    $rowdel=$row['sid'];
    echo "</tr><td>".$row['sid']."</td>
        <td>".$row['sname']."</td>
        <td>".$row['scollege']."</td>
        <td>".$row['saddres']."</td>
        <td><button class='btn btn-danger delete' data-id='$rowdel'>Delete</button>
        <a href='updatestud.php'  class='btn btn-primary update' data-id='$rowdel'>update</a>
        </td>
        
    </tr>";   
}

echo "</table></div>";

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  
    <script>


                  // $(document).ready(function(){

                  // Delete 
                  $('.delete').click(function()
                  {
                            var el = this;
                          
                            // Delete id
                            var deleteid = $(this).data('id');

                            var confirmalert = confirm("Are you sure?");
                            if (confirmalert == true)
                           {
                              // AJAX Request
                                $.ajax({
                                      url: 'deletestud.php',
                                      type: 'POST',
                                      data: { id:deleteid },
                                      success: function(response)
                                      {
                                                if(response == 1)
                                                {
                                                  window.location.reload();

                                                }
                                                else
                                                {
                                                  window.location.reload();

                                                }

                                      }

                              });
                              window.location.reload();

                            }

                  });

                  $('.update').click(function()
                  {
                            var el = this;

                            // Delete id
                            var updateid = $(this).data('id');

                            var confirmalert = confirm("Are you sure?");
                            if (confirmalert == true)
                            {
                                document.cookie = "sid" + "=" + updateid;
                            }

                  });


    </script>
  
  </body>
</html>
