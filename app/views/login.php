<?php include '../app/views/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabeleleira Leila</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

        <main>
            <div class="login-container">
                <div class="login-box">
                    <h1>Login</h1>
                    <form action="process_login.php" method="POST">
                        <div class="input-group">
                            <label for="email">Usuário ou Email</label>
                            <input type="text" id="email" name="email" required>
                        </div>
                        <div class="input-group">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="actions">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Lembrar-me</label>
                            <a href="forgot_password.php">Esqueceu a senha?</a>
                        </div>
                        <button type="submit" class="btn-login">Login</button>
                    </form>
                    <p class="register-link">
                        Não tem uma conta? <a href="registro.php">Registrar</a>
                    </p>
                </div>
            </div>
        </main>
</html>

<?php include '../app/views/footer.php'; ?>