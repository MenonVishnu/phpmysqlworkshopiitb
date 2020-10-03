<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "result";
  //connecting to database:
  $conn = mysqli_connect($servername, $username, $password,$database);
  if (!$conn){
    mysqli_connect_error();
  }else{
    echo "Connected To Database!";
  }
?>
<form action="q1.php" method="post">
  Name: <input type="text" name="name">
  <br>Marks in Each Subject<br>
  Subject 1: <input type="number" name="s1"><br>
  Subject 2: <input type="number" name="s2"><br>
  Subject 3: <input type="number" name="s3"><br>
  Subject 4: <input type="number" name="s4"><br>
  Subject 5: <input type="number" name="s5"><br>
  <input type="submit" name="submit" value="Post Data">
</form>
<?php
  @$name = $_POST['name'];
  @$s1 = $_POST['s1'];
  @$s2 = $_POST['s2'];
  @$s3 = $_POST['s3'];
  @$s4 = $_POST['s4'];
  @$s5 = $_POST['s5'];
  @$total = $s1 + $s2 + $s3 + $s4 + $s5;
  $full = 500;
  $percentage = ($total/$full)*100;
  if($name && $s1 && $s2 && $s3 && $s4 && $s5)
  {
    $sql = "INSERT INTO class1  VALUES ('','$name',$s1,$s2,$s3,$s4,$s5,$total,$full,$percentage)";
    if (mysqli_query($conn, $sql))
    {
      echo "Successfully Updated Database";
    }
    else{
      echo "Unable to Update, ERROR!!!";
    }
  }
  mysqli_close($conn);
?>
