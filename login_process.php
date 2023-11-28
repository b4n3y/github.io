<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $file = 'users.txt';
  $users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  $loggedIn = false;

  foreach ($users as $user) {
    $userInfo = explode(' | ', $user);
    $storedUsername = $userInfo[2];
    $storedPassword = $userInfo[3];

    if ($username === $storedUsername && password_verify($password, $storedPassword)) {
      // Login successful
      session_start();
      $_SESSION['username'] = $username;
      $loggedIn = true;
      break;
    }
  }

  if ($loggedIn) {
    // Redirect with greeting after a short delay
    echo "<p>Mireseerdhe $username Ju lutem Prisni 5 Sekonda!</p>";
    echo '<meta http-equiv="refresh" content="5;url=https://instagram.com/shermadhi_16?igshid=OGQ5ZDc2ODk2ZA==">';
    exit();
  } else {
    // If login fails, show error message and redirect back to login page after a delay
    echo "<p>Emër përdoruesi ose fjalëkalimi i pavlefshëm. Ju lutemi provoni përsëri pas 5 sekondash.</p>";
    echo '<meta http-equiv="refresh" content="5;url=index.html">';
    exit();
  }
} else {
  echo "Invalid request!";
}
?>