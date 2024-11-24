    <?php
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

// Preparar os dados do formulário
$nome = $_POST['fullname'];
$sobrenome = $_POST['leftname'];
$email = $_POST['email'];
$senha = $_POST['password']; // Armazenar a senha sem criptografar
$permissao	= $_POST['permissao'];

// Upload da foto de perfil (opcional)


// Inserir dados na tabela usuario
$sql = "INSERT INTO usuario (id, nome, sobrenome, email, senha, permissao)
        VALUES (null,'$nome', '$sobrenome', '$email', '$senha','$permissao')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../Gerenciar_user/index.php?erro=1");
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
