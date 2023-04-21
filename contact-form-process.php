<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);
if($_POST) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $text = $_POST['text'];
  
  // Check for empty fields
  if(empty($name) || empty($email) || empty($subject) || empty($text)) {
    echo "Please fill in all required fields.";
  } else {
    // Check for valid email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Please enter a valid email address.";
    } else {
      // Send email
      $to = 'anjolaadeyemi4545@gmail.com';
      $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
      $message = "Name: " . $name . "\r\n" . "Email: " . $email . "\r\n" . "Subject: " . $subject . "\r\n" . "Message: " . $text;
      mail($to, $subject, $message, $headers);
      echo "Thank you for your message!";
    }
  }
}
?>
