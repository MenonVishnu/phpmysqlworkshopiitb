<?php
  $num1 = readline("Enter Number 1: ");
  $num2 = readline("Enter Number 2: ");
  if($num1 > $num2){
    echo "Greater number between $num1 and $num2 is: $num1";
  }
  elseif($num1 == $num2) {
    echo "Both are equal";
  }
  else{
    echo "Greater number between $num1 and $num2 is: $num2";
  }
 ?>
