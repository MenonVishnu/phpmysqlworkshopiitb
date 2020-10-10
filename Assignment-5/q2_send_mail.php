
<form action="q2_send_mail.php" method="post">
  Name:<input type="text" name="name"><br>
  Email: <input type="email" name="email"><br>
  Feedback:<br><textarea name="feedback" rows="8" cols="80"></textarea>
  <input type="submit" name="submit" value="Submit Feedback">
</form>


<?php
  if(isset($_POST['submit'])){
    @$name = $_POST['name'];
    @$email = $_POST['email'];
    @$feedback = $_POST['feedback'];
    if($name && $email && $feedback){
      $to_student = $email;
      $to_admin = "example@gmail.com"; //admin email here
      $subject = "Feedback from $name";
      $headers_student = "From: $to_admin";
      $headers_admin = "From: $to_student";
      $body_student = "Thank you for filling out our Feedback form!";
      $body_admin = "Feedback from $name:\n" . "$feedback";
      mail($to_student, $subject, $body_student, $headers_student);
      mail($to_admin, $subject, $body_admin, $headers_admin);
      echo "Feedback recieved!";
    }else{
      die("Please enter all the credentials!!");
    }
  }

?>
