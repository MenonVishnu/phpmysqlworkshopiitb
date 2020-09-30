<?php
  $matrix1 = array(
    "row11" => array(1,2),
    "row12" => array(3,4)
  );
  $matrix2 = array(
    "row21" => array(1,2),
    "row22" => array(3,10)
  );
  echo "Addition of 2x2 Matrix is: <br>";
  echo $matrix1["row11"][0]+$matrix2["row21"][0]. " ";
  echo $matrix1["row11"][1]+$matrix2["row21"][1] ;
  echo "<br>";
  echo $matrix1["row12"][0]+$matrix2["row22"][0]. " " ;
  echo $matrix1["row12"][1]+$matrix2["row22"][1] ;
?>
