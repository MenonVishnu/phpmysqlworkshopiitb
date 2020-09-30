<form class="" action="q6_2_special_variables_html.php" method="post">
  Name: <input type="text" name="name" value="">
  <br>Marks in Each Subject<br>
  Subject 1: <input type="number" name="s1" value="">
  Subject 2: <input type="number" name="s2" value="">
  Subject 4: <input type="number" name="s4" value="">
  Subject 3: <input type="number" name="s3" value="">
  Subject 5: <input type="number" name="s5" value="">
  <input type="submit" name="" value="Submit">
</form>
<?php
  @$name = $_POST["name"];
  @$s1 = $_POST["s1"];
  @$s2 = $_POST["s2"];
  @$s3 = $_POST["s3"];
  @$s4 = $_POST["s4"];
  @$s5 = $_POST["s5"];
  @$total = $s1+$s2+$s3+$s4+$s5;
  $full = 500;
  $percentage = ($total/$full)*100;
  if($name && $s1 && $s2 && $s3 && $s4 && $s5)
  {
    echo "Name of Student: $name <br><br>";
    echo "Marks in Each Subject <br><br>";
    echo "Subject 1: $s1<br>";
    echo "Subject 2: $s2<br>";
    echo "Subject 3: $s3<br>";
    echo "Subject 4: $s4<br>";
    echo "Subject 5: $s5<br>";
    echo "Total Marks Obtained: $total<br>";
    echo "Total Marks: $full<br>";
    echo "Percentage: $percentage<br>";
  }
 ?>
