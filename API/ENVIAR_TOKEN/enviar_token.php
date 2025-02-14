<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../conexao.php';

$empresa = "wg solucoes";
$google_api_key = "01101993";

/* $empresa = $_POST['empresa']; 
$google_api_key = $_POST['google_api_key']; */

// Preparando o comando SQL para inserção
$query = $pdo->prepare("INSERT INTO empresas (empresa, google_api_key) VALUES (:Empresa, :googlekey)");

// Executando a query
$query->execute([
    'Empresa' => $empresa,
    'googlekey' => $google_api_key
]);

// Verificando se a inserção foi bem-sucedida
if ($query->rowCount() > 0) {
    $result = json_encode(['success' => true, 'message' => 'Dados inseridos com sucesso']);
} else {
    $result = json_encode(['success' => false, 'message' => 'Erro ao inserir dados']);
}

echo $result;
?>



<!-- http://localhost/API_SISGEN/API/ENVIAR_TOKEN/enviar_token.php -->