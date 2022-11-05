<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
$nameErr = $emailErr = $brendErr = "";
        $name = $email = $brend = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
            $nameErr = "Ime je obavezno!";
          } else {
            $name = test_input($_POST["name"]);
            
          }
          
          if (empty($_POST["email"])) {
            $emailErr = "Email je neophodan!";
          } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Los email format!";
            }
          }
          if (empty($_POST["brend"])) {
            $brendErr = "Brend je obavezan!";
          } else {
            $brend=test_input($_POST["brend"]);
          } 
         
          $servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Brend (name, email, brend)
VALUES ('$name', '$email', '$brend')";

if ($conn->query($sql) === TRUE) {
  
} else {
  
}
          
$conn->close();
          
        
}
       
    ?>
       
    <div>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           <div class="form-group">
            <label for="name">Ime:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
                <span class="error"><?php echo $nameErr;?></span>
                
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>">
                <span class="error"><?php echo $emailErr;?></span>
                
            </div>
            
            <br>
            <div class="form-group">
            <label for="name">Brend:</label>
            <input type="text" class="form-control" id="brend" name="brend" value="<?php echo $brend;?>">
                
                <span class="error"><?php echo $brendErr;?></span>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" >Submit</button>
        </form>
    </div>
    
       
    
</body>
</html>