<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "result";
  //connecting to database:
  $conn = mysqli_connect($servername, $username, $password, $database) or die("Connection Failed".mysqli_connect_error());
?>
<h2>Current Database:</h2>
<table border="1" >
  <tr>
    <th>Student Name</th>
    <th>Subject 1</th>
    <th>Subject 2</th>
    <th>Subject 3</th>
    <th>Subject 4</th>
    <th>Subject 5</th>
    <th>Total Marks Obtained</th>
    <th>Total Marks</th>
    <th>Percentage</th>
  </tr>
<?php
  //to show database:
  $sql = "SELECT * FROM class1";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){?>
    <tr>
      <?php
      echo "<td>" .$row['name']. "</td>";
      echo "<td>" .$row['sub1']. "</td>";
      echo "<td>" .$row['sub2']. "</td>";
      echo "<td>" .$row['sub3']. "</td>";
      echo "<td>" .$row['sub4']. "</td>";
      echo "<td>" .$row['sub5']. "</td>";
      echo "<td>" .$row['total_obtained']. "</td>";
      echo "<td>" .$row['totalmarks']. "</td>";
      echo "<td>" .$row['percent']. "</td>";
      ?>
    </tr>

 <?php } ?>
</table>

<form action="q2.php" method="post">
  <br><input type="submit" name="update" value="Update Database Of Rohan">
</form>

<?php
  if(isset($_POST['update'])){
    $sub5 = 99;
    $sql = "SELECT * FROM class1 WHERE name = 'Rohan'";
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        $row =mysqli_fetch_array($result);
        $ntotal = $row['sub1']+$row['sub2']+$row['sub3']+$row['sub4']+$sub5;
        $npercent = ($ntotal/500)*100;
    }
    $sqlup = "UPDATE class1 SET sub5=$sub5, total_obtained=$ntotal, percent=$npercent WHERE name='Rohan'";
    if(mysqli_query($conn, $sqlup)){
      echo "Successfully Updated ";
    }
    else{
      mysqli_connect_error();
    }
  }
mysqli_close($conn);
?>
