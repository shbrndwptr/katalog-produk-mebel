<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    // Cek apakah email valid
    if (!$email) {
        $error_message = "Invalid email format!";
    } else {
        // Validasi apakah pengguna ada di sesi
        if (isset($_SESSION['users'][$email]) && password_verify($password, $_SESSION['users'][$email]['password'])) {
            // Simpan data pengguna yang login
            $_SESSION['logged_in_user'] = $_SESSION['users'][$email];
            setcookie('username', $email, time() + 3600, "/"); // Simpan cookie untuk 1 jam

            // Redirect ke halaman admin
            header("Location: admin.php");
            exit;
        } else {
            $error_message = "Invalid email or password!"; // Pesan error jika login gagal
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Sun Furniture</title>
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

    .login-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 30%;
      background-color: white;
      padding: 30px;
      margin: 0 auto;
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
  <main>
    <div class="login-container">
      <h2>LOGIN</h2>
      <?php if (isset($error_message)) : ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
      <?php endif; ?>
      <form action="login-proses.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email-login" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password-login" required>
    
    <button type="submit">Login</button>
</form>

      <div class="links">
        <a href="#">Don't have an account yet?</a>
        <br />
        <a href="register.php">Register</a>
      </div>
    </div>
  </main>
  <footer>
    <h2>HEADQUARTERS</h2>
    <p>Jln. Kyai Nawawi KM. 02 RT.20 / RW.04</p>
    <p>Sinanggul Mlonggo Kab. Jepara - Jawa Tengah 59452</p>
    <p>Instagram: _sunfurniture_</p>
    <p>WhatsApp: +62 81249656249</p>
  </footer>
  <div id="snackbar" class="snackbar"></div>
</body>
<script>
function showSnackbar(message) {
  var snackbar = document.getElementById("snackbar");
  snackbar.textContent = message;
  snackbar.className = "snackbar show";
  setTimeout(() => { snackbar.className = snackbar.className.replace("show", ""); }, 3000);
}
</script>
</html>
