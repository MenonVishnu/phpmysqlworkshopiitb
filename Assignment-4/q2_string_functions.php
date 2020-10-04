<form action="q2_string_functions.php" method="post">
  Enter a String: <input type="text" name="string">
  <input type="submit" name="submit" value="Show Different Operations">
</form>
<?php
  if(isset($_POST['submit'])){
    $string = $_POST['string'];
    //1.
    $length = strlen($string);
    //2.
    $explode_array = explode(" ",$string);
    foreach ($explode_array as $key) {
      echo "";
    }
    //3.
    $reverse = strrev($string);
    //4.
    $lower = strtolower($string);
    //5.
    $upper = strtoupper($string);
    //6.
    $sub = "Replace string";
    $sub_string = substr_replace($string, $sub, 0, $length);
    echo nl2br("1. $length
    2. $key
    3. $reverse
    4. $lower
    5. $upper
    6. $sub_string
    ");
  }
?>
