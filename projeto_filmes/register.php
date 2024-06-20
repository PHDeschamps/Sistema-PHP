<?php
require 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    
    if (register_user($username, $password, $email, $category)) {
        redirect('login.php');
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>

<?php include 'includes/header.php'; ?>
<form method="post" action="register.php">
    <label for="username">Usuário:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    
    <label for="category">Categoria de Interesse:</label>
    <input type="text" name="category" id="category" required>
    
    <button type="submit">Registrar</button>
</form>
<?php include 'includes/footer.php'; ?>
