<?php
require 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login_user($username, $password)) {
        redirect('index.php');
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>

<?php include 'includes/header.php'; ?>
<form method="post" action="login.php">
    <label for="username">Usuário:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" required>
    
    <button type="submit">Login</button>
</form>
<?php include 'includes/footer.php'; ?>
