<?php
  session_start();
  $servername = "localhost";
  $username_sql = "root";
  $password_sql = "";
  $database = "result";
  //database name: result, table_name: student
  $conn = mysqli_connect($servername, $username_sql, $password_sql, $database);
  if(!$conn){
    echo "ERROR Connectiong to Database";
  }
  if(isset($_POST['submit']))
  {
    @$username = strtolower($_POST['username']);
    @$password = md5($_POST['password']);
    if($username && $password){
      $sql = "SELECT * FROM student WHERE name='$username'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $dbusername = $row['name'];
        $dbpassword = $row['password'];
        if($password == $dbpassword){
          $_SESSION['username'] = $dbusername;
          echo "logged in";
          header('location: marksheet.php'); //it heads to marksheet page
        }else
          die("Wrong password");
    }else
        echo "No user found! <a href='register.php'>Register</a>";
  }else
      echo "Please Enter Username and Password";
  }
  mysqli_close($conn);
?>
<form action="login.php" method="post">
  Username:<input type="text" name="username">
  Password:<input type="password" name="password">
  <input type="submit" name="submit" value="Log In">
</form>
