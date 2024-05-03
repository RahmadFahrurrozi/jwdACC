<?php

include 'database.php';

// Memeriksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lindungi dari SQL Injection
    $username = mysqli_real_escape_string($connectdb, $username);
    $password = mysqli_real_escape_string($connectdb, $password);

    // Query untuk memeriksa apakah username dan password cocok
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connectdb, $query);

    // Hitung jumlah baris yang ditemukan
    $count = mysqli_num_rows($result);

    // Jika ditemukan admin dengan username dan password yang cocok
    if ($count == 1) {
        // Redirect ke halaman admin
        header("Location: dashboardadmin.php");
    } else {
        // Jika tidak cocok, tampilkan pesan error
        $error_message = "Username atau password salah.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>
<body>
  <div class="container mt-5">
    <h1>Login Admin</h1>
    <hr>
    <?php if(isset($error_message)) { ?>
      <div class="alert alert-danger" role="alert">
        <?= $error_message ?>
      </div>
    <?php } ?>
    <div class="d-flex justify-content-center mt-4 bg-light rounded">
        <form method="POST" style="border-radius: 20px; width: 40%;" class="p-5">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
            <label class="form-check-label" for="remember_me">Ingat Saya</label>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
  </div>
</body>
</html>
