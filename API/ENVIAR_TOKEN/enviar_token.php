<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../conexao.php';

$empresa = "wg solucoes";
$google_api_key = "01101993";

// Preparando o comando SQL para inserção
$query = $pdo->prepare("INSERT INTO empresas (empresa, google_api_key) VALUES (:empresa, :google_api_key)");

// Executando a query
$query->execute([
    'empresa' => $empresa,
    'google_api_key' => $google_api_key
]);

// Verificando se a inserção foi bem-sucedida
if ($query->rowCount() > 0) {
    $result = json_encode(['success' => true, 'message' => 'Dados inseridos com sucesso']);
} else {
    $result = json_encode(['success' => false, 'message' => 'Erro ao inserir dados']);
}

echo $result;
?>
