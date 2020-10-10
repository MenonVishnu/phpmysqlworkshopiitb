<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "result";
  //connecting to database:
  //database name: result, table_name: data1
  $conn = mysqli_connect($servername, $username, $password, $database);
  if(!$conn){
    die("Error".mysqli_connect_error());
  }else{
    echo "Connected to Database!<br>";
  }
?>
<form action="q1_md5.php" method="post">
  Username: <input type="text" name="username">
  Password: <input type="password" name="password">
  <input type="submit" name="submit" value="Log in">
</form>

<?php
  @$username = $_POST['username'];
  @$password = $_POST['password'];
  @$encpass = md5($password);
  if(isset($username) && isset($password)){
    $sql = "INSERT INTO data1 VALUES ('','$username','$encpass')";
    if(mysqli_query($conn,$sql)){
      echo "User Registered!<br>";
    }else{
      echo "Encountered error";
    }
  }
?>
