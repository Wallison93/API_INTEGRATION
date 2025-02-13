<?php
$servidor = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "sisgen"; 

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario_db, $senha_db, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo json_encode(["erro" => "Falha na conexão: " . $e->getMessage()]);
    exit;
}
?>
