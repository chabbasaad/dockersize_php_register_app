<?php
require('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $pdo = new PDO(CONFIG['db'], CONFIG['db_user'], CONFIG['db_password']);
        $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $stmt->execute(['username' => $username, 'password' => $password]);
        echo "Registration successful.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Register">
</form>