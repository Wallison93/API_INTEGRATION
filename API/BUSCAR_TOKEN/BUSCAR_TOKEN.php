<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../conexao.php';


$USUARIO = "wg";
/* $USUÁRIO= $_GET['USUARIO']; */


$query = $pdo->prepare("SELECT * FROM empresas WHERE empresa = :usuario ");
$query->execute(['usuario' => $USUARIO]);
$res = $query->fetchAll();

$dados = [];
for ($i = 0; $i < count($res); $i++) {
    $dados[] = [
        'google_api_key' => $res[$i]['google_api_key'],  
     
    ];
}

if (count($res) > 0) {
    $result = json_encode(['success' => true, 'result' => $dados]);
} else {
    $result = json_encode(['success' => false, 'result' => '0']);
}

echo $result;
?>