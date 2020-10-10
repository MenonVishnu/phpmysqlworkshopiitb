<?php
  $servername = "localhost";
  $username_sql = "root";
  $password_sql = "";
  $database = "result";
  //connecting to database
  //database name: result, table_name: student
  $conn = mysqli_connect($servername, $username_sql, $password_sql, $database);
  if(!$conn){
    echo "ERROR Connectiong to Database";
  }
?>
<?php
  session_start();
  if(isset($_SESSION['username'])&&($_SESSION['username']=='admin')){
    echo "Welcome admin";
    echo"
    <form action='marksheet.php' method='post'>
      Name: <input type='text' name='name'>
      <br>Marks in Each Subject<br>
      PHP  : <input type='number' name='s1'><br>
      MySql: <input type='number' name='s2'><br>
      HTML : <input type='number' name='s3'><br>
      <input type='submit' name='submit' value='Post Data'>
      <input type='submit' name='delete' value='Delete Student'>
    </form>
    ";
    if(isset($_POST['submit'])){
      $name = strtolower($_POST['name']);
      @$s1 = $_POST['s1'];
      @$s2 = $_POST['s2'];
      @$s3 = $_POST['s3'];
      $total = $s1+$s2+$s3;
      $percent = ($total/300)*100;
      $sql_search = "SELECT * FROM student WHERE name ='$name'";
      $result = mysqli_query($conn,$sql_search);
      if(mysqli_num_rows($result)>0){
        $sql = "UPDATE student SET php=$s1,mysql=$s2,html=$s3,total=$total,percent=$percent WHERE name='$name'";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "Updated Successfully!";
        }
      }else{
        die("Student have not registered yet!!");
      }
    }
    if(isset($_POST['delete'])){
      $name = strtolower($_POST['name']);
      $sql_search = "SELECT * FROM student WHERE name ='$name'";
      $result = mysqli_query($conn,$sql_search);
      if(mysqli_num_rows($result)>0){
        $sql_delete = "DELETE FROM student WHERE name='$name'";
        if(mysqli_query($conn, $sql_delete)){
          echo "Student record deleted!";
        }else{
          echo ("Student not found in record!");
        }
      }else{
        echo ("No student found with $name");
      }
    }
  }elseif(isset($_SESSION['username'])){
    echo "Welcome student: ". strtoupper($_SESSION['username']);
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM student WHERE name = '$username'";
    if($result = mysqli_query($conn, $sql))
    {
      $row = mysqli_fetch_array($result);
      $score = "<br>
      Name       : ". $row['name'] ."<br>
      Scores in Php, Mysql and Html out of 100:<br>
      PHP        :". $row['php'] ."<br>
      MYSQL      :". $row['mysql'] ."<br>
      HTML       :". $row['html'] ."<br>
      TOTAL      :". $row['total']."<br>
      PERCENTAGE :". $row['percent']
      ;
      echo "<br>Marks obtained:<table border ='5'>
        <tr>
          <th>PHP</th>
          <th>MYSQL</th>
          <th>HTML</th>
          <th>TOTAL</th>
          <th>PERCENTAGE</th>
        </tr>
        <tr>
          <td>".$row['php']."</td>
          <td>".$row['mysql']."</td>
          <td>".$row['html']."</td>
          <td>".$row['total']."</td>
          <td>".$row['percent']."</td>
        </tr>";
      if($row['percent']>60){
        echo "<br><h3>Congratulations!!</h3>";
      }
      echo "<form action='marksheet.php' method='post'>
        Email: <input type='email' name='mail'>
        <input type='submit' name='sendmail' value='Send mail to parents'>
      </form>";
      if(isset($_POST['sendmail'])){
        $to = $_POST['mail'];
        $subject = "Score of $username";
        $body = $score;
        $headers = "From: admin@gmail.com";
        mail($to, $subject, $body, $headers);
        echo "mail sent!";
      }
    }else{
      echo ("No record found! please contact admin!!");
    }
  }else{
    echo ("Please log in <a href='login.php'>login</a>");
  }

?>
<?php
  if(isset($_POST['logout'])){
    session_destroy();
    header("Location: login.php");
  }
?>
<form action="marksheet.php" method="post">
  <input type="submit" name="logout" value="logout">
</form>
