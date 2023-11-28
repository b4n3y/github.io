<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $regUsername = $_POST['regUsername'];
  $regPassword = password_hash($_POST['regPassword'], PASSWORD_DEFAULT);

  $file = 'users.txt';
  $data = "$firstname $lastname | $email | $regUsername | $regPassword\n";

  file_put_contents($file, $data, FILE_APPEND);

  // Set session message for successful registration
  session_start();
  $_SESSION['registration_success'] = true;

   // Redirect with greeting after a short delay
    echo "<p>regUsername u regjistruat me sukses. Ju Lutem Prisni 5 Sekonda, $regUsername!</p>";
    echo '<meta http-equiv="refresh" content="5;url=https://catechumenical-film.000webhostapp.com">';
    exit();
}
?>
