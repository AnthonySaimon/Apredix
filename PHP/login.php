,<?php
  session_start();
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aprendix";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$email = $_POST['username'];
$senha = $_POST['password'];

// Consulta SQL para verificar o login
$sql = "SELECT * FROM usuario WHERE email = '$email'";
$result = $conn->query($sql);



if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($senha === $row['senha']) { 
        // Verificar a senha sem criptografia
        // Redirecionar para a página de sucesso
        if ($row['permissao'] === "ADM") {

            $_SESSION['usuario'] = $resutado['nome'];
            $_SESSION['permissao'] = $resutado['permissao'];
            header("Location: ../view/ADM/");

        } elseif ($row['permissao'] === "Use Premium") {

            $_SESSION['usuario'] = $resutado['nome'];
            $_SESSION['permissao'] = $resutado['permissao'];
            header("Location: ../view/home/");
            exit();
        }
        elseif ($row['permissao'] ===  "Use Free") {

            $_SESSION['usuario'] = $resutado['nome'];
            $_SESSION['permissao'] = $resutado['permissao'];
            header("Location: ../view/home/");
            exit();
        }
        elseif ($row['permissao'] === "Banido") {
            header("Location: ../view/BAM/");
        }
    } else {
        header("Location: ../index.php?erro=1");
    }
} else {
    header("Location: ../index.php?erro=2");
}



$conn->close();
