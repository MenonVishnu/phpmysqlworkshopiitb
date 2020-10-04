<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "result";
  // *******database name: result, table name: count*******
  //connecting to database:
  $conn = mysqli_connect($servername, $username, $password, $database);
  if(!$conn){
    echo mysqli_connect_error();
  }
  else{
    echo "Connected!!<br>";
  }
  $sql = "SELECT * FROM count";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $visitors = $row['no_of_visitors'];
  $new_visitors = $visitors+1;
  echo "You have had $new_visitors Visitors to this page";
  $sql = "UPDATE count SET no_of_visitors=$new_visitors";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
 ?>
