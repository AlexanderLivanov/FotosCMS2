<?php
include('a/sys/cfg.php');
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
  $query->bindParam("username", $username, PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  if (!$result) {
    echo '<script>alert("Неправильный логин или пароль");</script>';
  } else {
    if (password_verify($password, $result['password'])) {
      $_SESSION['user_id'] = $result['id'];
      $_SESSION['user_name'] = $username;
      echo '<p class="success">Поздравляем, вы прошли авторизацию!</p><p><a href="/">На главную</a></p>';
      $query = $connection->prepare("UPDATE users SET ip='" . $_SERVER['REMOTE_ADDR'] . "' WHERE username='" . $result['username'] . "'");
      $query->execute();
      setcookie("username_cookie", $_SESSION['user_name'], time() + 7 * 24 * 3600);
      // header('Location: profile');
      // exit();
    } else {
      echo '<script>alert("Неправильный логин или пароль");</script>';
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/pages.css">
  <title>Вход — FotosCMS</title>
</head>

<body>
  <div class="main-container">
    <h1>Вход в систему</h1>
    <form method="post" action="" name="signin-form">
      <div class="form-element">
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required placeholder="Логин" />
      </div>
      <div class="form-element">
        <input type="password" name="password" required placeholder="Пароль" />
      </div>
      <button type="submit" name="login" value="login">Войти</button>
      <p>Ещё нет аккаунта? <a href="register">Зарегистрируйтесь!</a></p>
    </form>
  </div>
</body>

</html>