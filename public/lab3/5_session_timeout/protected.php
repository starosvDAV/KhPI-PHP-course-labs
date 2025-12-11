<?php

session_start();


if (empty($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}


$timeout = 5 * 60;
$last = $_SESSION['last_activity'] ?? 0;
if (time() - $last > $timeout) {
    // завершити сесію
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    echo "Сесія закінчилася через неактивність. <a href='index.php'>Увійти знову</a>";
    exit;
}


$_SESSION['last_activity'] = time();

?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Protected</title></head>
<body>
  <h2>Привіт, <?= htmlspecialchars($_SESSION['user']['login']) ?></h2>
  <p>Остання активність: <?= date('Y-m-d H:i:s', $_SESSION['last_activity']) ?></p>

  <form action="logout.php" method="post">
    <input type="submit" value="Вихід">
  </form>
</body>
</html>
