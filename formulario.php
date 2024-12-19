<?php
$host = 'localhost';
$user = 'root'; // Usuário do MySQL
$pass = ''; // Senha do MySQL
$dbname = 'curriculos_db';

// Criar conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $naturalidade = $_POST['naturalidade'];
    $nacionalidade = $_POST['nacionalidade'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $estado_civil = $_POST['estado_civil'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $nome_mae = $_POST['nome_mae'];
    $cep = $_POST['cep'];
    $etnia = $_POST['etnia'];
    $deficiencia = $_POST['deficiencia'];
    $funcao = $_POST['funcao'];
    $disponibilidade = $_POST['disponibilidade'];
    $experiencias = $_POST['experiencias'];
    $escolaridade = $_POST['escolaridade'];
    $cursos_complementares = $_POST['cursos_complementares'];

    // Inserir dados na tabela
    $sql = "INSERT INTO curriculos (nome, sexo, naturalidade, nacionalidade, whatsapp, email, estado_civil, data_nascimento, cpf, nome_mae, cep, etnia, deficiencia, funcao, disponibilidade, experiencias, escolaridade, cursos_complementares) VALUES ('$nome', '$sexo', '$naturalidade', '$nacionalidade', '$whatsapp', '$email', '$estado_civil', '$data_nascimento', '$cpf', '$nome_mae', '$cep', '$etnia', '$deficiencia', '$funcao', '$disponibilidade', '$experiencias', '$escolaridade', '$cursos_complementares')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h5>Formulário de Cadastro</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <!-- Campos do formulário... -->
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>