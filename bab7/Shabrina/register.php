<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rePassword = $_POST['re-password'];

    // Validasi input
    if ($password !== $rePassword) {
        $error_message = "Passwords do not match!";
    } elseif (isset($_SESSION['users'][$email])) {
        $error_message = "User with this email already exists!";
    } else {
        // Simpan data pengguna ke sesi
        $_SESSION['users'][$email] = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT) // Hash password
        ];
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Sun Furniture</title>
  <link rel="stylesheet" href="css/style.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .login-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    input {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 10px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .links {
      text-align: center;
      margin-top: 15px;
    }

    .links a {
      color: #007bff;
      text-decoration: none;
    }

    main {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 500px;
    }

    .register-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 30%;
      background-color: white;
      padding: 30px;
      margin: 0 auto;
      margin-top: 50px;
      box-shadow: 0 6px 12px 4px rgba(0, 0, 0, 0.15);
      border-radius: 10px;
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }

    .snackbar {
      visibility: hidden;
      min-width: 250px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
    }

    .snackbar.show {
      visibility: visible;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      to {
        bottom: 0;
        opacity: 0;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="logo">SUN FURNITURE</div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Product</a></li>
        <li><a href="#">Price</a></li>
        <li><a href="#">Help Us</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <div class="register-container">
    <h2>REGISTER</h2>
    <?php if (isset($error_message)) : ?>
      <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <form id="register-form" method="POST" action="register-proses.php">
    <input type="email" name="email" placeholder="Email" required />
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <input type="password" name="password-confirmation" placeholder="Konfirmasi Password" required />
    <button type="submit">Register</button>
</form>

    <div class="links">
      <a href="login.php">Back to Login</a>
    </div>
  </div>
  <div id="snackbar" class="snackbar"></div>

  <script>
    document.getElementById("register-form").addEventListener("submit", function (e) {
      const password = document.getElementById("password").value;
      const rePassword = document.getElementById("re-password").value;

      if (password !== rePassword) {
        e.preventDefault();
        showSnackbar("Passwords do not match!");
      }
    });

    function showSnackbar(message) {
      var snackbar = document.getElementById("snackbar");
      snackbar.textContent = message;
      snackbar.className = "snackbar show";
      setTimeout(() => {
        snackbar.className = snackbar.className.replace("show", "");
      }, 3000);
    }
  </script>
</body>

</html>
