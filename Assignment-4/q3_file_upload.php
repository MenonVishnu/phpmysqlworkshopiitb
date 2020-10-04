<form  action="q3_file_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" name="submit" value"Get data">
</form>
<?php
  @$name = $_FILES['myfile']['name'];
  @$size = $_FILES['myfile']['size'];
  @$type = $_FILES['myfile']['type'];
  @$temp = $_FILES['myfile']['tmp_name'];
  @$error = $_FILES['myfile']['error'];
  if(isset($_POST['submit']))
  {
      if(!file_exists("uploaded/".$name))
      {
        if(move_uploaded_file($temp,"uploaded/".$name))
        {
          echo nl2br("Name of the File is: $name
          Size of the File is: $size
          Type of the File is: $type
          Temporary location of File is: $temp");
        }
        else
          die("Not uploaded");
      }
      else
        die("File Exists, not uploaded");
  }
?>
