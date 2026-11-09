<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha']; 
        $cor = $_POST["cor"];

        $servername = "localhost";
        $username = "root";
        $password = "Senai@118";
        $dbname = "exercicio";
    
    $conexao = new mysqli($servername, $username, $password, $dbname); 
    
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

   
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'"; 

    
    $result = $conexao->query($sql); 

    if ($result->num_rows > 0) { 
        $_SESSION["usuario"] = $usuario;
        $_SESSION["cor"] = $cor;

        header("Location: 15d_perfil.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
    $conexao->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>

        <label>Cor de Fundo:</label>
        <select name="cor" required>
            <option value="lightblue">Azul Claro</option>
            <option value="lightgreen">Verde Claro</option>
            <option value="lightcoral">Vermelho Claro</option>
            <option value="lightyellow">Amarelo Cçaro</option>
        </select><br>

        <button type="submit">Entrar: </button>
    </form>

    <p style="color: red;"><?php echo $erro; ?></p>
</body>
</html>