<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="assets/img/logo1.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg,rgb(78, 113, 144),rgb(55, 85, 255));
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-form {
      max-width: 400px;
      margin: auto;
      padding: 20px;
      border-radius: 10px;
      background-color: #f8f9fa;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      display: block;
      margin: 0 auto 20px;
    }

    h2 {
      color: #ffffff;
      text-align: center;
      margin-bottom: 30px;
    }
    .avatar{
      height: 100;
      width: auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login Form</h2>
    <div class="login-form">
      <div class="text-center">
        <img src="./assets/img/logo1.png" alt="Logo" class="avatar">
      </div>
      <form id="loginForm" action="./control/clogin.php?op=in" method="post" novalidate>
        <div class="mb-3">
          <label for="username" class="form-label"><b>Username</b></label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
          <div class="invalid-feedback">
            Please enter your username.
          </div>
        </div>
        <div class="mb-3">
          <label for="passw" class="form-label"><b>Password</b></label>
          <input type="password" class="form-control" id="passw" name="passw" placeholder="Enter Password" required>
          <div class="invalid-feedback">
            Please enter your password.
          </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Validasi dengan JavaScript
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      // Cek apakah form valid
      if (!this.checkValidity()) {
        event.preventDefault(); // Stop submit jika form tidak valid
        event.stopPropagation();
      }

      // Tampilkan feedback untuk input yang tidak valid
      this.classList.add('was-validated');
    });
  </script>
</body>
</html>