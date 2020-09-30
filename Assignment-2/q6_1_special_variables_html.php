<form action='q6_1_special_variables_html.php' method='GET'>
  Side 1: <input type='number' name='s1' >
  Side 2: <input type='number' name='s2' >
  Side 3: <input type='number' name='s3' >
  <input type='submit' value='DETERMINE'>
</form>
<?php
    @$a = $_GET['s1'];
    @$b = $_GET['s2'];
    @$c = $_GET['s3'];
    if($a && $b && $c)
    {
      if($a == $b && $b == $c)
        echo "Equilateral Triangle";
      elseif($a == $b || $b == $c || $a == $c)
        echo "Isosceles Triangle";
      elseif($a*$a + $b*$b == $c*$c || $a*$a + $c*$c == $b*$b || $a*$a == $b*$b + $c*$c)
        echo "Right angled Triangle";
      elseif($a!=$b && $b!=$c)
        echo "Scalene Triangle";
    }
    else
    {
      echo "Please enter the Values of 3 sides in Triangle";
    }
 ?>
