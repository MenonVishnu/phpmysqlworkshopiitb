<?php
 $servername = "localhost";
 $username_sql = "root";
 $password_sql = "";
 $database = "result";
 //database name: result, table_name: student
 $conn = mysqli_connect($servername,$username_sql,$password_sql,$database);
 if(!$conn){
   echo "ERROR Connectiong to Database";
 }
?>
<?php
  if(isset($_POST['submit']))
  {
    if($_POST['password1'] == $_POST['password2']){
      $username = strtolower($_POST['username']);
      $password = md5($_POST['password1']);
      $sql = "SELECT * FROM student WHERE name = '$username'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        die("User aldready exist");
      }else{
        $sql = "INSERT INTO student (name,password) VALUES ('$username','$password')";
        if(mysqli_query($conn,$sql)){
          echo "Registered Successfully!!<a href='login.php'>Login</a>";
        }
      }
    }else{
      die("Password dosent match");
    }
  }
?>
<form action="register.php" method="post">
  Username:<input type="text" name="username">
  Password:<input type="password" name="password1">
  RePassword:<input type="password" name="password2">
  <input type="submit" name="submit" value="Register ">
</form>
