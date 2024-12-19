<?php
session_start();

// Simulando login de administrador
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'password');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == ADMIN_USER && $password == ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error_message = "Usuário ou senha inválidos.";
    }
}

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Administração de Currículos</h2>
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'curriculos_db';

    // Criar conexão
    $conn = new mysqli($host, $user, $pass, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM curriculos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Funções</th><th>Ações</th></tr></thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['funcao'] . '</td>';
            echo '<td><a href="view_resume.php?id=' . $row['id'] . '" class="btn btn-info btn-sm">Ver Currículo</a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Nenhum currículo encontrado.";
    }

    $conn->close();
    ?>
</div>
</body>
</html>
