<?php
header('Content-Type: application/json');

// Permitir requisições apenas via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

// Ler os dados recebidos em formato JSON
$inputJSON = file_get_contents('php://input');
$data = json_encode(['error' => 'Entrada inválida']);
$data = json_decode($inputJSON, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Payload JSON inválido']);
    exit;
}

// Honeypot check: Se o campo 'honeypot' foi preenchido, ignoramos de forma silenciosa e fingimos sucesso.
if (!empty($data['honeypot'])) {
    echo json_encode(['success' => true, 'message' => 'Honeypot detectado, mas fingindo sucesso.']);
    exit;
}

// Sanitização e Validação dos campos
$nome = filter_var(trim($data['nome'] ?? ''), FILTER_SANITIZE_STRING);
$empresa = filter_var(trim($data['empresa'] ?? ''), FILTER_SANITIZE_STRING);
$mensagem = filter_var(trim($data['mensagem'] ?? ''), FILTER_SANITIZE_STRING);

if (empty($nome) || empty($empresa) || empty($mensagem)) {
    http_response_code(400);
    echo json_encode(['error' => 'Por favor, preencha todos os campos obrigatórios.']);
    exit;
}

// === CONFIGURAÇÕES DO EMAIL ===
// Insira o email da sua conta Hostinger de onde os e-mails sairão e para onde serão enviados.
$to = 'seu-email@seudominio.com.br'; // <-- MUDE AQUI PARA O SEU EMAIL DE RECEBIMENTO
$subject = "Novo Contato pelo Site: $nome";

// Montando o corpo do email
$body = "Você recebeu um novo contato pelo formulário do site.\n\n";
$body .= "Detalhes do Contato:\n";
$body .= "Nome: $nome\n";
$body .= "Empresa: $empresa\n\n";
$body .= "Mensagem:\n$mensagem\n";

// Headers
// O Hostinger geralmente requer que o "From" seja um e-mail hospedado no mesmo domínio.
$headers = "From: contato@seudominio.com.br\r\n"; // <-- MUDE AQUI PARA UM EMAIL VÁLIDO NO SEU HOST
$headers .= "Reply-To: no-reply@seudominio.com.br\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviando o e-mail usando a função nativa mail() do PHP
$success = mail($to, $subject, $body, $headers);

if ($success) {
    echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Ocorreu um erro ao enviar o e-mail no servidor.']);
}
?>
