<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../conexao.php';

$empresa = "uHLelo";
$google_api_key = "123456789";

/* $empresa = $_POST['VARIAVEL DO FRONT']; 
$google_api_key = $_POST['VARIAVEL DO FRONT']; */

// Verificando se a empresa já existe na tabela
$query = $pdo->prepare("SELECT * FROM empresas WHERE empresa = :empresa");
$query->execute(['empresa' => $empresa]);
$res = $query->fetchAll();

if (count($res) > 0) {
    // Se a empresa já existir, atualiza o google_api_key
    $updateQuery = $pdo->prepare("UPDATE empresas SET google_api_key = :Gkey WHERE empresa = :Empresa");
    $updateQuery->execute([
        'Empresa' => $empresa,
        'Gkey' => $google_api_key
    ]);
    
    $result = json_encode(['success' => true, 'message' => 'Dados atualizados com sucesso']);
} else {
    // Caso a empresa não exista, insere um novo registro
    $insertQuery = $pdo->prepare("INSERT INTO empresas (empresa, google_api_key) VALUES (:Empresa, :Gkey)");
    $insertQuery->execute([
        'Empresa' => $empresa,
        'Gkey' => $google_api_key
    ]);
    
    if ($insertQuery->rowCount() > 0) {
        $result = json_encode(['success' => true, 'message' => 'Dados inseridos com sucesso']);
    } else {
        $result = json_encode(['success' => false, 'message' => 'Erro ao inserir dados']);
    }
}

echo $result;
?>


<!-- http://localhost/API_SISGEN/API/ENVIAR_TOKEN/insert_ou_update_token.php
 -->