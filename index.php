<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';
session_start();
if (isset($_SESSION['user'])) {
  header("Location: dashboard.php");
  exit;
}
$err = $_GET['err'] ?? '';
?>
<!-- 
Online HTML, CSS and JavaScript editor to run code online.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Effect </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <div class="container">
    <div class="glass-form">

      <h2>Welcome Back</h2>
      <?php if ($err): ?><p class="danger small"><?php echo htmlspecialchars($err); ?></p><?php endif; ?>
      <form method="post" action="login.php" id="loginForm">
        <div class="input-group">
          <label for="username">Email</label>
          <input type="text" name="username" required id="email" placeholder="Enter your email">

        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input id="password" placeholder="Enter your password" type="password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
      </form>

      <div class="alternatives">
        <span>Or login with</span>
        <div class="social-login">

          <div class="social-btn">
            <i class="fab fa-google"></i>
          </div>

          <div class="social-btn">
            <i class="fab fa-facebook-f"></i>
          </div>

          <div class="social-btn">
            <i class="fab fa-twitter"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="index.js"></script>
</body>

</html>